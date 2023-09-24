<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\HomeModel;

class HomeController extends BaseController
{    public function __construct()
    {
        $this->home_model = new HomeModel();

    }
    public function index()
    {
        $meta = array('page_title'=>lang('AppLang.page_title_home'));
        return $this->page_construct('dashboard/home_view',$meta);
    }
    public function ngay_bao_cao_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            $return_value = $this->home_model->getThongTin($data['ngay_bao_cao']);
            echo json_encode($return_value);
        }else {
            echo json_encode('No Data');
        }
    }
    public function logout()
    {
        $this->libauth->logout();
        return redirect('/');
    }
    public function lang()
    {
        $locale = $this->request->getLocale();
        $this->session->remove('lang');
        $this->session->set('lang', $locale);
        $url = base_url();
        return redirect()->to($url);
    }
}
