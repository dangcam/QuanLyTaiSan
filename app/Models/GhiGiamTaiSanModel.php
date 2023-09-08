<?php
namespace App\Models;
use App\Entities\GhiTangTaiSanEntity;

class GhiGiamTaiSanModel Extends BaseModel
{
    protected $table      = 'ghi_tang_tai_san';
    protected $primaryKey = 'ma_chung_tu';
    protected $protectFields = false;
    protected $returnType    = GhiGiamTaiSanEntity::class;
    protected $validationRules = [
        'ma_chung_tu'      => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[ghi_tang_tai_san.ma_chung_tu]',
        'ngay_chung_tu'     => 'required',
        'ngay_ghi_giam'     => 'required',
    ];
    public function add_ghi_tang($data)
    {
        unset($data['add']);
        $data_ghi_tang = $data['selectedRows'];
        unset($data['selectedRows']);
        if(!$this->validate($data))
        {
            foreach ($this->errors() as $error) {
                $this->set_message($error);
            }
            return 3;
        }
        if(!$this->insert($data))
        {
            $this->extracted($data_ghi_tang, $data['ma_chung_tu']);
            $this->set_message("GhiTangTaiSanLang.ghitang_creation_successful");
            return 0;
        }else
        {
            $this->set_message("GhiTangTaiSanLang.ghitang_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_ghi_tang($data)
    {
        $data_id = $data['ma_chung_tu'];
        $data_ghi_tang = $data['selectedRows'];
        unset($data['selectedRows']);
        unset($data['edit']);
        unset($data['ma_chung_tu']);

        $result = $this->update($data_id,$data);
        if($result)
        {

            //
            $result_gt = $this->db->table('ghi_tang_chung_tu')->where('ma_chung_tu',$data_id)->get()->getResult();
            foreach ($result_gt as $key){
                $this->db->table('tai_san')->set('trang_thai',0)->where('trang_thai',1)
                    ->where('ma_tai_san',$key->ma_tai_san)->update();
            }
            //
            $this->db->table('ghi_tang_chung_tu')->where('ma_chung_tu',$data_id)->delete();
            $this->extracted($data_ghi_tang, $data_id);


            $this->set_message("GhiTangTaiSanLang.ghitang_update_successful");
            return 0;
        }else
        {
            $this->set_message("GhiTangTaiSanLang.ghitang_update_unsuccessful");
            return 3;
        }
    }
    public function delete_ghi_tang($data)
    {
        $data_id = $data['ma_chung_tu'];

        if($this->where('ma_chung_tu',$data_id)->delete())
        {
            //
            $result = $this->db->table('ghi_tang_chung_tu')->where('ma_chung_tu',$data_id)->get()->getResult();
            foreach ($result as $key){
                $this->db->table('tai_san')->set('trang_thai',0)->where('trang_thai',1)
                    ->where('ma_tai_san',$key->ma_tai_san)->update();
            }
            //
            $this->db->table('ghi_tang_chung_tu')->where('ma_chung_tu',$data_id)->delete();
            $this->set_message("GhiTangTaiSanLang.ghitang_delete_successful");
            return 0;
        }else
        {
            $this->set_message("GhiTangTaiSanLang.ghitang_delete_unsuccessful");
            return 3;
        }
    }
    public function listTaiSan($nam_ghi_tang)
    {
        $dicBoPhan = $this->dicBoPhan($this->listBoPhan());
        $tb = $this->db->table('tai_san');
        $tb->where('trang_thai !=',1);
        $tb->where('nam_theo_doi',$nam_ghi_tang);
        $result = $tb->get()->getResult();
        $response = '';
        foreach ($result as $key){
            $response .='<tr>';
            $response .='<td><input type="checkbox" class="item-checkbox"></td>';
            $response .='<td>'.$key->ma_tai_san.'</td>';
            $response .='<td>'.$key->ten_tai_san.'</td>';
            $response .='<td>'.($dicBoPhan[$key->bo_phan_su_dung] ?? $key->bo_phan_su_dung).'</td>';
            $response .='<td>'.($key->hm_luy_ke + $key->gia_tri_con_lai).'</td>';
            $response .='<td>'.($key->hm_luy_ke).'</td>';
            $response .='<td>'.($key->gia_tri_con_lai).'</td>';
            $response .='</tr>';
        }
        return $response;
    }
    public function listGhiTangTaiSan($ma_chung_tu)
    {
        $data= array();
        $dicBoPhan = $this->dicBoPhan($this->listBoPhan());
        $sql = 'SELECT tai_san.ma_tai_san,ten_tai_san,bo_phan_su_dung,hm_luy_ke,gia_tri_con_lai 
                FROM ghi_tang_chung_tu, tai_san WHERE (ma_chung_tu = ?)
                            AND ghi_tang_chung_tu.ma_tai_san = tai_san.ma_tai_san';
        $result = $this->db->query($sql,$ma_chung_tu)->getResult();
        foreach ($result as $key) {
            $item['maTaiSan'] = $key->ma_tai_san;
            $item['tenTaiSan'] = $key->ten_tai_san;
            $item['boPhanSuDung'] = ($dicBoPhan[$key->bo_phan_su_dung] ?? $key->bo_phan_su_dung);
            $item['giaTri'] = ($key->hm_luy_ke + $key->gia_tri_con_lai);
            $item['hmLuyKe'] = $key->hm_luy_ke;
            $item['giaTriConLai'] = $key->gia_tri_con_lai;
            $data[] = $item;
        }

        return $data;
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
    public function getGhiTangTaiSan($postData=null){
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
        $this->select('count(*) as allcount')->where('nam_ghi_tang',$searchYear);
        $records = $this->find();
        $totalRecords = $records[0]->allcount;
        ## Fetch records
        $this->like('ma_chung_tu',$strInput)->where('nam_ghi_tang',$searchYear);;
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();
        foreach($records as $record ){

            $data[] = array(
                "ma_chung_tu"=>$record->ma_chung_tu,
                "ngay_chung_tu"=>$record->ngay_chung_tu,
                "ngay_ghi_tang"=>$record->ngay_ghi_tang,
                "tong_nguyen_gia"=>$record->tong_nguyen_gia,
                "ghi_chu"=>$record->ghi_chu,
                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal_Full" data-whatever="edit"
                             data-ma_chung_tu="'.$record->ma_chung_tu.'" data-ngay_chung_tu ="'.$record->ngay_chung_tu.'"                          
                             data-ngay_ghi_tang ="'.$record->ngay_ghi_tang.'" data-tong_nguyen_gia ="'.$record->tong_nguyen_gia.'"
                             data-ghi_chu ="'.$record->ghi_chu.'"                            
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-ma_chung_tu="'.$record->ma_chung_tu.'">
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

    /**
     * @param $data_ghi_tang
     * @param $ma_chung_tu
     * @return void
     */
    public function extracted($data_ghi_tang, $ma_chung_tu): void
    {
        foreach ($data_ghi_tang as $index => $item) {
            $ghi_tang['ma_chung_tu'] = $ma_chung_tu;
            $ghi_tang['ma_tai_san'] = $item['maTaiSan'];
            $this->db->table('ghi_tang_chung_tu')->insert($ghi_tang);
            $this->db->table('tai_san')->set('trang_thai', 1)->where('ma_tai_san', $ghi_tang['ma_tai_san'])->update();
        }
    }
}