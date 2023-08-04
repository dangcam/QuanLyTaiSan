<?php

namespace App\Entities;
use CodeIgniter\Entity\Entity;

class TaiSanEntity extends Entity{
    protected $nhom_tai_san;
    protected $loai_tai_san;
    protected $ma_tai_san;
    protected $ten_tai_san;
    protected $ly_do_tang;
    protected $so_luong;
    protected $don_vi_tinh;
    protected $bo_phan_su_dung;
	// HOẠT ĐỘNG SỰ NGHIỆP
    protected $quan_ly_nha_nuoc;
    protected $hdsn_kkd;
    protected $hdsn_kd;
    protected $hdsn_ldlk;
    protected $hdsn_ct;
    protected $su_dung_khac;
    protected $trang_thai;
    // THÔNG TIN HAO MÒN
    protected $ngay_mua;
    protected $ngay_bd_su_dung;
    protected $ngay_ghi_tang;
    protected $nam_theo_doi;
    protected $ngay_bd_tinh_hm;
    protected $so_nam_su_dung;
    protected $ty_le_hao_mon;
    protected $hm_kh_nam;
    protected $so_nam_sd_con_lai;
    protected $ngay_kt_hm;
    protected $hm_luy_ke;
    protected $gia_tri_con_lai;
}
