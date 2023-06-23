<?php
namespace App\Models;

use App\Entities\TrangCapEntity;

class TrangCapModel extends BaseModel
{
    protected $table      = 'trang_cap';
    protected $primaryKey = 'so_qd';
    protected $useAutoIncrement = true;
    protected $protectFields = false;
    protected $returnType = TrangCapEntity::class;
    protected $validationRules = [
        'so_qd'      => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[trang_cap.so_qd]',
        'ten_qd'     => 'required|max_length[50]'
    ];
    //
    public function add_tc($data)
    {
        unset($data['add']);
        if(!$this->validate($data))
        {
            foreach ($this->errors() as $error) {
                $this->set_message($error);
            }
            return 3;
        }
        if(!$this->insert($data))
        {
            $this->set_message("TrangCapLang.tc_creation_successful");
            return 0;
        }else
        {
            $this->set_message("TrangCapLang.tc_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_tc($data)
    {
        $data_id = $data['so_qd'];
        unset($data['edit']);
        unset($data['so_qd']);
        $result = $this->update($data_id,$data);
        if($result)
        {
            $this->set_message("TrangCapLang.tc_update_successful");
            return 0;
        }else
        {
            $this->set_message("TrangCapLang.tc_update_unsuccessful");
            return 3;
        }
    }
    public function delete_tc($data)
    {
        $data_id = $data['so_qd'];
        if($this->where('so_qd',$data_id)->delete())
        {
            $this->set_message("TrangCapLang.tc_delete_successful");
            return 0;
        }else
        {
            $this->set_message("TrangCapLang.tc_delete_unsuccessful");
            return 3;
        }
    }

    public function listDonVi()
    {
        $tb = $this->db->table('don_vi_qd');
        return $tb->get()->getResult();
    }
    public function dicDonVi($list)
    {
        $data = array();
        if (count($list)) {
            foreach ($list as $key => $item) {
                if(!isset($data[$item->ma_dv]))
                    $data[$item->ma_dv] = $item->ten_dv;
            }
        }
        return $data;
    }
    public function getTrangCap($postData=null){
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $strInput=$postData['search']['value'];

        //
        ## Total number of records without filtering
        $this->select('count(*) as allcount');
        $records = $this->find();
        $totalRecords = $records[0]->allcount;
        ## Fetch records
        $this->like('ten_qd',$strInput);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();
        $dicDonVi = $this->dicDonVi($this->listDonVi());
        foreach($records as $record ){
            $data[] = array(
                "so_qd"=>$record->so_qd,
                "ten_qd"=>$record->ten_qd,
                "don_vi"=>isset($dicDonVi[$record->don_vi])?$dicDonVi[$record->don_vi]:$record->don_vi,
                "su_dung"=>$record->su_dung==1?'<div class="badge badge-success">'.lang('AppLang.active').'</div>':
                    '<div class="badge badge-danger">'.lang('AppLang.inactive').'</div>',
                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
                             data-so_qd="'.$record->so_qd.'" data-ten_qd ="'.$record->ten_qd.'"                          
                             data-don_vi ="'.$record->don_vi.'" data-su_dung ="'.$record->su_dung.'"
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-so_qd="'.$record->so_qd.'">
                                <i class="fa fa-close color-danger"></i></a>
                            </span>'
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data
        );

        return $response;
    }

}