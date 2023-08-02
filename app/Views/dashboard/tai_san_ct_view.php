<div class="content-body">
    <div class="container-fluid">
        <form>
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                            <h4><?=lang('TaiSanLang.add_taisan')?></h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <select class="form-control" id="loai_tai_san" name="loai_tai_san">
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
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="1234 Main St">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>City</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>State</label>
                                        <select id="inputState" class="form-control">
                                            <option selected="">Choose...</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Zip</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            Check me out
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?=lang('TaiSanLang.thong_tin_hm')?></h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ngay_mua')?></label>
                                            <input type="date" name="ngay_mua" id="ngay_mua" class="form-control" placeholder=""  >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ngay_bd_su_dung')?></label>
                                            <input type="date" name="ngay_bd_su_dung" id="ngay_bd_su_dung" class="form-control"  placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ngay_ghi_tang')?></label>
                                            <input type="date" name="ngay_ghi_tang" id="ngay_ghi_tang" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label><?=lang('TaiSanLang.nam_theo_doi')?></label>
                                            <input type="text" name="nam_theo_doi" id="nam_theo_doi" readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ngay_bd_tinh_hm')?></label>
                                            <input type="date" name="ngay_bd_tinh_hm" id="ngay_bd_tinh_hm" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.so_nam_su_dung')?></label>
                                            <input type="text" name="so_nam_su_dung" id="so_nam_su_dung" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ty_le_hao_mon')?></label>
                                            <input type="text" name="ty_le_hao_mon" id="ty_le_hao_mon" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.hm_kh_nam')?></label>
                                            <input type="text" name="hm_kh_nam" id="hm_kh_nam" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.so_nam_sd_con_lai')?></label>
                                            <input type="text" name="so_nam_sd_con_lai" id="so_nam_sd_con_lai" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ngay_kt_hm')?></label>
                                            <input type="date" name="ngay_kt_hm" id="ngay_kt_hm" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.hm_luy_ke')?></label>
                                            <input type="text" name="hm_luy_ke" id="hm_luy_ke" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
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

