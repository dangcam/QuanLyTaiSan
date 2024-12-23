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
            //$sheetdata = $spreadsheet->getActiveSheet()->toArray();
            $sheetdata = $spreadsheet->getSheet(0)->toArray();
            $sheetcount = count($sheetdata);

            $row_count = 0;

            if ($sheetcount > 2)// lấy dữ liệu từ dòng 3
            {
                $data_import['nam_theo_doi'] = $data['nam_theo_doi'];
                for ($i = 2; $i < $sheetcount; $i++) {

                    $data_import['nhom_tai_san'] = 	is_null($sheetdata[$i][1]) ? 0 : $sheetdata[$i][1];
                    $data_import['loai_tai_san'] = 	is_null($sheetdata[$i][2]) ? '' : $sheetdata[$i][2];
                    $data_import['ma_tai_san'] = 	is_null($sheetdata[$i][3]) ? '' : $sheetdata[$i][3];
                    $data_import['ten_tai_san'] = 	is_null($sheetdata[$i][4]) ? '' : $sheetdata[$i][4];
                    $data_import['ly_do_tang'] = 	is_null($sheetdata[$i][5]) ? '' : $sheetdata[$i][5];
                    $data_import['so_luong'] = 	is_null($sheetdata[$i][6]) ? 0 : $sheetdata[$i][6];
                    $data_import['don_vi_tinh'] = 	is_null($sheetdata[$i][7]) ? '' : $sheetdata[$i][7];
                    $data_import['bo_phan_su_dung'] = 	is_null($sheetdata[$i][8]) ? '' : $sheetdata[$i][8];
                    $data_import['ma_tinh'] = 	is_null($sheetdata[$i][9]) ? '' : $sheetdata[$i][9];
                    $data_import['ma_huyen'] = 	is_null($sheetdata[$i][10]) ? '' : $sheetdata[$i][10];
                    $data_import['ma_xa'] = 	is_null($sheetdata[$i][11]) ? '' : $sheetdata[$i][11];
                    $data_import['dia_chi'] = 	is_null($sheetdata[$i][12]) ? '' : $sheetdata[$i][12];
                    $data_import['so_tang'] = 	is_null($sheetdata[$i][13]) ? 0 : $sheetdata[$i][13];
                    $data_import['chieu_dai'] = 	is_null($sheetdata[$i][14]) ? 0 : $sheetdata[$i][14];
                    $data_import['dien_tich_xd'] = 	is_null($sheetdata[$i][15]) ? 0 : $sheetdata[$i][15];
                    $data_import['the_tich'] = 	is_null($sheetdata[$i][16]) ? 0 : $sheetdata[$i][16];
                    $data_import['nam_xay_dung'] = 	is_null($sheetdata[$i][17]) ? 0 : $sheetdata[$i][17];
                    $data_import['nuoc_san_xuat'] = 	is_null($sheetdata[$i][18]) ? 0 : $sheetdata[$i][18];
                    $data_import['bien_kiem_soat'] = 	is_null($sheetdata[$i][19]) ? '' : $sheetdata[$i][19];
                    $data_import['nhan_xe'] = 	is_null($sheetdata[$i][20]) ? '' : $sheetdata[$i][20];
                    $data_import['model'] = 	is_null($sheetdata[$i][21]) ? '' : $sheetdata[$i][21];
                    $data_import['so_seri'] = 	is_null($sheetdata[$i][22]) ? '' : $sheetdata[$i][22];
                    $data_import['so_may'] = 	is_null($sheetdata[$i][23]) ? '' : $sheetdata[$i][23];
                    $data_import['tai_trong'] = 	is_null($sheetdata[$i][24]) ? 0 : $sheetdata[$i][24];
                    $data_import['so_cho_ngoi'] = 	is_null($sheetdata[$i][25]) ? 0 : $sheetdata[$i][25];
                    $data_import['so_cau'] = 	is_null($sheetdata[$i][26]) ? 0 : $sheetdata[$i][26];
                    $data_import['cong_suat_xe'] = 	is_null($sheetdata[$i][27]) ? 0 : $sheetdata[$i][27];
                    $data_import['dung_tich_xe'] = 	is_null($sheetdata[$i][28]) ? 0 : $sheetdata[$i][28];
                    $data_import['giay_cndk_so'] = 	is_null($sheetdata[$i][29]) ? '' : $sheetdata[$i][29];
                    $data_import['ngay_dk'] = 	is_null($sheetdata[$i][30]) ? '' : $sheetdata[$i][30];
                    $data_import['co_quan_cap_dk'] = 	is_null($sheetdata[$i][31]) ? '' : $sheetdata[$i][31];
                    $data_import['nguon_goc_xe'] = 	is_null($sheetdata[$i][32]) ? '' : $sheetdata[$i][32];
                    $data_import['mau_son'] = 	is_null($sheetdata[$i][33]) ? '' : $sheetdata[$i][33];
                    $data_import['nguoi_su_dung'] = 	is_null($sheetdata[$i][34]) ? '' : $sheetdata[$i][34];
                    $data_import['hinh_thuc_bo_tri_su_dung'] = 	is_null($sheetdata[$i][35]) ? '' : $sheetdata[$i][35];
                    $data_import['chuc_danh_su_dung'] = 	is_null($sheetdata[$i][36]) ? '' : $sheetdata[$i][36];
                    $data_import['qd_trang_cap'] = 	is_null($sheetdata[$i][37]) ? '' : $sheetdata[$i][37];
                    $data_import['ngay_dq_trang_cap'] = 	is_null($sheetdata[$i][38]) ? '' : $sheetdata[$i][38];
                    $data_import['du_an'] = 	is_null($sheetdata[$i][39]) ? '' : $sheetdata[$i][39];
                    $data_import['loai_tai_san_ke_khai'] = 	is_null($sheetdata[$i][40]) ? 0 : $sheetdata[$i][40];
                    $data_import['thong_so_ky_thuat'] = 	is_null($sheetdata[$i][41]) ? '' : $sheetdata[$i][41];
                    $data_import['quan_ly_nha_nuoc'] = 	is_null($sheetdata[$i][42]) ? 0 : $sheetdata[$i][42];
                    $data_import['hdsn_kkd'] = 	is_null($sheetdata[$i][43]) ? 0 : $sheetdata[$i][43];
                    $data_import['hdsn_kd'] = 	is_null($sheetdata[$i][44]) ? 0 : $sheetdata[$i][44];
                    $data_import['hdsn_ldlk'] = 	is_null($sheetdata[$i][45]) ? 0 : $sheetdata[$i][45];
                    $data_import['hdsn_ct'] = 	is_null($sheetdata[$i][46]) ? 0 : $sheetdata[$i][46];
                    $data_import['su_dung_khac'] = 	is_null($sheetdata[$i][47]) ? 0 : $sheetdata[$i][47];
                    $data_import['trang_thai'] = 	is_null($sheetdata[$i][48]) ? 0 : $sheetdata[$i][48];
                    $data_import['tong_dien_tich'] = 	is_null($sheetdata[$i][49]) ? 0 : $sheetdata[$i][49];
                    $data_import['gia_tri_dat'] = 	is_null($sheetdata[$i][50]) ? 0 : $sheetdata[$i][50];
                    $data_import['ngay_mua'] = 	is_null($sheetdata[$i][51]) ? '' : $sheetdata[$i][51];
                    $data_import['ngay_bd_su_dung'] = 	is_null($sheetdata[$i][52]) ? '' : $sheetdata[$i][52];
                    $data_import['ngay_ghi_tang'] = 	is_null($sheetdata[$i][53]) ? '' : $sheetdata[$i][53];
                    $data_import['nam_theo_doi'] = 	is_null($sheetdata[$i][54]) ? 0 : $sheetdata[$i][54];
                    $data_import['ngay_bd_tinh_hm'] = 	is_null($sheetdata[$i][55]) ? '' : $sheetdata[$i][55];
                    $data_import['so_nam_su_dung'] = 	is_null($sheetdata[$i][56]) ? 0 : $sheetdata[$i][56];
                    $data_import['ty_le_hao_mon'] = 	is_null($sheetdata[$i][57]) ? 0 : $sheetdata[$i][57];
                    $data_import['hm_kh_nam'] = 	is_null($sheetdata[$i][58]) ? 0 : $sheetdata[$i][58];
                    $data_import['so_nam_sd_con_lai'] = 	is_null($sheetdata[$i][59]) ? 0 : $sheetdata[$i][59];
                    $data_import['ngay_kt_hm'] = 	is_null($sheetdata[$i][60]) ? '' : $sheetdata[$i][60];
                    $data_import['hm_luy_ke'] = 	is_null($sheetdata[$i][61]) ? 0 : $sheetdata[$i][61];
                    $data_import['gia_tri_con_lai'] =	is_null($sheetdata[$i][62]) ? 0 : $sheetdata[$i][62];
                    $data_import['muc_dich_su_dung'] = 	is_null($sheetdata[$i][63]) ? '' : $sheetdata[$i][63];
                    $data_import['de_o'] = 	is_null($sheetdata[$i][64]) ? 0 : $sheetdata[$i][64];
                    $data_import['bo_trong'] = 	is_null($sheetdata[$i][65]) ? 0 : $sheetdata[$i][65];
                    $data_import['bi_lan_chiem'] = 	is_null($sheetdata[$i][66]) ? 0 : $sheetdata[$i][66];
                    $data_import['su_dung_hon_hop'] = 	is_null($sheetdata[$i][67]) ? 0 : $sheetdata[$i][67];
                    //$data_import['group_id'] = 	is_null($sheetdata[$i][68]) ? '' : $sheetdata[$i][68];

                    if ($this->tai_san_model->add_import($data_import) == 0)
                        $row_count++;
                }
            }

            echo 'Lưu thành công '.$row_count.'/'.($sheetcount-1).' dòng dữ liệu!';
            //$this->tai_san_model->get_messages();//'Lưu thành công '.$row_count.'/'.($sheetcount-1).' dòng dữ liệu!';

        }
    }
}
