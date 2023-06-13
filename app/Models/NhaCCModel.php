<?php


namespace App\Models;
use App\Entities\NhaCCEntity;

class NhaCCModel extends BaseModel
{
    protected $table      = 'nha_cung_cap';
    protected $primaryKey = 'ma_ncc';
    protected $protectFields = false;
    protected $returnType    = NhaCCEntity::class;
    protected $validationRules = [
        'ma_ncc'      => 'required|alpha_dash|min_length[3]|max_length[20]|is_unique[functions.function_id]',
        'ten_ncc'     => 'required|max_length[50]'
    ];
    //
    public function add_nhaCC($data)
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
            $this->set_message("NhaCCLang.ncc_creation_successful");
            return 0;
        }else
        {
            $this->set_message("NhaCCLang.ncc_creation_unsuccessful");
            return 3;
        }
    }
    public function edit_nhaCC($data)
    {
        $ma_ncc = $data['ma_ncc'];
        unset($data['edit']);
        unset($data['ma_ncc']);
        $result = $this->update($ma_ncc,$data);
        if($result)
        {
            $this->set_message("NhaCCLang.ncc_update_successful");
            return 0;
        }else
        {
            $this->set_message("NhaCCLang.ncc_update_unsuccessful");
            return 3;
        }
    }
    public function delete_nhaCC($data)
    {
        $ma_ncc = $data['ma_ncc'];

        if($this->where('ma_ncc',$ma_ncc)->delete())
        {
            $this->set_message("NhaCCLang.ncc_delete_successful");
            return 0;
        }else
        {
            $this->set_message("NhaCCLang.ncc_delete_unsuccessful");
            return 3;
        }
    }
    public function getNhaCCs($postData=null){
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
        $this->select('count(*) as allcount, max(ma_ncc) as max_ma_ncc');
        $records = $this->find();
        $totalRecords = $records[0]->allcount;
        $ma_ncc = $records[0]->max_ma_ncc;
        $max_ma_ncc = 'NCC000001';
        if(strlen($ma_ncc)>=9){
            try {
                $max_ma_ncc = '00000' . (substr($ma_ncc, 3, 6) + 1);
                $max_ma_ncc = 'NCC'. (substr($max_ma_ncc, strlen($max_ma_ncc)-6, 6));
            }catch (Exception $e){
                $max_ma_ncc = 'NCC000001';
            }
        }
        ## Fetch records
        $this->like('ten_ncc',$strInput);
        $this->orderBy($columnName, $columnSortOrder);
        if($rowperpage!=-1)
            $this->limit($rowperpage, $start);
        $records = $this->find();

        $data = array();

        foreach($records as $record ){
            $data[] = array(
                "ma_ncc"=>$record->ma_ncc,
                "ten_ncc"=>$record->ten_ncc,
                "dia_chi"=>$record->dia_chi,
                "ncc_status"=>$record->ncc_status==1?'<div class="badge badge-success">'.lang('AppLang.active').'</div>':
                    '<div class="badge badge-danger">'.lang('AppLang.inactive').'</div>',
                "active"=> ' <span>
                            <a class="mr-4" data-toggle="modal" data-target="#myModal" data-whatever="edit"
                             data-ma_ncc="'.$record->ma_ncc.'" data-ten_ncc ="'.$record->ten_ncc.'"                          
                            data-ncc_status ="'.$record->ncc_status.'" data-dia_chi ="'.$record->dia_chi.'"  
                                data-placement="top" title="'.lang('AppLang.edit').'"><i class="fa fa-pencil color-muted"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#smallModal"
                                data-placement="top" title="'.lang('AppLang.delete').'" data-ma_ncc="'.$record->ma_ncc.'">
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
            "max_ncc" => $max_ma_ncc
        );

        return $response;
    }

}