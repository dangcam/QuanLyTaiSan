<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\TaiSanModel;

class ReportController extends BaseController
{
    public function __construct()
    {
        $this->tai_san_model = new TaiSanModel();
    }

    public function report_asset()
    {
        $data['list_bo_phan_su_dung'] = $this->tai_san_model->listBoPhan();
        $meta = array('page_title'=>lang('AppLang.report_asset'));
        return $this->page_construct('dashboard/bao_cao_tai_san_view',$meta,$data);
    }
    public function report_tai_san_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->tai_san_model->getReportTaiSan($this->request->getPost());
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

}
