<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\KinhPhiModel;

class KinhPhiController extends BaseController
{
    public function __construct()
    {
        $this->kp_model = new KinhPhiModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('funding','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_funding'));
            $data['list_kp'] = $this->kp_model->listKinhPhi();
            $data['list_nguon_ht'] = $this->kp_model->listNguonHT();
            return $this->page_construct('dashboard/funding_view', $meta,$data);
        }else
            return view('errors/html/error_403');
    }
    public function funding_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->kp_model->getKinhPhi($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_funding()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('funding','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->kp_model->add_kp($data_post));
            $data['message']= $this->kp_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_funding()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('funding','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->kp_model->edit_kp($data_post));
            $data['message']= $this->kp_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_funding()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('funding','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->kp_model->delete_kp($data_post));
            $data['message']= $this->kp_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}