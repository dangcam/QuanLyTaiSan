<?php
namespace App\Models;
use App\Entities\TaiSanEntity;

class TaiSanModel Extends BaseModel
{
    protected $table      = 'tai_san';
    protected $primaryKey = 'ma_tai_san';
    protected $protectFields = false;
    protected $returnType    = TaiSanEntity::class;
    protected $validationRules = [
        'ma_tai_san'      => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[tai_san.ma_tai_san]',
        'ten_tai_san'     => 'required|max_length[100]'
    ];
    public function add_tai_san($data)
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
            $this->set_message("TaiSanLang.tai_san_creation_successful");
            return 0;
        }else
        {
            $this->set_message("TaiSanLang.tai_san_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_tai_san($data)
    {
        $data_id = $data['ma_tai_san'];
        unset($data['edit']);
        unset($data['ma_tai_san']);
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
            $this->set_message("TaiSanLang.tai_san_update_successful");
            return 0;
        }else
        {
            $this->set_message("TaiSanLang.tai_san_update_unsuccessful");
            return 3;
        }
    }
    public function delete_tai_san($data)
    {
        $data_id = $data['ma_tai_san'];

        if($this->where('ma_tai_san',$data_id)->delete())
        {
            $this->set_message("TaiSanLang.tai_san_delete_successful");
            return 0;
        }else
        {
            $this->set_message("TaiSanLang.tai_san_delete_unsuccessful");
            return 3;
        }
    }
    public function listLoaiTaiSan()
    {
        $this->select('ma_tai_san, ten_tai_san');
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
        $tb = $this->db->table('gia_tri_con_lai');
        return $tb->get()->getResult();
    }
    public function listTieuMuc()
    {
        $tb = $this->db->table('trang_thai');
        return $tb->get()->getResult();
    }
    public function dicNhomTaiSan($list)
    {
        $data = array();
        if (count($list)) {
            foreach ($list as $key => $item) {
                if(!isset($data[$item->id]))
                    $data[$item->id] = $item->ten_nts;
            }
        }
        return $data;
    }
    public function dicTieuMuc($list)
    {
        $data = array();
        if (count($list)) {
            foreach ($list as $key => $item) {
                if(!isset($data[$item->ma_tm]))
                    $data[$item->ma_tm] = $item->ten_tm;
            }
        }
        return $data;
    }
    public function dicTK($list)
    {
        $data = array();
        if (count($list)) {
            foreach ($list as $key => $item) {
                if(!isset($data[$item->ma_tk]))
                    $data[$item->ma_tk] = $item->ten_tk;
            }
        }
        return $data;
    }
    public function getTaiSan($postData=null){
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
        $this->like('ten_tai_san',$strInput);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $dicNhomTaiSan = $this->dicNhomTaiSan($this->listNhomTaiSan());
        $dicTKNguyenGia = $this->dicTK($this->listTKNguyenGia());
        $dicTKHaoMon = $this->dicTK($this->listTKHaoMon());
        $dicTieuMuc = $this->dicTieuMuc($this->listTieuMuc());
        $data = array();
        foreach($records as $record ){
            $data[] = array(
                "ma_tai_san"=>$record->ma_tai_san,
                "ten_tai_san"=>$record->ten_tai_san,
                "loai_tai_san"=>$record->loai_tai_san,
                "bo_phan_su_dung"=>isset($dicNhomTaiSan[$record->bo_phan_su_dung])?$dicNhomTaiSan[$record->bo_phan_su_dung]:$record->bo_phan_su_dung,
                "so_luong"=>$record->so_luong,
                "gia_tri"=>$record->gia_tri,
                "hm_luy_ke"=>$record->hm_luy_ke,
                "gia_tri_con_lai"=>$record->gia_tri_con_lai,
                "ngay_ghi_tang"=>$record->ngay_ghi_tang,
                "trang_thai"=>$record->trang_thai,           
                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
                             data-ma_tai_san="'.$record->ma_tai_san.'" data-ten_tai_san ="'.$record->ten_tai_san.'"                          
                             data-loai_tai_san ="'.$record->loai_tai_san.'" data-bo_phan_su_dung ="'.$record->bo_phan_su_dung.'"
                             data-so_luong ="'.$record->so_luong.'" data-gia_tri ="'.$record->gia_tri.'"
                             data-hm_luy_ke ="'.$record->hm_luy_ke.'"                         
                             data-gia_tri_con_lai ="'.$record->gia_tri_con_lai.'"
                             data-trang_thai ="'.$record->trang_thai.'"
                                                      
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-ma_tai_san="'.$record->ma_tai_san.'">
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