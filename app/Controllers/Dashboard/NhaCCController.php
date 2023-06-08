<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\NhaCCModel;

class NhaCCController extends BaseController
{
    private $function_model;
    public function __construct()
    {
        $this->ncc_model = new NhaCCModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('nha_cc','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_supplier'));
            return $this->page_construct('dashboard/nha_cc_view', $meta);
        }else
            return view('errors/html/error_403');
    }
    public function nhacc_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->ncc_model->getNhaCCs($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_nhacc()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('nha_cc','add')))
        {
            $data_function = $this->request->getPost();
            $data['result'] = ($this->ncc_model->add_nhaCC($data_function));
            $data['message']= $this->ncc_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_nhacc()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('nha_cc','edit')))
        {
            $data_ncc = $this->request->getPost();
            $data['result'] = ($this->ncc_model->edit_nhaCC($data_ncc));
            $data['message']= $this->ncc_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_nhacc()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('nha_cc','delete')))
        {
            $data_ncc = $this->request->getPost();
            $data['result'] = ($this->ncc_model->delete_nhaCC($data_ncc));
            $data['message']= $this->ncc_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}