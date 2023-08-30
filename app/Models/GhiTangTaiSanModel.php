<?php
namespace App\Models;
use App\Entities\GhiTangTaiSanEntity;

class GhiTangTaiSanModel Extends BaseModel
{
    protected $table      = 'ghi_tang_tai_san';
    protected $primaryKey = 'ma_chung_tu';
    protected $protectFields = false;
    protected $returnType    = GhiTangTaiSanEntity::class;
    protected $validationRules = [
        'ma_chung_tu'      => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[ghi_tang_tai_san.ma_chung_tu]',
        'ngay_chung_tu'     => 'required',
        'ngay_ghi_tang'     => 'required',
    ];
    public function add_ghi_tang($data)
    {
        unset($data['add']);
        $data_ghi_tang = $data['data'];
        unset($data['data']);
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
            $this->set_message("GhiTangTaiSanLang.ghitang_creation_successful");
            $this->db->table('ghi_tang_chung_tu')->where('ma_chung_tu',$data['ma_chung_tu'])->delete();
            foreach ($data_ghi_tang as $index => $item ) {
                $item['ma_chung_tu'] = $data['ma_chung_tu'];;
                $this->db->table('ghi_tang_chung_tu')->insert($item);
            }
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
        $data_ghi_tang = $data['data'];
        unset($data['data']);
        unset($data['edit']);
        unset($data['ma_chung_tu']);
        //
        if(isset($data['su_dung']))
            $data['su_dung'] = 1;
        else
            $data['su_dung'] = 0;
        //
        $result = $this->update($data_id,$data);
        if($result)
        {
            $this->set_message("GhiTangTaiSanLang.ghitang_update_successful");
            $this->db->table('ghi_tang_chung_tu')->where('ma_chung_tu',$data_id)->delete();
            foreach ($data_ghi_tang as $index => $item ) {
                $item['ma_chung_tu'] = $data_id;
                $this->db->table('ghi_tang_chung_tu')->insert($item);
            }
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
        $tb = $this->db->table('tai_san');
        $tb->where('trang_thai',0);
        $tb->where('nam_theo_doi',$nam_ghi_tang);
        $result = $tb->get()->getResult();
        $response = '';
        foreach ($result as $key){
            $response .='<tr>';
            $response .='<td><input type="checkbox" class="item-checkbox"></td>';
            $response .='<td>'.$key->ma_tai_san.'</td>';
            $response .='<td>'.$key->ten_tai_san.'</td>';
            $response .='<td>'.$key->bo_phan_su_dung.'</td>';
            $response .='<td>'.($key->hm_luy_ke + $key->gia_tri_con_lai).'</td>';
            $response .='<td>'.($key->hm_luy_ke).'</td>';
            $response .='<td>'.($key->gia_tri_con_lai).'</td>';
            $response .='</tr>';
        }
        return $response;
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
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
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
}