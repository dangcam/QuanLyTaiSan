<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
//$routes->setDefaultController('HomeController');
//$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->addRedirect('/','login');
$routes->get('login', 'LoginController::index');
$routes->post('login_ajax', 'LoginController::login_ajax');
$routes->group('dashboard',['filter'=>'authFilters'], static function ($routes) {
    $routes->get('/', 'Dashboard\HomeController::index');
    $routes->get('lang/{locale}', 'Dashboard\HomeController::lang');
    $routes->get('logout', 'Dashboard\HomeController::logout');
    $routes->group('user',static function($routes){
        $routes->get('/','Dashboard\UserController::index');
        $routes->get('info','Dashboard\UserController::info');
        $routes->post('create_user','Dashboard\UserController::create_user');
        $routes->post('user_ajax','Dashboard\UserController::user_ajax');
        $routes->post('delete_user','Dashboard\UserController::delete_user');
        $routes->post('update_user','Dashboard\UserController::update_user');
        $routes->post('change_password','Dashboard\UserController::change_password');
    });
    $routes->group('group',static function($routes){
        $routes->get('/','Dashboard\GroupController::index');
        $routes->post('group_ajax','Dashboard\GroupController::group_ajax');
        $routes->post('add_group','Dashboard\GroupController::add_group');
        $routes->post('edit_group','Dashboard\GroupController::edit_group');
        $routes->post('delete_group','Dashboard\GroupController::delete_group');
        $routes->post('tree_group','Dashboard\GroupController::tree_group');
    });
    $routes->group('function',static function($routes){
        $routes->get('/','Dashboard\FunctionController::index');
        $routes->post('function_ajax','Dashboard\FunctionController::function_ajax');
        $routes->post('add_function','Dashboard\FunctionController::add_function');
        $routes->post('edit_function','Dashboard\FunctionController::edit_function');
        $routes->post('delete_function','Dashboard\FunctionController::delete_function');
    });
    $routes->group('nhacc',static function($routes){
        $routes->get('/','Dashboard\NhaCCController::index');
        $routes->post('nhacc_ajax','Dashboard\NhaCCController::nhacc_ajax');
        $routes->post('add_nhacc','Dashboard\NhaCCController::add_nhacc');
        $routes->post('edit_nhacc','Dashboard\NhaCCController::edit_nhacc');
        $routes->post('delete_nhacc','Dashboard\NhaCCController::delete_nhacc');
    });

    $routes->group('userfunction',static function($routes){
        $routes->post('/','Dashboard\UserFunctionController::index');
        $routes->post('update','Dashboard\UserFunctionController::update');
    });
    $routes->group('type_asset',static function($routes){
        $routes->get('/','Dashboard\LoaiTaiSanController::index');
        $routes->post('type_asset_ajax','Dashboard\LoaiTaiSanController::type_asset_ajax');
        $routes->post('add_asset','Dashboard\LoaiTaiSanController::add_asset');
        $routes->post('edit_asset','Dashboard\LoaiTaiSanController::edit_asset');
        $routes->post('delete_asset','Dashboard\LoaiTaiSanController::delete_asset');
    });
    $routes->group('type_road',static function($routes){
        $routes->get('/','Dashboard\LoaiTSDuongBoController::index');
        $routes->post('type_asset_ajax','Dashboard\LoaiTSDuongBoController::type_asset_ajax');
        $routes->post('add_asset','Dashboard\LoaiTSDuongBoController::add_asset');
        $routes->post('edit_asset','Dashboard\LoaiTSDuongBoController::edit_asset');
        $routes->post('delete_asset','Dashboard\LoaiTSDuongBoController::delete_asset');
    });
    $routes->group('tool',static function($routes){
        $routes->get('/','Dashboard\CCDCController::index');
        $routes->post('tool_ajax','Dashboard\CCDCController::tool_ajax');
        $routes->post('add_tool','Dashboard\CCDCController::add_tool');
        $routes->post('edit_tool','Dashboard\CCDCController::edit_tool');
        $routes->post('delete_tool','Dashboard\CCDCController::delete_tool');
    });
    $routes->group('tbyte',static function($routes){
        $routes->get('/','Dashboard\TBYTeController::index');
        $routes->post('tbyte_ajax','Dashboard\TBYTeController::tbyte_ajax');
        $routes->post('add_tbyte','Dashboard\TBYTeController::add_tbyte');
        $routes->post('edit_tbyte','Dashboard\TBYTeController::edit_tbyte');
        $routes->post('delete_tbyte','Dashboard\TBYTeController::delete_tbyte');
    });
    $routes->group('project',static function($routes){
        $routes->get('/','Dashboard\DuAnController::index');
        $routes->post('project_ajax','Dashboard\DuAnController::project_ajax');
        $routes->post('add_project','Dashboard\DuAnController::add_project');
        $routes->post('edit_project','Dashboard\DuAnController::edit_project');
        $routes->post('delete_project','Dashboard\DuAnController::delete_project');
    });
    $routes->group('decision',static function($routes){
        $routes->get('/','Dashboard\TrangCapController::index');
        $routes->post('decision_ajax','Dashboard\TrangCapController::tc_ajax');
        $routes->post('add_decision','Dashboard\TrangCapController::add_tc');
        $routes->post('edit_decision','Dashboard\TrangCapController::edit_tc');
        $routes->post('delete_decision','Dashboard\TrangCapController::delete_tc');
    });
    $routes->group('funding',static function($routes){
        $routes->get('/','Dashboard\KinhPhiController::index');
        $routes->post('funding_ajax','Dashboard\KinhPhiController::funding_ajax');
        $routes->post('add_funding','Dashboard\KinhPhiController::add_funding');
        $routes->post('edit_funding','Dashboard\KinhPhiController::edit_funding');
        $routes->post('delete_funding','Dashboard\KinhPhiController::delete_funding');
    });
    $routes->group('position',static function($routes){
        $routes->get('/','Dashboard\ChucVuController::index');
        $routes->post('position_ajax','Dashboard\ChucVuController::position_ajax');
        $routes->post('add_position','Dashboard\ChucVuController::add_position');
        $routes->post('edit_position','Dashboard\ChucVuController::edit_position');
        $routes->post('delete_position','Dashboard\ChucVuController::delete_position');
    });
    $routes->group('department',static function($routes){
        $routes->get('/','Dashboard\BoPhanController::index');
        $routes->post('department_ajax','Dashboard\BoPhanController::department_ajax');
        $routes->post('add_department','Dashboard\BoPhanController::add_department');
        $routes->post('edit_department','Dashboard\BoPhanController::edit_department');
        $routes->post('delete_department','Dashboard\BoPhanController::delete_department');
    });
    $routes->group('nguoi_dung',static function($routes){
        $routes->get('/','Dashboard\NguoiDungController::index');
        $routes->post('nd_ajax','Dashboard\NguoiDungController::nguoi_dung_ajax');
        $routes->post('add_nd','Dashboard\NguoiDungController::add_nguoi_dung');
        $routes->post('edit_nd','Dashboard\NguoiDungController::edit_nguoi_dung');
        $routes->post('delete_nd','Dashboard\NguoiDungController::delete_nguoi_dung');
    });
    $routes->group('dm_ts',static function($routes){
        $routes->get('/','Dashboard\DMTaiSanController::index');
        $routes->post('dm_ajax','Dashboard\DMTaiSanController::dm_ajax');
        $routes->post('add_dm','Dashboard\DMTaiSanController::add_dm');
        $routes->post('edit_dm','Dashboard\DMTaiSanController::edit_dm');
        $routes->post('delete_dm','Dashboard\DMTaiSanController::delete_dm');
        $routes->post('list_dinh_muc','Dashboard\DMTaiSanController::list_dinh_muc');
    });
    $routes->group('report_group',static function($routes){
        $routes->get('/','Dashboard\ReportGroupController::index');
        $routes->get('print','Dashboard\ReportGroupController::report_print');
        $routes->post('data_report_group','Dashboard\ReportGroupController::data_report_group');
        $routes->post('data_report_group_print','Dashboard\ReportGroupController::data_report_group_print');
        $routes->post('save_report_group','Dashboard\ReportGroupController::save_report_group');
    });
});
//$routes->post('login', 'Login::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
