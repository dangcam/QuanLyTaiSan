<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\TaiSanModel;

class TaiSanController extends BaseController
{
    public function __construct()
    {
        $this->tai_san_model = new TaiSanModel();
    }
    public function index()
    {
        if($this->libauth->checkFunction('tai_san','view')) {
        $meta = array('page_title' => lang('AppLang.page_title_tai_san'));
        return $this->page_construct('dashboard/tai_san_view', $meta);
        }else
            return view('errors/html/error_403');
    }
    public function tai_san_ct()
    {
        $meta = array('page_title'=>lang('AppLang.page_title_tai_san'));
        $data['list_kinh_phi'] = $this->tai_san_model->listKinhPhi();
        $data['list_nhom_tai_san'] = $this->tai_san_model->listNhomTaiSan();
        $data['list_bo_phan_su_dung'] = $this->tai_san_model->listBoPhan();
        // Get the 'year' parameter value from the URL
        if($this->request->getGet()) {
            $year = $this->request->getGet('year');
            $ma_tai_san = $this->request->getGet('ma_tai_san');
        }
        else {
            $year = date('Y');
            $ma_tai_san = '';
        }
        $data['selected_year'] = $year;
        $data['ma_tai_san'] = $ma_tai_san;

        return $this->page_construct('dashboard/tai_san_ct_view',$meta,$data);
    }
    public function tai_san_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->tai_san_model->getTaiSan($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function loai_tai_san_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            $return_value = $this->tai_san_model->listLoaiTaiSan($data['id_nhom']);
            echo json_encode($return_value);
        }else {
            echo json_encode('No Data');
        }
    }
    public function loai_tai_san_ct_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            $return_value = $this->tai_san_model->getLoaiTaiSan($data['ma_loai_ts']);
            echo json_encode($return_value);
        }else {
            echo json_encode('No Data');
        }
    }
    public function add_tai_san()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('tai_san','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->tai_san_model->add_tai_san($data_post));
            $data['message']= $this->tai_san_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function delete_tai_san()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('tai_san','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->tai_san_model->delete_tai_san($data_post));
            $data['message']= $this->tai_san_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_tai_san()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('tai_san','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->tai_san_model->edit_tai_san($data_post));
            $data['message']= $this->tai_san_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}
