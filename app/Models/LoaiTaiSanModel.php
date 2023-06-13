<?php
namespace App\Models;
use App\Entities\LoaiTaiSanEntity;

class LoaiTaiSanModel Extends BaseModel
{
    protected $table      = 'loai_tai_san';
    protected $primaryKey = 'ma_loai_ts';
    protected $protectFields = false;
    protected $returnType    = LoaiTaiSanEntity::class;


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
                             data-ghi_chu ="'.$record->tyle_haomon.'" data-ghi_chu ="'.$record->sonam_sudung.'"
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