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
        $meta = array('page_title'=>lang('AppLang.page_title_tai_san'));
        return $this->page_construct('dashboard/tai_san_view',$meta);
    }
    public function tai_san_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->tai_san_model->getTaiSan($this->request->getPost());
            echo json_encode($data);
        }
    }
}
