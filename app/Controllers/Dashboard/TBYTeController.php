<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\TBYTeModel;

class TBYTeController extends BaseController
{
    public function __construct()
    {
        $this->tb_model = new TBYTeModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('tbyte','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_tbyte'));
            $data['list_tb'] = $this->tb_model->listTBYTe();
            return $this->page_construct('dashboard/tbyte_view', $meta,$data);
        }else
            return view('errors/html/error_403');
    }
    public function tbyte_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->tb_model->getTBYTe($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_tbyte()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('tbyte','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->tb_model->add_tb($data_post));
            $data['message']= $this->tb_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_tbyte()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('tbyte','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->tb_model->edit_tb($data_post));
            $data['message']= $this->tb_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_tbyte()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('tbyte','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->tb_model->delete_tb($data_post));
            $data['message']= $this->tb_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}