<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\DuAnModel;
use App\Models\TrangCapModel;

class TrangCapController extends BaseController
{
    public function __construct()
    {
        $this->tc_model = new TrangCapModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('provide_equipment','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_provide_equipment'));
            $data['list_dv'] = $this->tc_model->listDonVi();
            return $this->page_construct('dashboard/trang_cap_view', $meta,$data);
        }else
            return view('errors/html/error_403');
    }
    public function tc_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->tc_model->getTrangCap($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_tc()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('provide_equipment','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->tc_model->add_tc($data_post));
            $data['message']= $this->tc_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_tc()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('provide_equipment','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->tc_model->edit_tc($data_post));
            $data['message']= $this->tc_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_tc()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('provide_equipment','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->tc_model->delete_tc($data_post));
            $data['message']= $this->tc_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}