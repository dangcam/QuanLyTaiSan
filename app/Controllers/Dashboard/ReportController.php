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
    public function book_asset()
    {
        $meta = array('page_title'=>lang('AppLang.book_asset'));
        return $this->page_construct('dashboard/book_asset_view',$meta);
    }
    public function asset_inventory()
    {
        $meta = array('page_title'=>lang('AppLang.asset_inventory'));
        return $this->page_construct('dashboard/asset_inventory_view',$meta);
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
    public function book_asset_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            $return_value = $this->tai_san_model->getReportSoTaiSanPrint($data);
            echo json_encode(array_values($return_value));
        }else {
            echo json_encode(array_values('No Data'));
        }
    } public function asset_inventory_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            $return_value = $this->tai_san_model->getReportKiemKeTaiSanPrint($data);
            echo json_encode(array_values($return_value));
        }else {
            echo json_encode(array_values('No Data'));
        }
    }
}
