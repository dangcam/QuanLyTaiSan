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
                                            <option>Tiếp nhận</option>
                                            <option>Mua sắm</option>
                                            <option>Kiểm kê phát hiện thừa</option>
                                            <option>Khác</option>
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
                                    </div>
                                    <div class="form-row" id="div_thong_so_ky_thuat">
                                        <div class="form-group col-md-12">
                                            <label><?=lang('TaiSanLang.thong_so_ky_thuat')?></label>
                                            <textarea class="form-control" rows="3" id="thong_so_ky_thuat" name="thong_so_ky_thuat" style="height: 56px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6><?=lang('TaiSanLang.nguyen_gia')?> <span class="text-danger">*</span></h6>
                                    <div id="tab_nguon_hinh_thanh">
                                    </div>
                                </div>
                                <div class="form-row font-weight-bold">
                                    <div class="form-group col-md-5"><label><?=lang('TaiSanLang.tong_nguyen_gia')?> </label></div>
                                    <div class="form-group col-md-7"><label id ="tong_nguyen_gia"></label></div>
                                </div>
                                <div class="form-group">
                                    <h6><?=lang('TaiSanLang.hien_trang_su_dung')?> <span class="text-danger">*</span></h6>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" id="quan_ly_nha_nuoc" name="quan_ly_nha_nuoc"
                                                       class="form-check-input" value="1" ><?=lang('TaiSanLang.quan_ly_nha_nuoc')?>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline disabled">
                                            <label class="form-check-label">
                                                <input type="checkbox" id="hdsn_kkd" name="hdsn_kkd"
                                                       class="form-check-input" value="1" readonly><?=lang('TaiSanLang.hdsn_kkd')?>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" id="hdsn_kd" name="hdsn_kd"
                                                       class="form-check-input" value="1" readonly><?=lang('TaiSanLang.hdsn_kd')?>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" id="hdsn_ldlk" name="hdsn_ldlk"
                                                       class="form-check-input" value="1" readonly><?=lang('TaiSanLang.hdsn_ldlk')?>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" id="hdsn_ct" name="hdsn_ct"
                                                       class="form-check-input" value="1" readonly><?=lang('TaiSanLang.hdsn_ct')?>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" id="su_dung_khac" name="su_dung_khac"
                                                       class="form-check-input" value="1" ><?=lang('TaiSanLang.su_dung_khac')?>
                                            </label>
                                        </div>
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
            " <div class=\"form-group col-md-3\">\n" +
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
                //async: false,
                data: {ma_tai_san:ma_tai_san},
                success: function (data) {
                    if(data !== null && Array.isArray(data) && data.length > 0) {
                        console.log(data);
                        $("#nhom_tai_san").val(data[0]["nhom_tai_san"]);
                        $("#nhom_tai_san").trigger("change");
                        
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

                        if(data[0]["quan_ly_nha_nuoc"] == 1)
                            $('#quan_ly_nha_nuoc').prop("checked", true);
                        else $('#quan_ly_nha_nuoc').prop("checked", false);
                        if(data[0]["hdsn_kkd"] == 1)
                            $('#hdsn_kkd').prop("checked", true);
                        else $('#hdsn_kkd').prop("checked", false);
                        if(data[0]["hdsn_kd"] == 1)
                            $('#hdsn_kd').prop("checked", true);
                        else $('#hdsn_kd').prop("checked", false);
                        if(data[0]["hdsn_ldlk"] == 1)
                            $('#hdsn_ldlk').prop("checked", true);
                        else $('#hdsn_ldlk').prop("checked", false);
                        if(data[0]["hdsn_ct"] == 1)
                            $('#hdsn_ct').prop("checked", true);
                        else $('#hdsn_ct').prop("checked", false);
                        if(data[0]["su_dung_khac"] == 1)
                            $('#su_dung_khac').prop("checked", true);
                        else $('#su_dung_khac').prop("checked", false);


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
        $('#div_thong_so_ky_thuat').show();

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

                $('#div_dia_chi').show();
                $("#loai_tai_san_ke_khai").val(1);
                $('#div_thong_so_ky_thuat').hide();
                break;
            case '2':
                $('#div_dia_chi').show();
                $("#loai_tai_san_ke_khai").val(2);
                $('#div_thong_so_ky_thuat').hide();
                break;
            case '3':
                $("#loai_tai_san_ke_khai").val(4);
                $('#div_thong_so_ky_thuat').hide();
                break;
            case '4':
                $("#loai_tai_san_ke_khai").val(3);
                break;
            case '5':
                $("#loai_tai_san_ke_khai").val(4);
                break;
            default:
                $("#loai_tai_san_ke_khai").val(5);
                break;

        }
    }
</script>

