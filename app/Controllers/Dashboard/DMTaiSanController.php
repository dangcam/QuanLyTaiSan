<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\DMTaiSanModel;

class DMTaiSanController extends BaseController
{
    public function __construct()
    {
        $this->dm_ts_model = new DMTaiSanModel();

    }
    public function index()
    {
        $meta = array('page_title'=>lang('AppLang.page_title_property_norms'));
        $data['list_dm_tai_san'] = $this->dm_ts_model->listDMTaiSan();
        $data['list_chuc_vu'] = $this->dm_ts_model->listChucVu();
        $data['list_bo_phan'] = $this->dm_ts_model->listBoPhan();

        return $this->page_construct('dashboard/dm_tai_san_view',$meta,$data);
    }
    public function dm_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->dm_ts_model->getDMTaiSan($this->request->getPost());
            echo json_encode($data);
        }
    }
    //
    public function add_dm()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('property_norms','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->dm_ts_model->add_asset($data_post));
            $data['message']= $this->dm_ts_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function delete_dm()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('property_norms','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->dm_ts_model->delete_asset($data_post));
            $data['message']= $this->dm_ts_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_dm()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('property_norms','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->dm_ts_model->edit_asset($data_post));
            $data['message']= $this->dm_ts_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}