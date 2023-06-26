<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\ChucVuModel;

class ChucVuController extends BaseController
{
    public function __construct()
    {
        $this->cv_model = new ChucVuModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('position','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_position'));
            return $this->page_construct('dashboard/chuc_vu_view', $meta);
        }else
            return view('errors/html/error_403');
    }
    public function position_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->cv_model->getChucVu($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_position()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('position','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->cv_model->add_cv($data_post));
            $data['message']= $this->cv_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_position()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('position','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->cv_model->edit_cv($data_post));
            $data['message']= $this->cv_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_position()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('position','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->cv_model->delete_cv($data_post));
            $data['message']= $this->cv_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}