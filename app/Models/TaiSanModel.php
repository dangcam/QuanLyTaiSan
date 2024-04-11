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
        $data['group_id'] = $this->session->get('group_id');

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
        $data['group_id'] = $this->session->get('group_id');
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
    public function getMaTaiSan()
    {
        $this->select('count(*) as allcount, max(ma_tai_san) as max_ma_tai_san');
        $records = $this->find();
        $totalRecords = $records[0]->allcount;
        $ma_tai_san = $records[0]->max_ma_tai_san;
        $max_ma_tai_san = 'TS000001';
        if(strlen($ma_tai_san)>=9){
            try {
                $max_ma_tai_san = '00000' . (substr($ma_tai_san, 3, 6) + 1);
                $max_ma_tai_san = 'NCC'. (substr($max_ma_tai_san, strlen($max_ma_tai_san)-6, 6));
            }catch (Exception $e){
                $max_ma_tai_san = 'TS000001';
            }
        }
        return $max_ma_tai_san;
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
        $groupId =  $this->session->get('group_id');
        //
        ## Total number of records without filtering
        $this->select('count(*) as allcount')->where('nam_theo_doi',$searchYear)->where('group_id',$groupId);
        $records = $this->find();
        $totalRecords = $records[0]->allcount;
        ## Fetch records
        $this->like('ten_tai_san',$strInput)->where('nam_theo_doi',$searchYear)->where('group_id',$groupId);
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
    public function getReportSoTaiSanPrint($data)
    {
        $report_year = $data['report_year'];
        $group_id = $this->session->get('group_id');


        $sql = 'SELECT * FROM 
             (SELECT * FROM tai_san TS,loai_tai_san LTS WHERE TS.loai_tai_san = LTS.ma_loai_ts AND nam_theo_doi = ? AND group_id = ?) AS TS 
                 Left JOIN (SELECT GT.ma_chung_tu,ngay_chung_tu,ma_tai_san FROM ghi_tang_tai_san GT,ghi_tang_chung_tu CT WHERE GT.ma_chung_tu =CT.ma_chung_tu) AS CT 
                     ON TS.ma_tai_san = CT.ma_tai_san 
				Left JOIN (SELECT GG.ma_chung_tu as ma_ct_giam,ngay_chung_tu as ngay_ct_giam,ma_tai_san,tong_nguyen_gia, ly_do_giam 
								FROM ghi_giam_tai_san GG,ghi_giam_chung_tu CT WHERE GG.ma_chung_tu =CT.ma_chung_tu) AS GG 
                     ON TS.ma_tai_san = GG.ma_tai_san 					 
					 ORDER BY loai_tai_san;';

        $result = $this->db->query($sql,[$report_year,$group_id])->getResult();

        $row_total = array();
        $loai_tai_san = '';
        $i = 1;
        foreach ($result as $item) {
            if ($loai_tai_san == $item->loai_tai_san)
                $i++;
            else
            {
                $i = 1;
                $loai_tai_san = $item->loai_tai_san;
                $row_total[$loai_tai_san]['stt'] = 0;
                $row_total[$loai_tai_san]['ten_tai_san'] = $item->ten_loai_ts;
                $row_total[$loai_tai_san]['gia_tri'] = 0;
                $row_total[$loai_tai_san]['hm_kh_nam'] = 0;
                $row_total[$loai_tai_san]['hm_luy_ke'] = 0;
            }
            $row_total[$loai_tai_san.$i]['stt'] = $i;
            $row_total[$loai_tai_san.$i]['ma_chung_tu'] = $item->ma_chung_tu;
            $row_total[$loai_tai_san.$i]['ngay_chung_tu'] = $item->ngay_chung_tu;
            $row_total[$loai_tai_san.$i]['ten_tai_san'] = $item->ten_tai_san;
            $row_total[$loai_tai_san.$i]['nuoc_san_xuat'] = $item->nuoc_san_xuat;
            $row_total[$loai_tai_san.$i]['ngay_bd_su_dung'] = $item->ngay_bd_su_dung;
            $row_total[$loai_tai_san.$i]['ma_tai_san'] = $item->ma_tai_san;
            $row_total[$loai_tai_san.$i]['gia_tri'] = (int)$item->hm_luy_ke + (int)$item->gia_tri_con_lai;
            $row_total[$loai_tai_san.$i]['tyle_haomon'] = $item->tyle_haomon;
            $row_total[$loai_tai_san.$i]['hm_kh_nam'] = (int)$item->hm_kh_nam;
            $row_total[$loai_tai_san.$i]['hm_luy_ke'] = (int)$item->hm_luy_ke;


            //
            $row_total[$loai_tai_san]['gia_tri'] += (int)$item->hm_luy_ke + (int)$item->gia_tri_con_lai;
            $row_total[$loai_tai_san]['hm_kh_nam'] += (int)$item->hm_kh_nam;
            $row_total[$loai_tai_san]['hm_luy_ke'] += (int)$item->hm_luy_ke;
        }

        $i = 0;
        $response='';
        $row_tt = array();
        $row_tt['gia_tri'] = 0;
        $row_tt['hm_kh_nam'] = 0;
        $row_tt['hm_luy_ke'] = 0;
        foreach($row_total as $item) {
            $response .= '<tr >';
            $i++;
            if($item['stt'] == 0)
            {
                $th_td = 'th';
                $response .= '<' . $th_td . ' colspan = "8">Loại tài sản: ' . $item['ten_tai_san'] . '</' . $th_td . '>';
                $response .= '<' . $th_td . '>' . number_format($item['gia_tri']) . '</' . $th_td . '>';
                $response .= '<' . $th_td . '></' . $th_td . '>';
                $response .= '<' . $th_td . '></' . $th_td . '>';
                $response .= '<' . $th_td . '></' . $th_td . '>';
                $response .= '<' . $th_td . '>' . number_format($item['hm_kh_nam']) . '</' . $th_td . '>';
                $response .= '<' . $th_td . '>' . number_format($item['hm_kh_nam']) . '</' . $th_td . '>';
                $response .= '<' . $th_td . '>' . number_format($item['hm_luy_ke']) . '</' . $th_td . '>';
                $response .= '<' . $th_td . '></' . $th_td . '>';
                $response .= '<' . $th_td . '></' . $th_td . '>';
                $response .= '<' . $th_td . '></' . $th_td . '>';
                $response .= '<' . $th_td . '></' . $th_td . '>';
                $row_tt['gia_tri'] += (int)$item['gia_tri'];
                $row_tt['hm_kh_nam'] += (int)$item['hm_kh_nam'];;
                $row_tt['hm_luy_ke'] += (int)$item['hm_luy_ke'];;
            }else {
                $th_td = 'td';
                $response .= '<td>' . $item['stt'] . '</td>';
                $response .= '<' . $th_td . '>' . $item['ma_chung_tu'] . '</' . $th_td . '>';
                $response .= '<' . $th_td . '>' . $item['ngay_chung_tu'] . '</' . $th_td . '>';
                $response .= '<' . $th_td . '>' . $item['ten_tai_san'] . '</' . $th_td . '>';
                $response .= '<' . $th_td . '>' . $item['nuoc_san_xuat'] . '</' . $th_td . '>';
                $response .= '<' . $th_td . '>' . $item['ngay_bd_su_dung'] . '</' . $th_td . '>';
                $response .= '<' . $th_td . '>' . $item['ma_tai_san'] . '</' . $th_td . '>';
                $response .= '<' . $th_td . '>' . $item['ma_tai_san'] . '</' . $th_td . '>';
                $response .= '<' . $th_td . '>' . number_format($item['gia_tri']) . '</' . $th_td . '>';
                $response .= '<' . $th_td . '></' . $th_td . '>';
                $response .= '<' . $th_td . '></' . $th_td . '>';
                $response .= '<' . $th_td . '>' . $item['tyle_haomon'] . '</' . $th_td . '>';
                $response .= '<' . $th_td . '>' . number_format($item['hm_kh_nam']) . '</' . $th_td . '>';
                $response .= '<' . $th_td . '>' . number_format($item['hm_kh_nam']) . '</' . $th_td . '>';
                $response .= '<' . $th_td . '>' . number_format($item['hm_luy_ke']) . '</' . $th_td . '>';
                $response .= '<' . $th_td . '></' . $th_td . '>';
                $response .= '<' . $th_td . '></' . $th_td . '>';
                $response .= '<' . $th_td . '></' . $th_td . '>';
                $response .= '<' . $th_td . '></' . $th_td . '>';
            }


            $response .= '</tr>';
        }
        //
        $th_td = 'th';
        $response .= '<' . $th_td . ' colspan = "8">Cộng</' . $th_td . '>';
        $response .= '<' . $th_td . '>' . number_format($row_tt['gia_tri']) . '</' . $th_td . '>';
        $response .= '<' . $th_td . '></' . $th_td . '>';
        $response .= '<' . $th_td . '></' . $th_td . '>';
        $response .= '<' . $th_td . '></' . $th_td . '>';
        $response .= '<' . $th_td . '>' . number_format($row_tt['hm_kh_nam']) . '</' . $th_td . '>';
        $response .= '<' . $th_td . '>' . number_format($row_tt['hm_kh_nam']) . '</' . $th_td . '>';
        $response .= '<' . $th_td . '>' . number_format($row_tt['hm_luy_ke']) . '</' . $th_td . '>';
        $response .= '<' . $th_td . '></' . $th_td . '>';
        $response .= '<' . $th_td . '></' . $th_td . '>';
        $response .= '<' . $th_td . '></' . $th_td . '>';
        $response .= '<' . $th_td . '></' . $th_td . '>';
        //
        $data_table['data_table'] = array_values($row_total);
        $data_table['response'] = $response;
        return $data_table;

    }
}