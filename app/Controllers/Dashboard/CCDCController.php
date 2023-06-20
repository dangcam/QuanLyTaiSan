<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\CongDungCuModel;

class CCDCController extends BaseController
{
    public function __construct()
    {
        $this->ccdc_model = new CongDungCuModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('ccdc','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_tool'));
            $data['list_ccdc'] = $this->ccdc_model->listCCDC();
            return $this->page_construct('dashboard/ccdc_view', $meta,$data);
        }else
            return view('errors/html/error_403');
    }
    public function tool_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->ccdc_model->getTools($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_tool()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('ccdc','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->ccdc_model->add_tool($data_post));
            $data['message']= $this->ccdc_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_tool()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('ccdc','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->ccdc_model->edit_tool($data_post));
            $data['message']= $this->ccdc_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_tool()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('ccdc','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->ccdc_model->delete_tool($data_post));
            $data['message']= $this->ccdc_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}