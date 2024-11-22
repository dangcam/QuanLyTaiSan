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
}