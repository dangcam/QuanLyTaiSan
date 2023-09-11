<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\GhiGiamTaiSanModel;

class GhiGiamTaiSanController extends BaseController
{
    public function __construct()
    {
        $this->ghigiam_model = new GhiGiamTaiSanModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('ghi_giam_tai_san','view')) {
            $meta = array('page_title' => lang('AppLang.page_title_ghi_giam'));
            return $this->page_construct('dashboard/ghi_giam_tai_san_view', $meta);
        }else
            return view('errors/html/error_403');
    }
    public function ghigiam_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->ghigiam_model->getghigiamTaiSan($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function taisan_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            $return_value = $this->ghigiam_model->listTaiSan($data['nam_ghi_giam']);
            echo json_encode($return_value);
        }else {
            echo json_encode('No Data');
        }
    }
    public function ghigiam_taisan_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            $return_value = $this->ghigiam_model->listghigiamTaiSan($data['ma_chung_tu']);
            echo json_encode($return_value);
        }else {
            echo json_encode('No Data');
        }
    }
    public function add_ghigiam()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('ghi_tang_tai_san','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->ghigiam_model->add_ghi_tang($data_post));
            $data['message']= $this->ghigiam_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_ghigiam()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('ghi_tang_tai_san','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->ghigiam_model->edit_ghi_tang($data_post));
            $data['message']= $this->ghigiam_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_ghigiam()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('ghi_tang_tai_san','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->ghigiam_model->delete_ghi_tang($data_post));
            $data['message']= $this->ghigiam_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}