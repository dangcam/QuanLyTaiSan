<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\GhiTangTaiSanModel;

class GhiTangTaiSanController extends BaseController
{
    public function __construct()
    {
        $this->ghitang_model = new GhiTangTaiSanModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('ghi_tang_tai_san','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_ghi_tang'));
            return $this->page_construct('dashboard/ghi_tang_tai_san_view', $meta);
        }else
            return view('errors/html/error_403');
    }
    public function ghitang_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->ghitang_model->getGhiTangTaiSan($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function taisan_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            $return_value = $this->ghitang_model->listTaiSan($data['nam_ghi_tang']);
            echo json_encode($return_value);
        }else {
            echo json_encode('No Data');
        }
    }
    public function add_ghitang()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('ghi_tang_tai_san','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->ghitang_model->add_ghi_tang($data_post));
            $data['message']= $this->ghitang_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_ghitang()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('ghi_tang_tai_san','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->ghitang_model->edit_ghi_tang($data_post));
            $data['message']= $this->ghitang_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_ghitang()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('ghi_tang_tai_san','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->ghitang_model->delete_ghi_tang($data_post));
            $data['message']= $this->ghitang_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}