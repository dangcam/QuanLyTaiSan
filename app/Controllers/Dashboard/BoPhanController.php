<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\BoPhanModel;
use App\Models\LoaiTaiSanModel;

class BoPhanController extends BaseController
{
    public function __construct()
    {
        $this->bp_model = new BoPhanModel();

    }
    public function index()
    {
        $meta = array('page_title'=>lang('AppLang.page_title_department'));
        $data['list_bp'] = $this->bp_model->listBoPhan();
        $data['list_chuong'] = $this->bp_model->listChuong();
        $data['list_khoan'] = $this->bp_model->listKhoan();
        return $this->page_construct('dashboard/bo_phan_view',$meta,$data);
    }
    public function department_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->bp_model->getBoPhan($this->request->getPost());
            echo json_encode($data);
        }
    }
    //
    public function add_department()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('department','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->bp_model->add_bp($data_post));
            $data['message']= $this->bp_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function delete_department()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('department','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->bp_model->delete_bp($data_post));
            $data['message']= $this->bp_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_department()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('department','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->bp_model->edit_bp($data_post));
            $data['message']= $this->bp_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}