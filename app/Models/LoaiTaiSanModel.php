<?php
namespace App\Models;
use App\Entities\LoaiTaiSanEntity;

class LoaiTaiSanModel Extends BaseModel
{
    protected $table      = 'loai_tai_san';
    protected $primaryKey = 'ma_loai_ts';
    protected $protectFields = false;
    protected $returnType    = LoaiTaiSanEntity::class;
    protected $validationRules = [
        'ma_loai_ts'      => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[loai_tai_san.ma_loai_ts]',
        'ten_loai_ts'     => 'required|max_length[100]'
    ];
    public function add_asset($data)
    {
        unset($data['add']);
        if(isset($data['nhac_nho']))
            $data['nhac_nho'] = 1;
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
            $this->set_message("LoaiTaiSanLang.asset_creation_successful");
            return 0;
        }else
        {
            $this->set_message("LoaiTaiSanLang.asset_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_asset($data)
    {
        $data_id = $data['ma_loai_ts'];
        unset($data['edit']);
        unset($data['ma_loai_ts']);
        //
        if(isset($data['nhac_nho']))
            $data['nhac_nho'] = 1;
        else
            $data['nhac_nho'] = 0;
        if(isset($data['su_dung']))
            $data['su_dung'] = 1;
        else
            $data['su_dung'] = 0;
        //
        $result = $this->update($data_id,$data);
        if($result)
        {
            $this->set_message("LoaiTaiSanLang.asset_update_successful");
            return 0;
        }else
        {
            $this->set_message("LoaiTaiSanLang.asset_update_unsuccessful");
            return 3;
        }
    }
    public function listLoaiTaiSan()
    {
        $this->select('ma_loai_ts, ten_loai_ts');
        $this->where('su_dung',1);
        return $this->find();
    }
    public function listNhomTaiSan()
    {
        $tb = $this->db->table('nhom_tai_san');
        return $tb->get()->getResult();
    }
    public function listTKHaoMon()
    {
        $tb = $this->db->table('tk_hao_mon');
        return $tb->get()->getResult();
    }
    public function listTKNguyenGia()
    {
        $tb = $this->db->table('tk_nguyen_gia');
        return $tb->get()->getResult();
    }
    public function listTieuMuc()
    {
        $tb = $this->db->table('tieu_muc');
        return $tb->get()->getResult();
    }

    public function getLoaiTaiSan($postData=null){
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
        $this->like('ten_loai_ts',$strInput);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();

        foreach($records as $record ){
            $data[] = array(
                "ma_loai_ts"=>$record->ma_loai_ts,
                "ten_loai_ts"=>$record->ten_loai_ts,
                "thuoc_loai"=>$record->thuoc_loai,
                "nhom_ts"=>$record->nhom_ts,
                "tyle_haomon"=>$record->tyle_haomon,
                "sonam_sudung"=>$record->sonam_sudung,
                "ghi_chu"=>$record->ghi_chu,
                "tk_nguyen_gia"=>$record->tk_nguyen_gia,
                "tk_haomon"=>$record->tk_haomon,
                "tieu_muc"=>$record->tieu_muc,

                "su_dung"=>$record->su_dung==1?'<div class="badge badge-success">'.lang('AppLang.active').'</div>':
                    '<div class="badge badge-danger">'.lang('AppLang.inactive').'</div>',
                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
                             data-ma_loai_ts="'.$record->ma_loai_ts.'" data-ten_loai_ts ="'.$record->ten_loai_ts.'"                          
                             data-thuoc_loai ="'.$record->thuoc_loai.'" data-nhom_ts ="'.$record->nhom_ts.'"
                             data-tyle_haomon ="'.$record->tyle_haomon.'" data-sonam_sudung ="'.$record->sonam_sudung.'"
                             data-ghi_chu ="'.$record->ghi_chu.'" data-ghi_chu ="'.$record->sonam_sudung.'"
                             data-nhac_nho ="'.$record->nhac_nho.'" data-ky_nhacnho ="'.$record->ky_nhacnho.'"
                             data-so_ky_nhacnho ="'.$record->so_ky_nhacnho.'" data-tk_nguyen_gia ="'.$record->tk_nguyen_gia.'"
                             data-tk_haomon ="'.$record->tk_haomon.'" data-tieu_muc ="'.$record->tieu_muc.'"
                             data-su_dung ="'.$record->su_dung.'"                             
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-ma_loai_ts="'.$record->ma_loai_ts.'">
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