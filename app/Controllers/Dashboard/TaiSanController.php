<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;

class TaiSanController extends BaseController
{
    public function index()
    {
        $meta = array('page_title'=>lang('AppLang.page_title_tai_san'));
        return $this->page_construct('dashboard/tai_san_view',$meta);
    }

}
