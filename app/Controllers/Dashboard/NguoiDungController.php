<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\NguoiDungModel;

class NguoiDungController extends BaseController
{
    public function __construct()
    {
        $this->nd_model = new NguoiDungModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('nguoi_dung','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_users'));
            $data['list_bo_phan'] = $this->nd_model->listBoPhan();
            $data['list_chuc_vu'] = $this->nd_model->listChucVu();
            return $this->page_construct('dashboard/nguoi_dung_view', $meta,$data);
        }else
            return view('errors/html/error_403');
    }
    public function nguoi_dung_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->nd_model->getNguoiDung($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_nguoi_dung()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('nguoi_dung','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->nd_model->add_nd($data_post));
            $data['message']= $this->nd_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_nguoi_dung()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('nguoi_dung','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->nd_model->edit_nd($data_post));
            $data['message']= $this->nd_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_nguoi_dung()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('nguoi_dung','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->nd_model->delete_nd($data_post));
            $data['message']= $this->nd_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}