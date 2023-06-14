<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\LoaiTaiSanModel;

class LoaiTaiSanController extends BaseController
{
    public function __construct()
    {
        $this->loai_ts_model = new LoaiTaiSanModel();

    }
    public function index()
    {
        $meta = array('page_title'=>lang('AppLang.page_title_type_asset'));
        $data['list_loai_tai_san'] = $this->loai_ts_model->listLoaiTaiSan();
        $data['list_nhom_tai_san'] = $this->loai_ts_model->listNhomTaiSan();
        $data['list_tk_hao_mon'] = $this->loai_ts_model->listTKHaoMon();
        $data['list_tk_nguyen_gia'] = $this->loai_ts_model->listTKNguyenGia();
        $data['list_tieu_muc'] = $this->loai_ts_model->listTieuMuc();
        return $this->page_construct('dashboard/loai_tai_san_view',$meta,$data);
    }
    public function type_asset_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->loai_ts_model->getLoaiTaiSan($this->request->getPost());
            echo json_encode($data);
        }
    }
    //
    public function add_asset()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('type_asset','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->loai_ts_model->add_asset($data_post));
            $data['message']= $this->loai_ts_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_asset()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('type_asset','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->loai_ts_model->edit_asset($data_post));
            $data['message']= $this->loai_ts_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
}