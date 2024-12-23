<?php

namespace App\Controllers;

use App\Models\UserFunctionModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Libraries\lib_auth;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class HomeController extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['form'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
     protected $session;

    /**
     * Constructor.
     */
    public $libauth;
    public $language;
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        // Preload any models, libraries, etc, here.
        $this->libauth = new lib_auth();
        $this->language = \Config\Services::language();
        $this->session = \Config\Services::session();
        $lang = $this->session->get('lang');
        $this->language->setLocale($lang);
    }
    public function page_construct($page,$meta = array(),$data = array())
    {
        return view('layout/header',$meta).
            view('layout/silebar',$this->silebar_view()).
            view($page,$data).
            view('layout/footer');
    }

    public function silebar_view()
    {
        $response ='';
        $response .= '<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon icon-layers-3"></i><span class="nav-text">'.lang('AppLang.tai_san').'</span></a>
                        <ul aria-expanded="false">';
        if($this->libauth->checkFunction('tai_san','view'))
            $response .= '<li><a href="'.base_url().'dashboard/tai_san">'.lang('AppLang.tai_san').'</a></li>';
        if($this->libauth->checkFunction('ghi_tang_tai_san','view'))
            $response .= '<li><a href="'.base_url().'dashboard/ghitangtaisan">'.lang('AppLang.ghi_tang_tai_san').'</a></li>';
        if($this->libauth->checkFunction('ghi_giam_tai_san','view'))
            $response .= '<li><a href="'.base_url().'dashboard/ghigiamtaisan">'.lang('AppLang.ghi_giam_tai_san').'</a></li>';
        if($this->libauth->checkFunction('off_asset','view'))
            $response .= '<li><a href="'.base_url().'dashboard/off_asset">'.lang('AppLang.off_asset').'</a></li>';
        $response .= '  </ul>
                      </li>';
        //
        $response .= '<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-book-open-2"></i><span class="nav-text">'.lang('AppLang.report').'</span></a>
                        <ul aria-expanded="false">';
        if($this->libauth->checkFunction('report_asset','view'))
            $response .= '<li><a href="'.base_url().'dashboard/report/report_asset">'.lang('AppLang.report_asset').'</a></li>';
        if($this->libauth->checkFunction('book_asset','view'))
            $response .= '<li><a href="'.base_url().'dashboard/report/book_asset">'.lang('AppLang.book_asset').'</a></li>';
        if($this->libauth->checkFunction('asset_inventory','view'))
            $response .= '<li><a href="'.base_url().'dashboard/report/asset_inventory">'.lang('AppLang.asset_inventory').'</a></li>';

        $response   .='</ul>
                       </li>';
        //
        $response .= '<li class="nav-label">'.lang('category').'</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-tablet-mobile"></i><span class="nav-text">'.lang('AppLang.type_asset').'</span></a>
                        <ul aria-expanded="false">';
        if($this->libauth->checkFunction('type_asset','view'))
            $response .= '<li><a href="'.base_url().'dashboard/type_asset">'.lang('AppLang.type_asset').'</a></li>';
        if($this->libauth->checkFunction('type_road','view'))
            $response .= '<li><a href="'.base_url().'dashboard/type_road">'.lang('AppLang.type_road').'</a></li>';
        if($this->libauth->checkFunction('ccdc','view'))
            $response .= '<li><a href="'.base_url().'dashboard/tool">'.lang('AppLang.tool').'</a></li>';
        if($this->libauth->checkFunction('tbyte','view'))
            $response .= '<li><a href="'.base_url().'dashboard/tbyte">'.lang('AppLang.tbyte').'</a></li>';
        $response .= '  </ul>
                      </li>';

        $response .= '<li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-house-search-engine"></i><span class="nav-text">'.lang('AppLang.asset_management').'</span></a>
                        <ul aria-expanded="false">';
        if($this->libauth->checkFunction('funding','view'))
            $response .= '<li><a href="'.base_url().'dashboard/funding">'.lang('AppLang.funding').'</a></li>';
        if($this->libauth->checkFunction('position','view'))
            $response .= '<li><a href="'.base_url().'dashboard/position">'.lang('AppLang.position').'</a></li>';
        if($this->libauth->checkFunction('department','view'))
            $response .= '<li><a href="'.base_url().'dashboard/department">'.lang('AppLang.department').'</a></li>';
        if($this->libauth->checkFunction('property_norms','view'))
            $response .= '<li><a href="'.base_url().'dashboard/dm_ts">'.lang('AppLang.property_norms').'</a></li>';
        if($this->libauth->checkFunction('nguoi_dung','view'))
            $response .= '<li><a href="'.base_url().'dashboard/nguoi_dung">'.lang('AppLang.user').'</a></li>';

        $response .= '  </ul>
                       </li>';

        $response .= '<li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">'.lang('AppLang.other_categories').'</span></a>
                        <ul aria-expanded="false">';
        if($this->libauth->checkFunction('nha_cc','view'))
            $response .= '<li><a href="'.base_url().'dashboard/nhacc">'.lang('AppLang.nha_cung_cap').'</a></li>';
        if($this->libauth->checkFunction('project','view'))
            $response .= '<li><a href="'.base_url().'dashboard/project">'.lang('AppLang.project').'</a></li>';
        if($this->libauth->checkFunction('provide_equipment','view'))
            $response .= '<li><a href="'.base_url().'dashboard/decision">'.lang('AppLang.provide_equipment').'</a></li>';

        $response .= '  </ul>
                        </li>';

        $response .= '<li class="nav-label">'.lang('management').'</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-settings-gear-64"></i><span class="nav-text">'.lang('AppLang.system').'</span></a>
                <ul aria-expanded="false">';
        if($this->libauth->checkFunction('function','view'))
            $response .= '<li><a href="'.base_url().'dashboard/function">'.lang('AppLang.function_manager').'</a></li>';
        if($this->libauth->checkFunction('group','view'))
            $response .= '<li><a href="'.base_url().'dashboard/group">'.lang('AppLang.group_manager').'</a></li>';

        $response .='
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon icon-single-04"></i><span class="nav-text">'.lang('AppLang.users').'</span></a>
                <ul aria-expanded="false">';
        if($this->libauth->checkFunction('user','view'))
            $response .= '<li><a href="'.base_url().'dashboard/user">'.lang('AppLang.user_manager').'</a></li>';
        $response .='            
                </ul>
            </li>
            ';
        $data['silebar_menu'] = $response;
        return $data;
    }
}
