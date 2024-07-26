<?php
namespace App\Controllers;
use App\Models\UserModel;

class LoginController extends BaseController
{
    private $user_model;

    public function __construct()
    {
        $this->user_model = new UserModel();
    }
    public function index()
    {
        if($this->libauth->check()){
            return redirect()->to('dashboard');
        }
        $data['siteKey'] = RECAPTCHA_SITE_KEY;
        return view('login_view',$data);
    }
    public function login_ajax()
    {
        if($this->request->getPost())
        {
            $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
            $secretKey = RECAPTCHA_SECRET_KEY;
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
            $responseKeys = json_decode($response, true);
            if (intval($responseKeys["success"]) !== 1) {
                //return redirect()->back()->with('message', 'reCAPTCHA verification failed. Please try again.');
                $data['result'] = 4;
                $data['message']= 'reCAPTCHA verification failed. Please try again.';
                echo json_encode(array_values($data));
            } else {
                //
                $data_user = $this->request->getPost();
                $data['result'] = ($this->user_model->login($data_user));
                $data['message']= $this->user_model->get_messages();
                echo json_encode(array_values($data));
            }
        }
    }
}