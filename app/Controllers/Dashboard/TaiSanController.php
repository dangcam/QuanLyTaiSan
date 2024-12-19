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
        $data['list_trang_cap'] = $this->tai_san_model->listTrangCap();
        $data['list_du_an'] = $this->tai_san_model->listDuAn();
        $data['list_dm_tinh'] = $this->tai_san_model->listTinh();
        // Get the 'year' parameter value from the URL
        if($this->request->getGet()) {
            $year = $this->request->getGet('year');
            $ma_tai_san = $this->request->getGet('ma_tai_san');
            if(!isset($ma_tai_san)){
                $ma_tai_san = $this->tai_san_model->getMaTaiSan();
                $add_new = true;
            }else
            {
                $add_new = false;
            }

        }
        else {
            $year = date('Y');
            $ma_tai_san = $this->tai_san_model->getMaTaiSan();
            $add_new = true;
        }
        $data['selected_year'] = $year;
        $data['ma_tai_san'] = $ma_tai_san;
        $data['add_new'] = $add_new;

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
    public function ma_huyen_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            $return_value = $this->tai_san_model->listHuyen($data['ma_tinh']);
            echo json_encode($return_value);
        }else {
            echo json_encode('No Data');
        }
    }
    public function ma_xa_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            $return_value = $this->tai_san_model->listXa($data['ma_huyen']);
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
    public function tai_san_ct_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            $return_value = $this->tai_san_model->getTaiSanCT($data['ma_tai_san']);
            echo json_encode($return_value);
        }else {
            echo json_encode('No Data');
        }
    }
    public function nguyen_gia_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->tai_san_model->listNguyenGia($this->request->getPost());
            echo json_encode($data);
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
    public function tai_san_import()
    {
        if($this->request->getPost()) {
            $data = $this->request->getPost();
            $upload_file = $_FILES['file_import']['name'];
            $extension = pathinfo($upload_file, PATHINFO_EXTENSION);

            if ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['file_import']['tmp_name']);
            $sheetdata = $spreadsheet->getActiveSheet()->toArray();
            $sheetcount = count($sheetdata);

            $row_count = 0;
            if ($sheetcount > 1)// lấy dữ liệu từ dòng 2
            {
                $data_import['nam_theo_doi'] = $data['nam_theo_doi'];
                for ($i = 1; $i < $sheetcount; $i++) {
                    $data_import['ten_tai_san'] = is_null($sheetdata[$i][1]) ? '' : $sheetdata[$i][1];
                    $data_import['so_luong'] = is_null($sheetdata[$i][2]) ? '0' : $sheetdata[$i][2];
                    $data_import['don_vi'] =is_null($sheetdata[$i][3]) ? '' : $sheetdata[$i][3];
                    $data_import['nguoi_su_dung'] = is_null($sheetdata[$i][4]) ? '' : $sheetdata[$i][4];
                    $data_import['ghi_chu'] =is_null($sheetdata[$i][5]) ? '' : $sheetdata[$i][5];
                    if ($this->ts_model->add_import($data_import) == 0)
                        $row_count++;

                }
            }

            echo 'Lưu thành công '.$row_count.'/'.($sheetcount-1).' dòng dữ liệu!';

        }
    }
}
