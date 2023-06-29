<?php
namespace App\Models;

use App\Entities\NguoiDungEntity;

class NguoiDungModel extends BaseModel
{
    protected $table      = 'nguoi_su_dung';
    protected $primaryKey = 'ma_nd';
    protected $useAutoIncrement = true;
    protected $protectFields = false;
    protected $returnType = NguoiDungEntity::class;
    protected $validationRules = [
        'ma_nd'      => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[nguoi_su_dung.ma_nd]',
        'ten_nd'     => 'required|max_length[50]'
    ];
    //
    public function add_nd($data)
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
            $this->set_message("NguoiDungLang.nd_creation_successful");
            return 0;
        }else
        {
            $this->set_message("NguoiDungLang.nd_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_nd($data)
    {
        $data_id = $data['ma_nd'];
        unset($data['edit']);
        unset($data['ma_nd']);
        $result = $this->update($data_id,$data);
        if($result)
        {
            $this->set_message("NguoiDungLang.nd_update_successful");
            return 0;
        }else
        {
            $this->set_message("NguoiDungLang.nd_update_unsuccessful");
            return 3;
        }
    }
    public function delete_nd($data)
    {
        $data_id = $data['ma_nd'];
        if($this->where('ma_nd',$data_id)->delete())
        {
            $this->set_message("NguoiDungLang.nd_delete_successful");
            return 0;
        }else
        {
            $this->set_message("NguoiDungLang.nd_delete_unsuccessful");
            return 3;
        }
    }

    public function listChucVu()
    {
        $tb = $this->db->table('chuc_vu');
        return $tb->get()->getResult();
    }
    public function listBoPhan()
    {
        $tb = $this->db->table('bo_phan');
        return $tb->get()->getResult();
    }
    public function dicChucVu($list)
    {
        $data = array();
        if (count($list)) {
            foreach ($list as $key => $item) {
                if(!isset($data[$item->ma_cv]))
                    $data[$item->ma_cv] = $item->ten_cv;
            }
        }
        return $data;
    }
    public function dicBoPhan($list)
    {
        $data = array();
        if (count($list)) {
            foreach ($list as $key => $item) {
                if(!isset($data[$item->ma_bp]))
                    $data[$item->ma_bp] = $item->ten_bp;
            }
        }
        return $data;
    }
    public function getNguoiDung($postData=null){
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
        $this->like('ten_nd',$strInput);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();
        $dicChucVu = $this->dicChucVu($this->listChucVu());
        $dicBoPhan = $this->dicBoPhan($this->listBoPhan());
        foreach($records as $record ){
            $data[] = array(
                "ma_nd"=>$record->ma_nd,
                "ten_nd"=>$record->ten_nd,
                "bo_phan"=>isset($dicBoPhan[$record->bo_phan])?$dicBoPhan[$record->bo_phan]:$record->bo_phan,
                "chuc_vu" => isset($dicChucVu[$record->chuc_vu])?$dicChucVu[$record->chuc_vu]:$record->chuc_vu,
                "su_dung"=>$record->su_dung==1?'<div class="badge badge-success">'.lang('AppLang.active').'</div>':
                    '<div class="badge badge-danger">'.lang('AppLang.inactive').'</div>',
                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
                             data-ma_nd="'.$record->ma_nd.'" data-ten_nd ="'.$record->ten_nd.'"                          
                             data-bo_phan ="'.$record->bo_phan.'" data-chuc_vu ="'.$record->chuc_vu.'" 
                             data-su_dung ="'.$record->su_dung.'"
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-ma_nd="'.$record->ma_nd.'">
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