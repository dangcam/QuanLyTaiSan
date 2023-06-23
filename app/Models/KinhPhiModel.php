<?php
namespace App\Models;

use App\Entities\TBYTeEntity;

class KinhPhiModel extends BaseModel
{
    protected $table      = 'nguon_kinh_phi';
    protected $primaryKey = 'ma_kp';
    protected $useAutoIncrement = true;
    protected $protectFields = false;
    protected $returnType = TBYTeEntity::class;
    protected $validationRules = [
        'ma_kp'      => 'required|alpha_dash|min_length[1]|max_length[20]|is_unique[nguon_kinh_phi.ma_kp]',
        'ten_kp'     => 'required|max_length[50]'
    ];
    //
    public function add_kp($data)
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
            $this->set_message("KinhPhiLang.kp_creation_successful");
            return 0;
        }else
        {
            $this->set_message("KinhPhiLang.kp_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_kp($data)
    {
        $data_id = $data['ma_kp'];
        unset($data['edit']);
        unset($data['ma_kp']);
        $result = $this->update($data_id,$data);
        if($result)
        {
            $this->set_message("KinhPhiLang.kp_update_successful");
            return 0;
        }else
        {
            $this->set_message("KinhPhiLang.kp_update_unsuccessful");
            return 3;
        }
    }
    public function delete_kp($data)
    {
        $data_id = $data['ma_kp'];
        if($this->where('ma_kp',$data_id)->delete())
        {
            $this->set_message("KinhPhiLang.kp_delete_successful");
            return 0;
        }else
        {
            $this->set_message("KinhPhiLang.kp_delete_unsuccessful");
            return 3;
        }
    }
    public function listKinhPhi()
    {
        $this->select('ma_kp, ten_kp');
        $this->where('su_dung',1);
        return $this->find();
    }
    public function listNguonHT()
    {
        $tb = $this->db->table('nguon_hinh_thanh');
        return $tb->get()->getResult();
    }
    public function getKinhPhi($postData=null){
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
        $this->like('ten_kp',$strInput);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();

        foreach($records as $record ){
            $data[] = array(
                "ma_kp"=>$record->ma_kp,
                "ten_kp"=>$record->ten_kp,
                "thuoc_nguon"=>$record->thuoc_nguon,
                "nguon_ht"=>$records->nguon_ht,
                "ghi_chu"=>$record->ghi_chu,
                "su_dung"=>$record->su_dung==1?'<div class="badge badge-success">'.lang('AppLang.active').'</div>':
                    '<div class="badge badge-danger">'.lang('AppLang.inactive').'</div>',
                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
                             data-ma_kp="'.$record->ma_kp.'" data-ten_kp ="'.$record->ten_kp.'"                          
                             data-thuoc_nguon ="'.$record->thuoc_nguon.'" data-ghi_chu ="'.$record->ghi_chu.'"
                             data-su_dung ="'.$record->su_dung.'" data-nguon_ht ="'.$record->nguon_ht.'"
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-ma_kp="'.$record->ma_kp.'">
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