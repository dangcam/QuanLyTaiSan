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
        unset($data['id']);
        if($this->insert($data))
        {
            $this->set_message("TaiSanLang.taisan_creation_successful");
            return 0;
        }else
        {
            $this->set_message("TaiSanLang.taisan_creation_unsuccessful");
            return 3;
        }
    }
    public function add_import($data)
    {
        // Loại bỏ các trường không cần thiết
        unset($data['add']);
        unset($data['id']);

        // Kiểm tra dữ liệu đầu vào
        if (empty($data['ten_tai_san']) || !is_numeric($data['so_luong'])) {
            log_message('error', 'Invalid data: ' . json_encode($data));
            $this->set_message("TaiSanLang.taisan_invalid_data");
            return 1; // Lỗi dữ liệu
        }

        // Chèn dữ liệu vào cơ sở dữ liệu
        if ($this->insert($data)) {
            $this->set_message("TaiSanLang.taisan_creation_successful");
            return 0; // Thành công
        } else {
            log_message('error', 'Failed to insert asset: ' . $this->errors());
            $this->set_message("TaiSanLang.taisan_creation_unsuccessful");
            return 3; // Thất bại
        }
    }
    public function edit_asset($data)
    {
        $data_id = $data['id'];
        unset($data['edit']);
        unset($data['id']);
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
        $data_id = $data['id'];
        if($this->where('id',$data_id)->delete())
        {
            $this->set_message("TaiSanLang.taisan_delete_successful");
            return 0;
        }else
        {
            $this->set_message("TaiSanLang.taisan_delete_unsuccessful");
            return 3;
        }
    }
    public function listBoPhan()
    {
        $tb = $this->db->table('bo_phan');
        return $tb->get()->getResult();
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
        $searchYear = $postData['searchYear'];
        $searchBoPhan = $postData['searchBoPhan'];
        $searchLoaiKK = $postData['searchLoaiKK'];
        //
        ## Total number of records without filtering
        $this->select('count(*) as allcount')->where('nam_kiem_ke',$searchYear)->where('loai_kiem_ke',$searchLoaiKK)->where('bo_phan_su_dung',$searchBoPhan);
        $records = $this->find();
        $totalRecords = $records[0]->allcount;
        ## Fetch records
        $this->like('ten_tai_san',$strInput)->where('nam_kiem_ke',$searchYear)->where('loai_kiem_ke',$searchLoaiKK)->where('bo_phan_su_dung',$searchBoPhan);
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
                             data-loai_kiem_ke ="'.$record->loai_kiem_ke.'"
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
            "aaData" => $data,
            "data_table" => $data,
        );

        return $response;
    }

}