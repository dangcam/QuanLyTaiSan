<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\DuAnModel;

class DuAnController extends BaseController
{
    public function __construct()
    {
        $this->da_model = new DuAnModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('project','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_project'));
            return $this->page_construct('dashboard/du_an_view', $meta);
        }else
            return view('errors/html/error_403');
    }
    public function project_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->da_model->getDuAn($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_project()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('project','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->da_model->add_da($data_post));
            $data['message']= $this->da_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_project()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('project','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->da_model->edit_da($data_post));
            $data['message']= $this->da_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_project()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('project','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->da_model->delete_da($data_post));
            $data['message']= $this->da_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}