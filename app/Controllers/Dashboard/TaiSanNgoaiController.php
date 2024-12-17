<?php
namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\TaiSanNgoaiModel;

class TaiSanNgoaiController extends BaseController
{
    public function __construct()
    {
        $this->ts_model = new TaiSanNgoaiModel();

    }

    public function index()
    {
        if($this->libauth->checkFunction('off_asset','view')) {
            $data['list_bo_phan_su_dung'] = $this->ts_model->listBoPhan();
            $meta = array('page_title' => lang('AppLang.page_title_off_asset'));
            return $this->page_construct('dashboard/tai_san_ngoai_view', $meta,$data);
        }else
            return view('errors/html/error_403');
    }
    public function asset_ajax()
    {
        if($this->request->getPost())
        {
            $data = $this->ts_model->getTaiSanNgoai($this->request->getPost());
            echo json_encode($data);
        }
    }
    public function add_asset()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('off_asset','add')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->ts_model->add_asset($data_post));
            $data['message']= $this->ts_model->get_messages();
            echo json_encode(array_values($data));
        }
        else {
            echo json_encode(array_values($this->libauth->getError()));
        }
    }
    public function edit_asset()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('off_asset','edit')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->ts_model->edit_asset($data_post));
            $data['message']= $this->ts_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function delete_asset()
    {
        if($this->request->getPost()&&($this->libauth->checkFunction('off_asset','delete')))
        {
            $data_post = $this->request->getPost();
            $data['result'] = ($this->ts_model->delete_asset($data_post));
            $data['message']= $this->ts_model->get_messages();
            echo json_encode(array_values($data));
        }else
            echo json_encode(array_values($this->libauth->getError()));
    }
    public function off_asset_import()
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
                $data_import['id'] =0;
                $data_import['bo_phan_su_dung'] = $data['bo_phan_su_dung'];
                $data_import['nam_kiem_ke'] = $data['nam_kiem_ke'];
                $data_import['loai_kiem_ke'] = $data['loai_kiem_ke'];
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