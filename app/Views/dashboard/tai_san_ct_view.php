<div class="content-body">
    <div class="container-fluid">
        <form method="post" id="form_id">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                            <h4 id="text_add_edit_tai_san"><?=lang('TaiSanLang.add_taisan')?></h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0">
                    <div class="form-group row">
                        <input value="0" name="trang_thai" id="trang_thai" hidden>
                        <div class="col-lg-6">
                            <select class="form-control" id="nhom_tai_san" name="nhom_tai_san">
                                <?php if (isset($list_nhom_tai_san) && count($list_nhom_tai_san)) :
                                    foreach ($list_nhom_tai_san as $key => $item) : ?>
                                        <option value="<?=$item->id?>"><?=$item->ten_nts?></option>
                                    <?php
                                    endforeach;
                                endif ?>
                            </select>
                        </div>
                        <button type="button" onclick="location.href='<?= base_url() ?>dashboard/tai_san'"
                                id="btn_cancel" class="btn btn-warning"><?=lang('AppLang.cancel')?></button>
                    </div>
                </div>
                <!---->
                <div class="alert alert-success alert-alt"role="alert" id="response_success"></div>
                <div class="alert alert-info alert-alt"role="alert" id="response_info"></div>
                <div class="alert alert-warning alert-alt "role="alert" id="response_warning"></div>
                <div class="alert alert-danger alert-alt" role="alert" id="response_danger"></div>
                <!---->
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?=lang('TaiSanLang.thong_tin_chung')?></h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><?=lang('TaiSanLang.loai_tai_san')?> <span class="text-danger">*</span></label>
                                        <select class="form-control" id="loai_tai_san" required name="loai_tai_san">
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><?=lang('TaiSanLang.ma_tai_san')?> <span class="text-danger">*</span></label>
                                        <input type="text" name="ma_tai_san" id="ma_tai_san" required class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><?=lang('TaiSanLang.ten_tai_san')?> <span class="text-danger">*</span></label>
                                        <input type="text" name="ten_tai_san" id="ten_tai_san" required class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><?=lang('TaiSanLang.ly_do_tang')?> <span class="text-danger">*</span></label>
                                        <select id="ly_do_tang" name="ly_do_tang" required class="form-control">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label><?=lang('TaiSanLang.so_luong')?> <span class="text-danger">*</span></label>
                                        <input type="text" name="so_luong" id="so_luong" required class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?=lang('TaiSanLang.don_vi_tinh')?> <span class="text-danger">*</span></label>
                                        <select id="don_vi_tinh" name="don_vi_tinh" required class="form-control">
                                            <option>Mảnh</option>
                                            <option>Cái</option>
                                            <option>Chiếc</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><?=lang('TaiSanLang.bo_phan_su_dung')?> <span class="text-danger">*</span></label>
                                        <select class="form-control" id="bo_phan_su_dung" required name="bo_phan_su_dung">
                                            <?php if (isset($list_bo_phan_su_dung) && count($list_bo_phan_su_dung)) :
                                                foreach ($list_bo_phan_su_dung as $key => $item) : ?>
                                                    <option value="<?=$item->ma_bp?>"><?=$item->ten_bp?></option>
                                                <?php
                                                endforeach;
                                            endif ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row" id="div_su_dung">
                                    <div class="form-group col-md-3" id="div_nguoi_su_dung">
                                        <label><?=lang('TaiSanLang.nguoi_su_dung')?> </label>
                                        <input type="text" name="nguoi_su_dung" id="nguoi_su_dung"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="div_chuc_danh_su_dung">
                                        <label><?=lang('TaiSanLang.chuc_danh_su_dung')?> </label>
                                        <input type="text" name="chuc_danh_su_dung" id="chuc_danh_su_dung"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6" id="div_hinh_thuc_bo_tri_su_dung">
                                        <label><?=lang('TaiSanLang.hinh_thuc_bo_tri_su_dung')?> </label>
                                        <input type="text" name="hinh_thuc_bo_tri_su_dung" id="hinh_thuc_bo_tri_su_dung"  class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-row" id="div_kich_thuoc">
                                    <div class="form-group col-md-3" id="div_so_tang">
                                        <label><?=lang('TaiSanLang.so_tang')?> </label>
                                        <input type="text" name="so_tang" id="so_tang"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="div_chieu_dai" >
                                        <label><?=lang('TaiSanLang.chieu_dai')?> </label>
                                        <input type="text" name="chieu_dai" id="chieu_dai"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="div_dien_tich_xd">
                                        <label><?=lang('TaiSanLang.dien_tich_xd')?> </label>
                                        <input type="text" name="dien_tich_xd" id="dien_tich_xd"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id ="div_the_tich">
                                        <label><?=lang('TaiSanLang.the_tich')?> </label>
                                        <input type="text" name="the_tich" id="the_tich"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id = "div_nam_xay_dung">
                                        <label id="lbl_nam_xay_dung"><?=lang('TaiSanLang.nam_xay_dung')?> </label>
                                        <input type="text" name="nam_xay_dung" id="nam_xay_dung"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="div_nuoc_san_xuat">
                                        <label><?=lang('TaiSanLang.nuoc_san_xuat')?> </label>
                                        <input type="text" name="nuoc_san_xuat" id="nuoc_san_xuat"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="div_nhan_xe">
                                        <label><?=lang('TaiSanLang.nhan_xe')?> </label>
                                        <input type="text" name="nhan_xe" id="nhan_xe"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="div_model">
                                        <label id="lbl_model"><?=lang('TaiSanLang.model')?> </label>
                                        <input type="text" name="model" id="model"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="div_so_seri">
                                        <label id="lbl_so_seri"><?=lang('TaiSanLang.so_seri')?> </label>
                                        <input type="text" name="so_seri" id="so_seri"  class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-row" id = "div_phuong_tien">
                                    <div class="form-group col-md-3" >
                                        <label><?=lang('TaiSanLang.bien_kiem_soat')?> </label>
                                        <input type="text" name="bien_kiem_soat" id="bien_kiem_soat"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label><?=lang('TaiSanLang.so_may')?> </label>
                                        <input type="text" name="so_may" id="so_may"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label><?=lang('TaiSanLang.tai_trong')?> </label>
                                        <input type="text" name="tai_trong" id="tai_trong"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label><?=lang('TaiSanLang.so_cho_ngoi')?> </label>
                                        <input type="text" name="so_cho_ngoi" id="so_cho_ngoi"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label><?=lang('TaiSanLang.so_cau')?> </label>
                                        <input type="text" name="so_cau" id="so_cau"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label><?=lang('TaiSanLang.cong_suat_xe')?> </label>
                                        <input type="text" name="cong_suat_xe" id="cong_suat_xe"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label><?=lang('TaiSanLang.dung_tich_xe')?> </label>
                                        <input type="text" name="dung_tich_xe" id="dung_tich_xe"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label><?=lang('TaiSanLang.giay_cndk_so')?> </label>
                                        <input type="text" name="giay_cndk_so" id="giay_cndk_so"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label><?=lang('TaiSanLang.ngay_dk')?> </label>
                                        <input type="text" name="ngay_dk" id="ngay_dk"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label><?=lang('TaiSanLang.co_quan_cap_dk')?> </label>
                                        <input type="text" name="co_quan_cap_dk" id="co_quan_cap_dk"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label><?=lang('TaiSanLang.nguon_goc_xe')?> </label>
                                        <input type="text" name="nguon_goc_xe" id="nguon_goc_xe"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label><?=lang('TaiSanLang.mau_son')?> </label>
                                        <input type="text" name="mau_son" id="mau_son"  class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="form-row" id="div_dia_chi">
                                    <div class="form-group col-md-3">
                                        <label><?=lang('TaiSanLang.ma_tinh')?> <span class="text-danger">*</span></label>
                                        <select class="form-control" id="ma_tinh" required name="ma_tinh">
                                            <?php if (isset($list_dm_tinh) && count($list_dm_tinh)) :
                                                foreach ($list_dm_tinh as $key => $item) : ?>
                                                    <option value="<?=$item->ma?>"><?=$item->ten?></option>
                                                <?php
                                                endforeach;
                                            endif ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?=lang('TaiSanLang.ma_huyen')?> <span class="text-danger">*</span></label>
                                        <select class="form-control" id="ma_huyen"  name="ma_huyen">
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?=lang('TaiSanLang.ma_xa')?> <span class="text-danger">*</span></label>
                                        <select class="form-control" id="ma_xa"  name="ma_xa">
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?=lang('TaiSanLang.dia_chi')?> <span class="text-danger">*</span></label>
                                        <input type="text" name="dia_chi" id="dia_chi"  class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label><?=lang('TaiSanLang.qd_trang_cap')?> </label>
                                        <select class="form-control" id="qd_trang_cap"  name="qd_trang_cap">
                                            <option value=""></option>
                                            <?php if (isset($list_trang_cap) && count($list_trang_cap)) :
                                                foreach ($list_trang_cap as $key => $item) : ?>
                                                    <option value="<?=$item->so_qd?>"><?=$item->ten_qd?></option>
                                                <?php
                                                endforeach;
                                            endif ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label><?=lang('TaiSanLang.ngay_dq_trang_cap')?></label>
                                        <input type="date" name="ngay_dq_trang_cap" id="ngay_dq_trang_cap"  class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><?=lang('TaiSanLang.du_an')?> </label>
                                        <select class="form-control" id="du_an"  name="du_an">
                                            <option value=""></option>
                                            <?php if (isset($list_du_an) && count($list_du_an)) :
                                                foreach ($list_du_an as $key => $item) : ?>
                                                    <option value="<?=$item->ma_da?>"><?=$item->ten_da?></option>
                                                <?php
                                                endforeach;
                                            endif ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6><?=lang('TaiSanLang.nguyen_gia')?> <span class="text-danger">*</span></h6>
                                    <div class="form-row" id="div_gia_tri_dat">
                                        <div class="form-group col-md-4">
                                            <label><?=lang('TaiSanLang.gia_tri_dat')?></label>
                                            <input type="text" name="gia_tri_dat" id="gia_tri_dat"  class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div id="tab_nguon_hinh_thanh">
                                    </div>
                                </div>
                                <div class="form-row font-weight-bold">
                                    <div class="form-group col-md-5"><label><?=lang('TaiSanLang.tong_nguyen_gia')?> </label></div>
                                    <div class="form-group col-md-7"><label id ="tong_nguyen_gia"></label></div>
                                </div>
                                <div class="form-group">
                                    <h6><?=lang('TaiSanLang.thong_tin_ke_khai')?></h6>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label><?=lang('TaiSanLang.loai_tai_san_ke_khai')?></label>
                                            <select class="form-control" id="loai_tai_san_ke_khai" disabled name="loai_tai_san_ke_khai">
                                                <option value="1">Đất</option>
                                                <option value="2">Nhà</option>
                                                <option value="3">Xe ô tô</option>
                                                <option value="4">Tài sản trên 500 triệu</option>
                                                <option value="5">Tài sản dưới 500 triệu</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5" id ="div_muc_dich_su_dung">
                                            <label><?=lang('TaiSanLang.muc_dich_su_dung')?></label>
                                            <select class="form-control" id="muc_dich_su_dung" name="muc_dich_su_dung">
                                                <option value="1">Đất hoạt động sự nghiệp giáo dục và đào tạo</option>
                                                <option value="2">Đất hoạt động sự nghiệp  y tế</option>
                                                <option value="3">Đất hoạt động sự nghiệp văn hóa</option>
                                                <option value="4">Đất hoạt động thể dục, thể thao</option>
                                                <option value="5">Đất hoạt động sự nghiệp nông nghiệp</option>
                                                <option value="6">Đất hoạt động sự nghiệp thông tin, truyền thông</option>
                                                <option value="7">Đất hoạt động sự nghiệp khoa học, công nghệ</option>
                                                <option value="8">Đất công trình công cộng</option>
                                                <option value="9">Đất hoạt động sự nghiệp khác</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3" id="div_tong_dien_tich">
                                            <label><?=lang('TaiSanLang.tong_dien_tich')?></label>
                                            <input type="text" name="tong_dien_tich" id="tong_dien_tich"  class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-row" id="div_thong_so_ky_thuat">
                                        <div class="form-group col-md-12">
                                            <label><?=lang('TaiSanLang.thong_so_ky_thuat')?></label>
                                            <textarea class="form-control" rows="3" id="thong_so_ky_thuat" name="thong_so_ky_thuat" style="height: 56px;"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h6><?=lang('TaiSanLang.hien_trang_su_dung')?> <span class="text-danger">*</span></h6>
                                    <div class="form-group" id="div_hien_trang">
                                    </div>
                                </div>
                                <button type="submit" id="add_edit" name="add_tai_san" class="btn btn-primary "><?=lang('AppLang.save')?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4"> <!------ Thông tin hao mòn------>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?=lang('TaiSanLang.thong_tin_hm')?></h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                    <div class="form-row">
                                        <div id="div_ngay_mua" class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ngay_mua')?> <span class="text-danger">*</span></label>
                                            <input type="date" name="ngay_mua" id="ngay_mua" required class="form-control" placeholder=""  >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ngay_bd_su_dung')?> <span class="text-danger">*</span></label>
                                            <input type="date" name="ngay_bd_su_dung" id="ngay_bd_su_dung" required class="form-control"  placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ngay_ghi_tang')?> <span class="text-danger">*</span></label>
                                            <input type="date" name="ngay_ghi_tang" id="ngay_ghi_tang" required class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label><?=lang('TaiSanLang.nam_theo_doi')?></label>
                                            <input type="text" name="nam_theo_doi" id="nam_theo_doi" readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div id="div_ngay_bd_tinh_hm" class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ngay_bd_tinh_hm')?> <span class="text-danger">*</span></label>
                                            <input type="date" name="ngay_bd_tinh_hm" id="ngay_bd_tinh_hm" required class="form-control">
                                        </div>
                                        <div id="div_so_nam_su_dung" class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.so_nam_su_dung')?></label>
                                            <input type="text" name="so_nam_su_dung" id="so_nam_su_dung" readonly class="form-control">
                                        </div>
                                        <div id="div_ty_le_hao_mon" class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ty_le_hao_mon')?></label>
                                            <input type="text" name="ty_le_hao_mon" id="ty_le_hao_mon" readonly class="form-control">
                                        </div>
                                        <div id="div_hm_kh_nam" class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.hm_kh_nam')?></label>
                                            <input type="text" name="hm_kh_nam" id="hm_kh_nam" class="form-control">
                                        </div>
                                        <div id="div_so_nam_sd_con_lai" class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.so_nam_sd_con_lai')?></label>
                                            <input type="text" name="so_nam_sd_con_lai" id="so_nam_sd_con_lai" readonly class="form-control">
                                        </div>
                                        <div id="div_ngay_kt_hm" class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ngay_kt_hm')?></label>
                                            <input type="date" name="ngay_kt_hm" id="ngay_kt_hm" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div id="div_hm_luy_ke" class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.hm_luy_ke')?></label>
                                            <input type="text" name="hm_luy_ke" id="hm_luy_ke" class="form-control">
                                        </div>
                                        <div id="div_gia_tri_con_lai" class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.gia_tri_con_lai')?></label>
                                            <input type="text" name="gia_tri_con_lai" id="gia_tri_con_lai" readonly class="form-control">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    let nam_theo_doi = <?=(isset($selected_year)?$selected_year:Date().getFullYear())?>;
    let ma_tai_san = "<?=(isset($ma_tai_san)?$ma_tai_san:'')?>";
    let html_hien_trang = "<div class=\"form-check form-check-inline\">\n" +
        "                                            <label class=\"form-check-label\">\n" +
        "                                                <input type=\"checkbox\" id=\"quan_ly_nha_nuoc\" name=\"quan_ly_nha_nuoc\"\n" +
        "                                                       class=\"form-check-input\" value=\"1\" ><?=lang('TaiSanLang.quan_ly_nha_nuoc')?>\n" +
        "                                            </label>\n" +
        "                                        </div>\n" +
        "                                        <div class=\"form-check form-check-inline disabled\">\n" +
        "                                            <label class=\"form-check-label\">\n" +
        "                                                <input type=\"checkbox\" id=\"hdsn_kkd\" name=\"hdsn_kkd\"\n" +
        "                                                       class=\"form-check-input\" value=\"1\" readonly><?=lang('TaiSanLang.hdsn_kkd')?>\n" +
        "                                            </label>\n" +
        "                                        </div>\n" +
        "                                        <div class=\"form-check form-check-inline\">\n" +
        "                                            <label class=\"form-check-label\">\n" +
        "                                                <input type=\"checkbox\" id=\"hdsn_kd\" name=\"hdsn_kd\"\n" +
        "                                                       class=\"form-check-input\" value=\"1\" readonly><?=lang('TaiSanLang.hdsn_kd')?>\n" +
        "                                            </label>\n" +
        "                                        </div>\n" +
        "                                        <div class=\"form-check form-check-inline\">\n" +
        "                                            <label class=\"form-check-label\">\n" +
        "                                                <input type=\"checkbox\" id=\"hdsn_ldlk\" name=\"hdsn_ldlk\"\n" +
        "                                                       class=\"form-check-input\" value=\"1\" readonly><?=lang('TaiSanLang.hdsn_ldlk')?>\n" +
        "                                            </label>\n" +
        "                                        </div>\n" +
        "                                        <div class=\"form-check form-check-inline\">\n" +
        "                                            <label class=\"form-check-label\">\n" +
        "                                                <input type=\"checkbox\" id=\"hdsn_ct\" name=\"hdsn_ct\"\n" +
        "                                                       class=\"form-check-input\" value=\"1\" readonly><?=lang('TaiSanLang.hdsn_ct')?>\n" +
        "                                            </label>\n" +
        "                                        </div>\n" +
        "                                        <div class=\"form-check form-check-inline\">\n" +
        "                                            <label class=\"form-check-label\">\n" +
        "                                                <input type=\"checkbox\" id=\"su_dung_khac\" name=\"su_dung_khac\"\n" +
        "                                                       class=\"form-check-input\" value=\"1\" ><?=lang('TaiSanLang.su_dung_khac')?>\n" +
        "                                            </label>\n" +
        "                                        </div>";
    let html_hien_trang_dat_nha = "<div class=\"form-row\">\n" +
        "                                            <div class=\"form-group col-md-2\" >\n" +
        "                                                <label><?=lang('TaiSanLang.quan_ly_nha_nuoc')?> </label>\n" +
        "                                                <input type=\"text\" name=\"quan_ly_nha_nuoc\" id=\"quan_ly_nha_nuoc\"  class=\"form-control\" placeholder=\"\">\n" +
        "                                            </div>\n" +
        "                                            <div class=\"form-group col-md-2\" >\n" +
        "                                                <label><?=lang('TaiSanLang.hdsn_kkd')?> </label>\n" +
        "                                                <input type=\"text\" name=\"hdsn_kkd\" id=\"hdsn_kkd\"  class=\"form-control\" placeholder=\"\">\n" +
        "                                            </div>\n" +
        "                                            <div class=\"form-group col-md-2\" >\n" +
        "                                                <label><?=lang('TaiSanLang.hdsn_kd')?> </label>\n" +
        "                                                <input type=\"text\" name=\"hdsn_kd\" id=\"hdsn_kd\"  class=\"form-control\" placeholder=\"\">\n" +
        "                                            </div>\n" +
        "                                            <div class=\"form-group col-md-2\" >\n" +
        "                                                <label><?=lang('TaiSanLang.hdsn_ldlk')?> </label>\n" +
        "                                                <input type=\"text\" name=\"hdsn_ldlk\" id=\"hdsn_ldlk\"  class=\"form-control\" placeholder=\"\">\n" +
        "                                            </div>\n" +
        "                                            <div class=\"form-group col-md-2\" >\n" +
        "                                                <label><?=lang('TaiSanLang.hdsn_ct')?> </label>\n" +
        "                                                <input type=\"text\" name=\"hdsn_ct\" id=\"hdsn_ct\"  class=\"form-control\" placeholder=\"\">\n" +
        "                                            </div>\n" +
        "                                            <div class=\"form-group col-md-2\" >\n" +
        "                                                <label><?=lang('TaiSanLang.de_o')?> </label>\n" +
        "                                                <input type=\"text\" name=\"de_o\" id=\"de_o\"  class=\"form-control\" placeholder=\"\">\n" +
        "                                            </div>\n" +
        "                                            <div class=\"form-group col-md-2\" >\n" +
        "                                                <label><?=lang('TaiSanLang.bo_trong')?> </label>\n" +
        "                                                <input type=\"text\" name=\"bo_trong\" id=\"bo_trong\"  class=\"form-control\" placeholder=\"\">\n" +
        "                                            </div>\n" +
        "                                            <div class=\"form-group col-md-2\" >\n" +
        "                                                <label><?=lang('TaiSanLang.bi_lan_chiem')?> </label>\n" +
        "                                                <input type=\"text\" name=\"bi_lan_chiem\" id=\"bi_lan_chiem\"  class=\"form-control\" placeholder=\"\">\n" +
        "                                            </div>\n" +
        "                                            <div class=\"form-group col-md-2\" >\n" +
        "                                                <label><?=lang('TaiSanLang.su_dung_hon_hop')?> </label>\n" +
        "                                                <input type=\"text\" name=\"su_dung_hon_hop\" id=\"su_dung_hon_hop\"  class=\"form-control\" placeholder=\"\">\n" +
        "                                            </div>\n" +
        "                                            <div class=\"form-group col-md-2\" >\n" +
        "                                                <label><?=lang('TaiSanLang.su_dung_khac')?> </label>\n" +
        "                                                <input type=\"text\" name=\"su_dung_khac\" id=\"su_dung_khac\"  class=\"form-control\" placeholder=\"\">\n" +
        "                                            </div>\n" +
        "                                        </div>";
    let html_ly_do_tang_nha = "<option>Nhà nước giao đất</option>\n" +
        "                      <option>Nhà nước cho thuê đất</option>\n" +
        "                      <option>Nhà nước cho thuê đất</option>\n" +
        "                      <option>Tiếp nhận</option>\n" +
        "                      <option>Mua sắm</option>\n" +
        "                      <option>Kiểm kê phát hiện thừa</option>\n" +
        "                      <option>Khác</option>       ";
    let html_ly_do_tang_dat =
        "                      <option>Đầu tư xây dựng</option>\n" +
        "                      <option>Tiếp nhận</option>\n" +
        "                      <option>Mua sắm</option>\n" +
        "                      <option>Kiểm kê phát hiện thừa</option>\n" +
        "                      <option>Khác</option>       ";
    let html_ly_do_tang =
        "                      <option>Tiếp nhận</option>\n" +
        "                      <option>Mua sắm</option>\n" +
        "                      <option>Kiểm kê phát hiện thừa</option>\n" +
        "                      <option>Khác</option>       ";
    let sum_nguyen_gia = 0;
    $('#form_id').on('submit', function (event) {
        event.preventDefault();
        $("#response_success").hide('fast');
        $("#response_danger").hide('fast');
        $("#response_danger_modal").hide('fast');
        var name = $("#add_edit").attr("name");
        var formData = $(this).serialize();
        console.log(formData);
        $.ajax({
            url: "<?= base_url() ?>dashboard/tai_san/"+name+"_tai_san",
            method: "POST",
            data: formData,
            dataType: "json",
            success: function (data) {
                if (data[0]==0) {
                    $("#response_success").show('fast');
                    $("#response_success").html(data[1]);
                    window.location="<?= base_url() ?>dashboard/tai_san/";
                } else {
                    $("#response_danger_modal").show('fast');
                    $("#response_danger_modal").html(data[1]);
                }
            },
            error: function (data) {
                $("#response_danger_modal").show('fast');
                $("#response_danger_modal").html(data);
            }
        });
    });
    let html_nguon_hinh_thanh = ""; // Nguồn kinh phí
    let stt_nguon_hinh_thanh = 0;
    const giaTriValues = {};
    function create_nguon_hinh_thanh(stt=1,data = ['0','0']){
        let
        text_nguon_hinh_thanh =
            "<div class=\"form-row\" id=\""+stt+"_nguon_hinh_thanh\">" +
            " <div class=\"form-group col-md-6\">\n" +
            "   <label><?=lang('TaiSanLang.nguon_hinh_thanh')?></label>\n" +
            "   <select class=\"custom-select\" id=\"nguon_hinh_thanh_ma_kp_"+stt+"\" name=\"data["+stt+"][ma_kp]\" value=\""+data[0]+"\">\n";

        <?php if (isset($list_kinh_phi) && count($list_kinh_phi)) :
        foreach ($list_kinh_phi as $key => $item) : ?>
        text_nguon_hinh_thanh +="<option value=\"<?=$item->ma_kp?>\" "+("<?=$item->ma_kp?>"==data[0]? "selected":"")+ " ><?=$item->ten_kp?></option>\n";
        <?php
        endforeach;
        endif ?>
        text_nguon_hinh_thanh +=
            "   </select>\n" +
            "</div>"+
            "<div class=\"form-group col-md-3\">\n" +
            "   <label><?=lang('TaiSanLang.gia_tri')?></label>\n" +
            "       <input type=\"text\" id=\"nguon_hinh_thanh_gia_tri_"+stt+"\" name=\"data["+stt+"][gia_tri]\" value=\""+data[1]+"\" \n" +
            "           class=\"form-control\" placeholder=\"<?=lang('TaiSanLang.gia_tri')?>\">\n" +
            "</div>\n" +
            "<div class =\"form-group \">\n" +
            "   <label>Action</label>\n" +
            "   <div class=\"form-control\">" +
            "           <a href=\"javascript:void(add_row_nguon_hinh_thanh(['0','0']))\" class=\"mr-4\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Add\">" +
            "           <i class=\"fa fa-plus color-muted\"></i> </a>";
        if(stt>1) {
            text_nguon_hinh_thanh +=
                "          <a href=\"javascript:void(remove_row_nguon_hinh_thanh('"+stt+"_nguon_hinh_thanh'))\" class=\"mr-4\" " +
                "               data-toggle=\"tooltip\" data-placement=\"top\" title=\"<?=lang('AppLang.delete')?>\">" +
                "           <i class=\"fa fa-close color-danger\"></i></a>\n"
        }
        text_nguon_hinh_thanh +=
            "   </div>\n" +
            "</div>" +
            "</div>";
        return text_nguon_hinh_thanh;
    };
    function add_row_nguon_hinh_thanh(data_row) {
        stt_nguon_hinh_thanh = stt_nguon_hinh_thanh+1;
        giaTriValues[stt_nguon_hinh_thanh] = data_row;
        html_nguon_hinh_thanh = $("#tab_nguon_hinh_thanh").html();
        html_nguon_hinh_thanh += create_nguon_hinh_thanh(stt_nguon_hinh_thanh,data_row);
        $("#tab_nguon_hinh_thanh").html(html_nguon_hinh_thanh);
        // Lặp qua các giá trị trong biến giaTriValues
        Object.keys(giaTriValues).forEach((inputId) => {
            const giaTri = giaTriValues[inputId];
            $('#nguon_hinh_thanh_ma_kp_'+inputId).val(giaTriValues[inputId][0]);
            $('#nguon_hinh_thanh_gia_tri_'+inputId).val( parseFloat(giaTriValues[inputId][1]|| 0));
            //console.log(`Trường nhập ${inputId}: Giá trị ban đầu = ${giaTri}`);
        });
        set_Listener_input_gia_tri();
    };
    function remove_row_nguon_hinh_thanh(id) {
        $("#"+id).remove();
        html_nguon_hinh_thanh = $("#tab_nguon_hinh_thanh").html();
        calculateSum();
    };
    // Hàm tính tổng và hiển thị kết quả
    function calculateSum() {
        let sum = 0;
        const giaTriElements = document.querySelectorAll('input[id^="nguon_hinh_thanh_gia_tri"]');
        giaTriElements.forEach((element) => {
            const match = element.id.match(/\d+/);
            if (match.length>0) {
                giaTriValues[match[0]][1] = parseFloat(element.value || 0);
                giaTriValues[match[0]][0] = $('#nguon_hinh_thanh_ma_kp_'+match[0]).val();
                sum += parseFloat(element.value || 0); // Nếu giá trị rỗng hoặc không hợp lệ, coi như là 0
            }
        });
        const tongNguyenGiaLabel = document.getElementById("tong_nguyen_gia");
        tongNguyenGiaLabel.innerText = `${sum.toLocaleString()}`;
        sum_nguyen_gia = sum;
        const tyle_haomon = parseFloat($("#ty_le_hao_mon").val() || 0);
        let hm_kh_nam = sum * tyle_haomon / 100;
        $('#hm_kh_nam').val(hm_kh_nam);
        gia_tri_con_lai();
        //alert(`Tổng giá trị là: ${sum}`);
    }
    function set_Listener_input_gia_tri() {
        // Lắng nghe sự kiện "input" của các trường nhập
        const giaTriInputs = document.querySelectorAll('input[id^="nguon_hinh_thanh_gia_tri"]');
        giaTriInputs.forEach((input) => {
            input.addEventListener("input", calculateSum);
        });
    }
    $('#nhom_tai_san').change(function(){
        load_loai_tai_san(this.value);
        load_loai_tai_san_ct();
        load_view_nhom_tai_san(this.value)
    });
    $('#loai_tai_san').change(function(){
        load_loai_tai_san_ct();
    });
    $('#hm_luy_ke').change(function () {
        gia_tri_con_lai();
    });

    $('#ma_tinh').change(function () {
        $.ajax({
            url: "<?= base_url() ?>dashboard/tai_san/ma_huyen_ajax",
            method: "POST",
            dataType: "json",
            async: false,
            data: {ma_tinh:this.value},
            success: function (data) {
                $("#ma_huyen").html(data);
                //$("#ma_huyen").trigger("change");
            }
        });
    });
    $('#ma_huyen').change(function () {
        $.ajax({
            url: "<?= base_url() ?>dashboard/tai_san/ma_xa_ajax",
            method: "POST",
            dataType: "json",
            async: false,
            data: {ma_huyen:this.value},
            success: function (data) {
                $("#ma_xa").html(data);
            }
        });
    });
    function gia_tri_con_lai(){

        $('#gia_tri_con_lai').val((sum_nguyen_gia - parseInt( $('#hm_luy_ke').val()||0)));
    }
    $('#so_nam_su_dung,#ngay_bd_tinh_hm').change(function(){
        currentDate = new Date();
        const year_now = parseInt(currentDate.getFullYear()||0);
        const year_hm = parseInt($('#ngay_bd_tinh_hm').val().substring(0, 4)||0);
        const sonam_sudung = parseInt($("#so_nam_su_dung").val()||0);
        const hm_kh_nam = parseInt($("#hm_kh_nam").val()||0);
        let sonam_conlai = sonam_sudung- (year_now - year_hm);
        $('#so_nam_sd_con_lai').val(sonam_conlai);
        $('#hm_luy_ke').val((year_now - year_hm)*hm_kh_nam);
        $("#hm_luy_ke").trigger("change");
        const ngay_kt_hm = new Date($('#ngay_bd_tinh_hm').val());
        ngay_kt_hm.setFullYear(ngay_kt_hm.getFullYear() + sonam_sudung);
        $('#ngay_kt_hm').val(ngay_kt_hm.toISOString().slice(0, 10));


    });

    function load_loai_tai_san_ct() {
        let ma_loai_ts = $('#loai_tai_san').val();
        if(ma_loai_ts !== null && ma_loai_ts.length>0) {
            $.ajax({
                url: "<?= base_url() ?>dashboard/tai_san/loai_tai_san_ct_ajax",
                method: "POST",
                dataType: "json",
                data: {ma_loai_ts:ma_loai_ts},
                success: function (data) {
                    if(data !== null && Array.isArray(data) && data.length > 0) {
                        console.log(data[0]);
                        $("#ty_le_hao_mon").val(data[0]["tyle_haomon"]);
                        $("#so_nam_su_dung").val(data[0]["sonam_sudung"]);
                        $("#so_nam_su_dung").trigger("change");
                    }
                }
            });
        }
    }
    function load_loai_tai_san(id_nhom){
        $.ajax({
            url: "<?= base_url() ?>dashboard/tai_san/loai_tai_san_ajax",
            method: "POST",
            dataType: "json",
            async: false,
            data: {id_nhom: id_nhom},
            success: function (data) {
                $("#loai_tai_san").html(data);
            }
        });
    }
    load_form_hao_mon();
    function load_form_hao_mon() {
        var field = document.getElementById("add_edit");

        if(ma_tai_san.length>0){
            $('#text_add_edit_tai_san').html("<?=lang('TaiSanLang.edit_taisan')?>");
            field.setAttribute("name",'edit');
            $.ajax({
                url: "<?= base_url() ?>dashboard/tai_san/tai_san_ct_ajax",
                method: "POST",
                dataType: "json",
                async: false,
                data: {ma_tai_san:ma_tai_san},
                success: function (data) {
                    if(data !== null && Array.isArray(data) && data.length > 0) {
                        console.log(data);
                        $("#nhom_tai_san").val(data[0]["nhom_tai_san"]);
                        $("#nhom_tai_san").trigger("change");
                        
                        $("#trang_thai").val(data[0]["trang_thai"]);
                        $("#ty_le_hao_mon").val(data[0]["ty_le_hao_mon"]);
                        $("#so_nam_su_dung").val(data[0]["so_nam_su_dung"]);
                        $("#ngay_mua").val(data[0]["ngay_mua"]);
                        $("#ngay_bd_su_dung").val(data[0]["ngay_bd_su_dung"]);
                        $("#ngay_ghi_tang").val(data[0]["ngay_ghi_tang"]);
                        $("#nam_theo_doi").val(data[0]["nam_theo_doi"]);
                        $("#ngay_bd_tinh_hm").val(data[0]["ngay_bd_tinh_hm"]);
                        $("#so_nam_su_dung").val(data[0]["so_nam_su_dung"]);
                        $("#ty_le_hao_mon").val(data[0]["ty_le_hao_mon"]);
                        $("#hm_kh_nam").val(data[0]["hm_kh_nam"]);
                        $("#so_nam_sd_con_lai").val(data[0]["so_nam_sd_con_lai"]);
                        $("#ngay_kt_hm").val(data[0]["ngay_kt_hm"]);
                        $("#hm_luy_ke").val(data[0]["hm_luy_ke"]);
                        $("#gia_tri_con_lai").val(data[0]["gia_tri_con_lai"]);
                        //
                        $("#ma_tinh").val(data[0]["ma_tinh"]);
                        $("#ma_tinh").trigger("change");
                        $("#ma_huyen").val(data[0]["ma_huyen"]);
                        $("#ma_huyen").trigger("change");
                        $("#ma_xa").val(data[0]["ma_xa"]);
                        $("#dia_chi").val(data[0]["dia_chi"]);
                        //
                        $("#loai_tai_san").val(data[0]["loai_tai_san"]);
                        $("#ma_tai_san").val(data[0]["ma_tai_san"]);
                        $('#ma_tai_san').prop("readonly", true);
                        $("#ten_tai_san").val(data[0]["ten_tai_san"]);
                        $("#ly_do_tang").val(data[0]["ly_do_tang"]);
                        $("#so_luong").val(data[0]["so_luong"]);
                        $("#don_vi_tinh").val(data[0]["don_vi_tinh"]);
                        $("#bo_phan_su_dung").val(data[0]["bo_phan_su_dung"]);
                        $("#qd_trang_cap").val(data[0]["qd_trang_cap"]);
                        $("#ngay_dq_trang_cap").val(data[0]["ngay_dq_trang_cap"]);
                        $("#du_an").val(data[0]["du_an"]);
                        $("#loai_tai_san_ke_khai").val(data[0]["loai_tai_san_ke_khai"]);
                        $("#thong_so_ky_thuat").val(data[0]["thong_so_ky_thuat"]);

                        $("#so_tang").val(data[0]["so_tang"]);
                        $("#chieu_dai").val(data[0]["chieu_dai"]);
                        $("#dien_tich_xd").val(data[0]["dien_tich_xd"]);
                        $("#the_tich").val(data[0]["the_tich"]);
                        $("#nam_xay_dung").val(data[0]["nam_xay_dung"]);
                        $("#nuoc_san_xuat").val(data[0]["nuoc_san_xuat"]);
                        $("#bien_kiem_soat").val(data[0]["bien_kiem_soat"]);
                        $("#nhan_xe").val(data[0]["nhan_xe"]);
                        $("#model").val(data[0]["model"]);
                        $("#so_seri").val(data[0]["so_seri"]);
                        $("#so_may").val(data[0]["so_may"]);
                        $("#tai_trong").val(data[0]["tai_trong"]);
                        $("#so_cho_ngoi").val(data[0]["so_cho_ngoi"]);
                        $("#so_cau").val(data[0]["so_cau"]);
                        $("#cong_suat_xe").val(data[0]["cong_suat_xe"]);
                        $("#dung_tich_xe").val(data[0]["dung_tich_xe"]);
                        $("#giay_cndk_so").val(data[0]["giay_cndk_so"]);
                        $("#ngay_dk").val(data[0]["ngay_dk"]);
                        $("#co_quan_cap_dk").val(data[0]["co_quan_cap_dk"]);
                        $("#nguon_goc_xe").val(data[0]["nguon_goc_xe"]);
                        $("#mau_son").val(data[0]["mau_son"]);
                        $("#nguoi_su_dung").val(data[0]["nguoi_su_dung"]);
                        $("#hinh_thuc_bo_tri_su_dung").val(data[0]["hinh_thuc_bo_tri_su_dung"]);
                        $("#chuc_danh_su_dung").val(data[0]["chuc_danh_su_dung"]);
                        $("#gia_tri_dat").val(data[0]["gia_tri_dat"]);
                        $("#tong_dien_tich").val(data[0]["tong_dien_tich"]);
                        $("#muc_dich_su_dung").val(data[0]["muc_dich_su_dung"]);
                        //
                        if(data[0]["nhom_tai_san"] == 1 || data[0]["nhom_tai_san"] == 2) {
                            $("#quan_ly_nha_nuoc").val(data[0]["quan_ly_nha_nuoc"]);
                            $("#hdsn_kkd").val(data[0]["hdsn_kkd"]);
                            $("#hdsn_kd").val(data[0]["hdsn_kd"]);
                            $("#hdsn_ldlk").val(data[0]["hdsn_ldlk"]);
                            $("#hdsn_ct").val(data[0]["hdsn_ct"]);
                            $("#su_dung_khac").val(data[0]["su_dung_khac"]);
                            $("#de_o").val(data[0]["de_o"]);
                            $("#bo_trong").val(data[0]["bo_trong"]);
                            $("#bi_lan_chiem").val(data[0]["bi_lan_chiem"]);
                            $("#su_dung_hon_hop").val(data[0]["su_dung_hon_hop"]);

                        }else{
                            if (data[0]["quan_ly_nha_nuoc"] == 1)
                                $('#quan_ly_nha_nuoc').prop("checked", true);
                            else $('#quan_ly_nha_nuoc').prop("checked", false);
                            if (data[0]["hdsn_kkd"] == 1)
                                $('#hdsn_kkd').prop("checked", true);
                            else $('#hdsn_kkd').prop("checked", false);
                            if (data[0]["hdsn_kd"] == 1)
                                $('#hdsn_kd').prop("checked", true);
                            else $('#hdsn_kd').prop("checked", false);
                            if (data[0]["hdsn_ldlk"] == 1)
                                $('#hdsn_ldlk').prop("checked", true);
                            else $('#hdsn_ldlk').prop("checked", false);
                            if (data[0]["hdsn_ct"] == 1)
                                $('#hdsn_ct').prop("checked", true);
                            else $('#hdsn_ct').prop("checked", false);
                            if (data[0]["su_dung_khac"] == 1)
                                $('#su_dung_khac').prop("checked", true);
                            else $('#su_dung_khac').prop("checked", false);
                        }
                        //

                        $.ajax({
                            url: "<?= base_url() ?>dashboard/tai_san/nguyen_gia_ajax",
                            method: "POST",
                            async: false,
                            dataType: "json",
                            data: {ma_tai_san: data[0]["ma_tai_san"]},
                            success: function (data) {
                                if (data !== null && Array.isArray(data) && data.length > 0) {
                                    data.forEach(async (dm) => {
                                        var row = [dm.ma_kp, dm.gia_tri];
                                        add_row_nguon_hinh_thanh(row);
                                    });
                                    calculateSum();
                                }
                            },
                            error: function (data) {
                                console.log(data);
                            }
                        });
                    }
                }
            });
        }else {
            $('#text_add_edit_tai_san').html("<?=lang('TaiSanLang.add_taisan')?>");
            field.setAttribute("name",'add');
            // Get the current date
            const currentDate = new Date();
            currentDate.setFullYear(nam_theo_doi);
            // Format the date as "yyyy-MM-dd"
            const formattedDate = currentDate.toISOString().slice(0, 10);
            $('#ma_tai_san').prop("readonly",false);
            $('#nam_theo_doi').val(nam_theo_doi);
            $('#ngay_mua').val(formattedDate);
            $('#ngay_bd_su_dung').val(formattedDate);
            $('#ngay_ghi_tang').val(formattedDate);
            $('#ngay_bd_tinh_hm').val(formattedDate);

            add_row_nguon_hinh_thanh(['0','0']);
            load_view_nhom_tai_san('1');
        }
    }
    function load_view_nhom_tai_san(nhom_tai_san) {
        $('#div_ngay_mua').show();
        $('#div_ngay_bd_tinh_hm').show();
        $('#div_so_nam_su_dung').show();
        $('#div_ty_le_hao_mon').show();
        $('#div_hm_kh_nam').show();
        $('#div_so_nam_sd_con_lai').show();
        $('#div_ngay_kt_hm').show();
        $('#div_hm_luy_ke').show();
        $('#div_gia_tri_con_lai').show();

        $('#div_dia_chi').hide();
        $('#div_gia_tri_dat').hide();
        $('#div_thong_so_ky_thuat').show();
        $('#div_muc_dich_su_dung').hide();
        $('#div_tong_dien_tich').hide();

        $('#div_hien_trang').html(html_hien_trang);
        $('#ly_do_tang').html(html_ly_do_tang);
        //
        $('#lbl_nam_xay_dung').html('<?=lang('TaiSanLang.nam_san_xuat')?>');
        $('#lbl_model').html('<?=lang('TaiSanLang.model')?>');
        $('#lbl_so_seri').html('<?=lang('TaiSanLang.so_seri')?>');
        switch(nhom_tai_san) {
            case '1':
                $('#div_ngay_mua').hide();
                $('#div_ngay_bd_tinh_hm').hide();
                $('#div_so_nam_su_dung').hide();
                $('#div_ty_le_hao_mon').hide();
                $('#div_hm_kh_nam').hide();
                $('#div_so_nam_sd_con_lai').hide();
                $('#div_ngay_kt_hm').hide();
                $('#div_hm_luy_ke').hide();
                $('#div_gia_tri_con_lai').hide();
                $('#div_kich_thuoc').hide();
                $('#div_phuong_tien').hide();
                $('#div_su_dung').hide();

                $('#div_dia_chi').show();
                $("#loai_tai_san_ke_khai").val(1);
                $('#div_thong_so_ky_thuat').hide();

                $('#div_gia_tri_dat').show();
                $('#div_muc_dich_su_dung').show();
                $('#div_tong_dien_tich').show();
                //
                $('#div_hien_trang').html(html_hien_trang_dat_nha);
                $('#ly_do_tang').html(html_ly_do_tang_dat);
                break;
            case '2':
                $('#div_dia_chi').show();
                $("#loai_tai_san_ke_khai").val(2);
                $('#div_thong_so_ky_thuat').hide();
                $('#div_su_dung').hide();
                $('#div_phuong_tien').hide();
                //
                $('#div_kich_thuoc').show();
                $('#div_so_tang').show();
                $('#div_chieu_dai').hide();
                $('#div_the_tich').hide();
                $('#div_dien_tich_xd').show();
                $('#div_nam_xay_dung').show();
                $('#div_nuoc_san_xuat').hide();
                $('#div_nhan_xe').hide();
                $('#div_so_seri').hide();
                $('#div_model').hide();
                //
                $('#div_muc_dich_su_dung').hide();
                $('#div_tong_dien_tich').show();
                $('#div_hien_trang').html(html_hien_trang_dat_nha);
                $('#ly_do_tang').html(html_ly_do_tang_nha);
                //
                $('#lbl_nam_xay_dung').html('<?=lang('TaiSanLang.nam_xay_dung')?>');
                break;
            case '3':
                $("#loai_tai_san_ke_khai").val(4);
                $('#div_thong_so_ky_thuat').hide();
                $('#div_phuong_tien').hide();
                $('#div_su_dung').hide();
                //
                $('#div_kich_thuoc').show();
                $('#div_so_tang').hide();
                $('#div_chieu_dai').show();
                $('#div_the_tich').show();
                $('#div_dien_tich_xd').show();
                $('#div_nam_xay_dung').show();
                $('#div_nuoc_san_xuat').show();
                $('#div_nhan_xe').hide();
                $('#div_so_seri').hide();
                $('#div_model').hide();
                //
                break;
            case '4':
                $("#loai_tai_san_ke_khai").val(3);
                $('#div_phuong_tien').show();
                //
                $('#div_kich_thuoc').show();
                $('#div_so_tang').hide();
                $('#div_chieu_dai').hide();
                $('#div_the_tich').hide();
                $('#div_dien_tich_xd').hide();
                $('#div_nam_xay_dung').show();
                $('#div_nuoc_san_xuat').show();
                $('#div_nhan_xe').show();
                $('#div_so_seri').show();
                $('#div_model').show();
                //
                $('#div_su_dung').show();
                $('#div_chuc_danh_su_dung').hide();
                $('#div_nguoi_su_dung').show();
                $('#div_hinh_thuc_bo_tri_su_dung').show();
                //
                $('#lbl_model').html('<?=lang('TaiSanLang.dong_xe')?>');
                $('#lbl_so_seri').html('<?=lang('TaiSanLang.so_khung')?>');
                break;
            case '5':
                $("#loai_tai_san_ke_khai").val(4);
                $('#div_phuong_tien').show();
                //
                $('#div_kich_thuoc').show();
                $('#div_so_tang').hide();
                $('#div_chieu_dai').hide();
                $('#div_the_tich').hide();
                $('#div_dien_tich_xd').hide();
                $('#div_nam_xay_dung').show();
                $('#div_nuoc_san_xuat').show();
                $('#div_nhan_xe').show();
                $('#div_so_seri').show();
                $('#div_model').show();
                //
                $('#div_su_dung').show();
                $('#div_chuc_danh_su_dung').show();
                $('#div_nguoi_su_dung').show();
                $('#div_hinh_thuc_bo_tri_su_dung').show();
                //
                $('#lbl_model').html('<?=lang('TaiSanLang.dong_xe')?>');
                $('#lbl_so_seri').html('<?=lang('TaiSanLang.so_khung')?>');
                break;
            case '6':
                $("#loai_tai_san_ke_khai").val(5);
                $('#div_phuong_tien').hide();
                //
                $('#div_kich_thuoc').show();
                $('#div_so_tang').hide();
                $('#div_chieu_dai').hide();
                $('#div_the_tich').hide();
                $('#div_dien_tich_xd').hide();
                $('#div_nam_xay_dung').show();
                $('#div_nuoc_san_xuat').show();
                $('#div_nhan_xe').show();
                $('#div_so_seri').show();
                $('#div_model').show();
                //
                break;
            case '7':
                $("#loai_tai_san_ke_khai").val(5);
                $('#div_phuong_tien').hide();
                //
                $('#div_kich_thuoc').show();
                $('#div_so_tang').hide();
                $('#div_chieu_dai').hide();
                $('#div_the_tich').hide();
                $('#div_dien_tich_xd').hide();
                $('#div_nam_xay_dung').show();
                $('#div_nuoc_san_xuat').show();
                $('#div_nhan_xe').hide();
                $('#div_so_seri').hide();
                $('#div_model').hide();
                $('#div_su_dung').show();
                $('#div_chuc_danh_su_dung').hide();
                $('#div_nguoi_su_dung').hide();
                $('#div_hinh_thuc_bo_tri_su_dung').show();
                //
                $('#lbl_nam_xay_dung').html('<?=lang('TaiSanLang.nam_trong')?>');
                break;
            default:
                $("#loai_tai_san_ke_khai").val(5);
                $('#div_phuong_tien').hide();
                //
                $('#div_kich_thuoc').show();
                $('#div_so_tang').hide();
                $('#div_chieu_dai').hide();
                $('#div_the_tich').hide();
                $('#div_dien_tich_xd').hide();
                $('#div_nam_xay_dung').show();
                $('#div_nuoc_san_xuat').show();
                $('#div_nhan_xe').show();
                $('#div_so_seri').show();
                $('#div_model').show();
                $('#div_su_dung').show();
                $('#div_chuc_danh_su_dung').hide();
                $('#div_nguoi_su_dung').hide();
                $('#div_hinh_thuc_bo_tri_su_dung').show();
                //
                break;
        }
        $('#quan_ly_nha_nuoc,#hdsn_kkd,#hdsn_kd,#hdsn_ldlk,#hdsn_ct,#su_dung_khac,#de_o,#bo_trong,#bi_lan_chiem,#su_dung_hon_hop').change(function () {
            let tong_dien_tich = parseInt( $('#quan_ly_nha_nuoc').val()||0) + parseInt( $('#hdsn_kkd').val()||0) + parseInt( $('#hdsn_kd').val()||0) +
                parseInt( $('#hdsn_ldlk').val()||0) + parseInt( $('#hdsn_ct').val()||0) + parseInt( $('#su_dung_khac').val()||0) +
                parseInt( $('#de_o').val()||0) + parseInt( $('#bo_trong').val()||0) + parseInt( $('#bi_lan_chiem').val()||0) +
                parseInt( $('#su_dung_hon_hop').val()||0);
            $('#tong_dien_tich').val(tong_dien_tich);
        });
    }
</script>

