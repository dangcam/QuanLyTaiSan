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
        $data_nguyen_gia = $data['data'];
        unset($data['data']);

        if(!$this->validate($data))
        {
            foreach ($this->errors() as $error) {
                $this->set_message($error);
            }
            return 3;
        }
        if(!$this->insert($data))
        {
            $this->set_message("TaiSanLang.taisan_creation_successful");
            $this->db->table('nguyen_gia')->where('ma_tai_san',$data['ma_tai_san'])->delete();
            foreach ($data_nguyen_gia as $index => $item ) {
                $item['ma_tai_san'] = $data['ma_tai_san'];;
                if(strlen($item['ma_kp']) > 0)
                    $this->db->table('nguyen_gia')->insert($item);
            }
            return 0;
        }else
        {
            $this->set_message("TaiSanLang.taisan_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_tai_san($data)
    {
        $data_id = $data['ma_tai_san'];
        $data_dm = $data['data'];
        unset($data['data']);
        unset($data['edit']);
        unset($data['ma_tai_san']);
        //
        if(!isset($data['quan_ly_nha_nuoc']))
            $data['quan_ly_nha_nuoc'] = 0;
        if(!isset($data['hdsn_kkd']))
            $data['hdsn_kkd'] = 0;
        if(!isset($data['$hdsn_kd']))
            $data['hdsn_kd'] = 0;
        if(!isset($data['hdsn_ldlk']))
            $data['hdsn_ldlk'] = 0;
        if(!isset($data['hdsn_ct']))
            $data['hdsn_ct'] = 0;
        if(!isset($data['su_dung_khac']))
            $data['su_dung_khac'] = 0;
        //
        $result = $this->update($data_id,$data);
        if($result)
        {
            $this->set_message("TaiSanLang.taisan_update_successful");
            $this->db->table('nguyen_gia')->where('ma_tai_san',$data_id)->delete();
            foreach ($data_dm as $index => $item ) {
                $item['ma_tai_san'] = $data_id;
                if(strlen($item['ma_kp']) > 0)
                    $this->db->table('nguyen_gia')->insert($item);
            }
            return 0;
        }else
        {
            $this->set_message("TaiSanLang.taisan_update_unsuccessful");
            return 3;
        }
    }
    public function delete_tai_san($data)
    {
        $data_id = $data['ma_tai_san'];

        if($this->where('ma_tai_san',$data_id)->delete())
        {
            $this->db->table('nguyen_gia')->where('ma_tai_san',$data_id)->delete();
            $this->set_message("TaiSanLang.taisan_delete_successful");
            return 0;
        }else
        {
            $this->set_message("TaiSanLang.taisan_delete_unsuccessful");
            return 3;
        }
    }
    public function listNguyenGia($ma_tai_san)
    {
        $tb = $this->db->table('nguyen_gia')->where('ma_tai_san',$ma_tai_san);
        return $tb->get()->getResult();
    }
    public function listLoaiTaiSan($nhom_ts)
    {
        $tb = $this->db->table('loai_tai_san');
        $tb->select('ma_loai_ts, ten_loai_ts');
        $tb->where('su_dung',1);
        $tb->where('tyle_haomon > ',0);
        $tb->where('nhom_ts',$nhom_ts);
        $result = $tb->get()->getResult();
        $response = '';
        foreach ($result as $key){
            $response .='<option value="'.$key->ma_loai_ts.'">'.$key->ten_loai_ts.'</option>';
        }
        return $response;
    }
    public function listHuyen($ma_tinh)
    {
        $tb = $this->db->table('dm_huyen');
        $tb->where('ma_tinh',$ma_tinh);
        $result = $tb->get()->getResult();
        $response = '';
        foreach ($result as $key){
            $response .='<option value="'.$key->ma.'">'.$key->ten.'</option>';
        }
        return $response;
    }
    public function listXa($ma_huyen)
    {
        $tb = $this->db->table('dm_xa');
        $tb->where('ma_huyen',$ma_huyen);
        $result = $tb->get()->getResult();
        $response = '';
        foreach ($result as $key){
            $response .='<option value="'.$key->ma.'">'.$key->ten.'</option>';
        }
        return $response;
    }
    public function getLoaiTaiSan($ma_loai_ts)
    {
        $tb = $this->db->table('loai_tai_san');
        $tb->where('su_dung',1);
        $tb->where('ma_loai_ts',$ma_loai_ts);
        return $tb->get()->getResult();
    }
    public function listNhomTaiSan()
    {
        $tb = $this->db->table('nhom_tai_san');
        return $tb->get()->getResult();
    }
    public function listKinhPhi()
    {
        $tb = $this->db->table('nguon_kinh_phi');
        return $tb->get()->getResult();
    }
    public function listTinh()
    {
        $tb = $this->db->table('dm_tinh');
        return $tb->get()->getResult();
    }
    public function listDuAn()
    {
        $tb = $this->db->table('du_an');
        return $tb->get()->getResult();
    }
    public function listTrangCap()
    {
        $tb = $this->db->table('trang_cap');
        return $tb->get()->getResult();
    }
    public function listBoPhan()
    {
        $tb = $this->db->table('bo_phan');
        return $tb->get()->getResult();
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
    public function getTaiSanCT($ma_tai_san){
        $this->where('ma_tai_san',$ma_tai_san);
        return $this->find();
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
        // Custom search filter
        $searchYear = $postData['searchYear'];
        //
        ## Total number of records without filtering
        $this->select('count(*) as allcount')->where('nam_theo_doi',$searchYear);
        $records = $this->find();
        $totalRecords = $records[0]->allcount;
        ## Fetch records
        $this->like('ten_tai_san',$strInput)->where('nam_theo_doi',$searchYear);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $dicBoPhan = $this->dicBoPhan($this->listBoPhan());
        $data = array();
        foreach($records as $record ){
            $data[] = array(
                "ma_tai_san"=>$record->ma_tai_san,
                "ten_tai_san"=>$record->ten_tai_san,
                "loai_tai_san"=>$record->loai_tai_san,
                "bo_phan_su_dung"=>isset($dicBoPhan[$record->bo_phan_su_dung])?$dicBoPhan[$record->bo_phan_su_dung]:$record->bo_phan_su_dung,
                "so_luong"=>$record->so_luong,
                "gia_tri"=>number_format((int)$record->hm_luy_ke+(int)$record->gia_tri_con_lai),
                "hm_luy_ke"=>number_format($record->hm_luy_ke),
                "gia_tri_con_lai"=>number_format($record->gia_tri_con_lai),
                "ngay_ghi_tang"=>$record->ngay_ghi_tang,
                "trang_thai"=>lang('TaiSanLang.trang_thai_'.$record->trang_thai),
                "active"=> ' <span>
                            <a class="mr-4"                              
                                      href="'.base_url().'dashboard/tai_san/tai_san_ct?year='.$record->nam_theo_doi.'&ma_tai_san='.$record->ma_tai_san.'"                                                                                                   
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
    public function getReportTaiSan($postData=null){
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $strInput=$postData['search']['value'];
        // Custom search filter
        $searchYear = $postData['searchYear'];
        $searchBoPhan = $postData['searchBoPhan'];
        //
        ## Total number of records without filtering
        $this->select('count(*) as allcount')->where('nam_theo_doi',$searchYear);
        if(strlen($searchBoPhan)>0)
            $this->where('bo_phan_su_dung',$searchBoPhan);
        $records = $this->find();
        $totalRecords = $records[0]->allcount;
        ## Fetch records
        $this->like('ten_tai_san',$strInput)->where('nam_theo_doi',$searchYear);
        if(strlen($searchBoPhan)>0)
            $this->where('bo_phan_su_dung',$searchBoPhan);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $dicBoPhan = $this->dicBoPhan($this->listBoPhan());
        $data = array();
        foreach($records as $record ){
            $data[] = array(
                "ma_tai_san"=>$record->ma_tai_san,
                "ten_tai_san"=>$record->ten_tai_san,
                "loai_tai_san"=>$record->loai_tai_san,
                "bo_phan_su_dung"=>isset($dicBoPhan[$record->bo_phan_su_dung])?$dicBoPhan[$record->bo_phan_su_dung]:$record->bo_phan_su_dung,
                "so_luong"=>$record->so_luong,
                "gia_tri"=>number_format((int)$record->hm_luy_ke+(int)$record->gia_tri_con_lai),
                "hm_luy_ke"=>number_format($record->hm_luy_ke),
                "gia_tri_con_lai"=>number_format($record->gia_tri_con_lai),
                "ngay_ghi_tang"=>$record->ngay_ghi_tang,
                "trang_thai"=>lang('TaiSanLang.trang_thai_'.$record->trang_thai)
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data,
            "data_table" => $data,
        );

        return $response;
    }
}