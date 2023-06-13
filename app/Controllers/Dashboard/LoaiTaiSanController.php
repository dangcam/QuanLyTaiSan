<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;

class LoaiTaiSanController extends BaseController
{
    public function index()
    {
        $meta = array('page_title'=>lang('AppLang.page_title_type_asset'));
        return $this->page_construct('dashboard/loai_tai_san_view',$meta);
    }
}