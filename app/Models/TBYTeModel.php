<?php
namespace App\Models;

use App\Entities\TBYTeEntity;

class TBYTeModel extends BaseModel
{
    protected $table      = 'thiet_bi_yte';
    protected $primaryKey = 'ma_tb';
    protected $useAutoIncrement = true;
    protected $protectFields = false;
    protected $returnType = TBYTeEntity::class;
    protected $validationRules = [
        'ma_tb'      => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[functions.function_id]',
        'ten_tb'     => 'required|max_length[50]'
    ];
    //
    public function add_tb($data)
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
            $this->set_message("TBYTeLang.tb_creation_successful");
            return 0;
        }else
        {
            $this->set_message("TBYTeLang.tb_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_tb($data)
    {
        $data_id = $data['ma_tb'];
        unset($data['edit']);
        unset($data['ma_tb']);
        $result = $this->update($data_id,$data);
        if($result)
        {
            $this->set_message("TBYTeLang.tb_update_successful");
            return 0;
        }else
        {
            $this->set_message("TBYTeLang.tb_update_unsuccessful");
            return 3;
        }
    }
    public function delete_tb($data)
    {
        $data_id = $data['ma_tb'];
        if($this->where('ma_tb',$data_id)->delete())
        {
            $this->set_message("TBYTeLang.tb_delete_successful");
            return 0;
        }else
        {
            $this->set_message("TBYTeLang.tb_delete_unsuccessful");
            return 3;
        }
    }
    public function listTBYTe()
    {
        $this->select('ma_tb, ten_tb');
        $this->where('su_dung',1);
        return $this->find();
    }
    public function getTBYTe($postData=null){
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
        $this->like('ten_tb',$strInput);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();

        foreach($records as $record ){
            $data[] = array(
                "ma_tb"=>$record->ma_tb,
                "ten_tb"=>$record->ten_tb,
                "thuoc_loai"=>$record->thuoc_loai,
                "ghi_chu"=>$record->ghi_chu,
                "su_dung"=>$record->su_dung==1?'<div class="badge badge-success">'.lang('AppLang.active').'</div>':
                    '<div class="badge badge-danger">'.lang('AppLang.inactive').'</div>',
                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
                             data-ma_tb="'.$record->ma_tb.'" data-ten_tb ="'.$record->ten_tb.'"                          
                             data-thuoc_loai ="'.$record->thuoc_loai.'" data-ghi_chu ="'.$record->ghi_chu.'"
                             data-su_dung ="'.$record->su_dung.'"
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-ma_tb="'.$record->ma_tb.'">
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