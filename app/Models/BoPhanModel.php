<?php
namespace App\Models;

use App\Entities\TrangCapEntity;

class BoPhanModel extends BaseModel
{
    protected $table      = 'bo_phan';
    protected $primaryKey = 'ma_bp';
    protected $useAutoIncrement = true;
    protected $protectFields = false;
    protected $returnType = TrangCapEntity::class;
    protected $validationRules = [
        'ma_bp'      => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[bo_phan.ma_bp]',
        'ten_bp'     => 'required|max_length[50]'
    ];
    //
    public function add_bp($data)
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
            $this->set_message("BoPhanLang.bp_creation_successful");
            return 0;
        }else
        {
            $this->set_message("BoPhanLang.bp_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_bp($data)
    {
        $data_id = $data['ma_bp'];
        unset($data['edit']);
        unset($data['ma_bp']);
        $result = $this->update($data_id,$data);
        if($result)
        {
            $this->set_message("BoPhanLang.bp_update_successful");
            return 0;
        }else
        {
            $this->set_message("BoPhanLang.bp_update_unsuccessful");
            return 3;
        }
    }
    public function delete_bp($data)
    {
        $data_id = $data['ma_bp'];
        if($this->where('ma_bp',$data_id)->delete())
        {
            $this->set_message("BoPhanLang.bp_delete_successful");
            return 0;
        }else
        {
            $this->set_message("BoPhanLang.bp_delete_unsuccessful");
            return 3;
        }
    }
    public function listBoPhan()
    {
        $this->select('ma_bp, ten_bp');
        return $this->find();
    }
    public function listChuong()
    {
        $tb = $this->db->table('chuong_md');
        return $tb->get()->getResult();
    }
    public function listKhoan()
    {
        $tb = $this->db->table('khoan_md');
        return $tb->get()->getResult();
    }
    public function dicChuongKhoan($list)
    {
        $data = array();
        if (count($list)) {
            foreach ($list as $key => $item) {
                if(!isset($data[$item->ma]))
                    $data[$item->ma] = $item->ten;
            }
        }
        return $data;
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
    public function getBoPhan($postData=null){
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
        $this->like('ten_bp',$strInput);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();
        $dicChuong = $this->dicChuongKhoan($this->listChuong());
        $dicKhoan = $this->dicChuongKhoan($this->listKhoan());
        $dicBoPhan = $this->dicBoPhan($this->listBoPhan());
        foreach($records as $record ){
            $data[] = array(
                "ma_bp"=>$record->ma_bp,
                "ten_bp"=>$record->ten_bp,
                "ghi_chu"=>$record->ghi_chu,
                "truc_thuoc"=>isset($dicBoPhan[$record->truc_thuoc])?$dicBoPhan[$record->truc_thuoc]:$record->truc_thuoc,
                "chuong_md" => isset($dicChuong[$record->chuong_md])?$dicChuong[$record->chuong_md]:$record->chuong_md,
                "khoan_md" => isset($dicKhoan[$record->khoan_md])?$dicKhoan[$record->khoan_md]:$record->khoan_md,
                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
                             data-ma_bp="'.$record->ma_bp.'" data-ten_bp ="'.$record->ten_bp.'"                          
                             data-truc_thuoc ="'.$record->truc_thuoc.'" data-ghi_chu ="'.$record->ghi_chu.'"
                             data-chuong_md ="'.$record->chuong_md.'" data-khoan_md ="'.$record->khoan_md.'"
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-ma_bp="'.$record->ma_bp.'">
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