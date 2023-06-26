<?php
namespace App\Models;

use App\Entities\ChucVuEntity;

class ChucVuModel extends BaseModel
{
    protected $table      = 'chuc_vu';
    protected $primaryKey = 'ma_cv';
    protected $useAutoIncrement = true;
    protected $protectFields = false;
    protected $returnType = ChucVuEntity::class;
    protected $validationRules = [
        'ma_cv'      => 'required|alpha_cvsh|min_length[3]|max_length[20]|is_unique[du_an.ma_cv]',
        'ten_cv'     => 'required|max_length[50]'
    ];
    //
    public function add_cv($data)
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
            $this->set_message("ChucVuLang.cv_creation_successful");
            return 0;
        }else
        {
            $this->set_message("ChucVuLang.cv_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_cv($data)
    {
        $data_id = $data['ma_cv'];
        unset($data['edit']);
        unset($data['ma_cv']);
        $result = $this->update($data_id,$data);
        if($result)
        {
            $this->set_message("ChucVuLang.cv_update_successful");
            return 0;
        }else
        {
            $this->set_message("ChucVuLang.cv_update_unsuccessful");
            return 3;
        }
    }
    public function delete_cv($data)
    {
        $data_id = $data['ma_cv'];
        if($this->where('ma_cv',$data_id)->delete())
        {
            $this->set_message("ChucVuLang.cv_delete_successful");
            return 0;
        }else
        {
            $this->set_message("ChucVuLang.cv_delete_unsuccessful");
            return 3;
        }
    }

    public function getChucVu($postData=null){
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
        $this->like('ten_cv',$strInput);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();

        foreach($records as $record ){
            $data[] = array(
                "ma_cv"=>$record->ma_cv,
                "ten_cv"=>$record->ten_cv,
                "ghi_chu"=>$record->ghi_chu,
                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
                             data-ma_cv="'.$record->ma_cv.'" data-ten_cv ="'.$record->ten_cv.'"                          
                             data-ghi_chu ="'.$record->ghi_chu.'"
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-ma_cv="'.$record->ma_cv.'">
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