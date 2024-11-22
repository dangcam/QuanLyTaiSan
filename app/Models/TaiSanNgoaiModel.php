<?php
namespace App\Models;

use App\Entities\TaiSanNgoaiEntity;

class TaiSanNgoaiModel extends BaseModel
{
    protected $table      = 'tai_san_ngoai';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $protectFields = false;
    protected $returnType = TaiSanNgoaiEntity::class;

    //
    public function add_asset($data)
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
            $this->set_message("TaiSanLang.taisan_creation_successful");
            return 0;
        }else
        {
            $this->set_message("TaiSanLang.taisan_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_asset($data)
    {
        $data_id = $data['ma_da'];
        unset($data['edit']);
        unset($data['ma_da']);
        $result = $this->update($data_id,$data);
        if($result)
        {
            $this->set_message("TaiSanLang.taisan_update_successful");
            return 0;
        }else
        {
            $this->set_message("TaiSanLang.taisan_update_unsuccessful");
            return 3;
        }
    }
    public function delete_asset($data)
    {
        $data_id = $data['ma_da'];
        if($this->where('ma_da',$data_id)->delete())
        {
            $this->set_message("TaiSanLang.taisan_delete_successful");
            return 0;
        }else
        {
            $this->set_message("TaiSanLang.taisan_delete_unsuccessful");
            return 3;
        }
    }
    public function listDuAn()
    {
        $this->select('ma_da, ten_da');
        $this->where('su_dung',1);
        return $this->find();
    }
    public function getTaiSanNgoai($postData=null){
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

        $data = array();

        foreach($records as $record ){
            $data[] = array(
                "ten_tai_san"=>$record->ten_tai_san,
                "so_luong"=>$record->so_luong,
                "don_vi"=>$record->don_vi,
                "nguoi_su_dung"=>$record->nguoi_su_dung,
                "ghi_chu"=>$record->ghi_chu,
                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
                             data-id="'.$record->id.'" data-ten_tai_san ="'.$record->ten_tai_san.'"                          
                             data-so_luong="'.$record->so_luong.'" data-don_vi ="'.$record->don_vi.'"                          
                             data-ghi_chu ="'.$record->ghi_chu.'" data-nguoi_su_dung ="'.$record->nguoi_su_dung.'"
                             data-bo_phan_su_dung ="'.$record->bo_phan_su_dung.'" data-nam_kiem_ke ="'.$record->nam_kiem_ke.'"
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-id="'.$record->id.'">
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