<?php
namespace App\Models;
use App\Entities\DMTaiSanEntity;

class DMTaiSanModel Extends BaseModel
{
    protected $table      = 'dm_tai_san';
    protected $primaryKey = 'ma_dm';
    protected $protectFields = false;
    protected $returnType    = DMTaiSanEntity::class;
    protected $validationRules = [
        'ma_dm'      => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[dm_tai_san.ma_dm]',
        'ten_dm'     => 'required|max_length[100]'
    ];
    public function add_dm($data)
    {
        unset($data['add']);
        if(isset($data['su_dung']))
            $data['su_dung'] = 1;
        if(!$this->validate($data))
        {
            foreach ($this->errors() as $error) {
                $this->set_message($error);
            }
            return 3;
        }
        if(!$this->insert($data))
        {
            $this->set_message("DMTaiSanLang.dm_creation_successful");
            return 0;
        }else
        {
            $this->set_message("DMTaiSanLang.dm_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_dm($data)
    {
        $data_id = $data['ma_dm'];
        unset($data['edit']);
        unset($data['ma_dm']);
        //
        if(isset($data['su_dung']))
            $data['su_dung'] = 1;
        else
            $data['su_dung'] = 0;
        //
        $result = $this->update($data_id,$data);
        if($result)
        {
            $this->set_message("DMTaiSanLang.dm_update_successful");
            return 0;
        }else
        {
            $this->set_message("DMTaiSanLang.dm_update_unsuccessful");
            return 3;
        }
    }
    public function delete_dm($data)
    {
        $data_id = $data['ma_dm'];

        if($this->where('ma_dm',$data_id)->delete())
        {
            $this->set_message("DMTaiSanLang.dm_delete_successful");
            return 0;
        }else
        {
            $this->set_message("DMTaiSanLang.dm_delete_unsuccessful");
            return 3;
        }
    }
    public function listBoPhan()
    {
        $tb = $this->db->table('bo_phan')->select('ma_bp,ten_bp');
        return $tb->get()->getResult();
    }
    public function listChucVu()
    {
        $tb = $this->db->table('chuc_vu')->select('ma_cv,ten_cv');
        return $tb->get()->getResult();
    }
    public function listDMTaiSan()
    {
        $this->select('ma_dm, ten_dm');
        $this->where('su_dung',1);
        return $this->find();
    }
    public function dicDMTaiSan($list)
    {
        $data = array();
        if (count($list)) {
            foreach ($list as $key => $item) {
                if(!isset($data[$item->ma_dm]))
                    $data[$item->ma_dm] = $item->ten_dm;
            }
        }
        return $data;
    }

    public function getDMTaiSan($postData=null){
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
        $this->like('ten_dm',$strInput);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $dicDMTaiSan = $this->dicDMTaiSan($this->listDMTaiSan());
        $data = array();
        foreach($records as $record ){
            $data[] = array(
                "ma_dm"=>$record->ma_dm,
                "ten_dm"=>$record->ten_dm,
                "thuoc_loai"=>isset($dicDMTaiSan[$record->thuoc_loai])?$dicDMTaiSan[$record->thuoc_loai]:$record->thuoc_loai,
                "don_vi"=>$record->don_vi,
                "dinh_muc"=>$record->dinh_muc,

                "su_dung"=>$record->su_dung==1?'<div class="badge badge-success">'.lang('AppLang.active').'</div>':
                    '<div class="badge badge-danger">'.lang('AppLang.inactive').'</div>',
                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
                             data-ma_dm="'.$record->ma_dm.'" data-ten_dm ="'.$record->ten_dm.'"                          
                             data-thuoc_loai ="'.$record->thuoc_loai.'" data-nhom_ts ="'.$record->nhom_ts.'"
                             data-don_vi ="'.$record->don_vi.'" data-dinh_muc ="'.$record->dinh_muc.'"                            
                             data-su_dung ="'.$record->su_dung.'"                             
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-ma_dm="'.$record->ma_dm.'">
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