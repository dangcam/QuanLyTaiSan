<div class="content-body">
    <div class="container-fluid">
        <form method="post" id="form_id">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                            <h4><?=lang('TaiSanLang.add_taisan')?></h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0">
                    <div class="form-group row">
                        <input value="" name="trang_thai" id="trang_thai" hidden>
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
                                        <input type="text" name="loai_tai_san" id="loai_tai_san" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><?=lang('TaiSanLang.ma_tai_san')?> <span class="text-danger">*</span></label>
                                        <input type="text" name="ma_tai_san" id="ma_tai_san" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><?=lang('TaiSanLang.ten_tai_san')?> <span class="text-danger">*</span></label>
                                        <input type="text" name="ten_tai_san" id="ten_tai_san" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><?=lang('TaiSanLang.ly_do_tang')?> <span class="text-danger">*</span></label>
                                        <select id="ly_do_tang" name="ly_do_tang" class="form-control">
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
                                        <input type="text" name="so_luong" id="so_luong" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?=lang('TaiSanLang.don_vi_tinh')?> <span class="text-danger">*</span></label>
                                        <select id="don_vi_tinh" name="don_vi_tinh" class="form-control">
                                            <option>Mảnh</option>
                                            <option>Cái</option>
                                            <option>Chiếc</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><?=lang('TaiSanLang.bo_phan_su_dung')?> <span class="text-danger">*</span></label>
                                        <select class="form-control" id="bo_phan_su_dung" name="bo_phan_su_dung">
                                            <?php if (isset($list_bo_phan_su_dung) && count($list_bo_phan_su_dung)) :
                                                foreach ($list_bo_phan_su_dung as $key => $item) : ?>
                                                    <option value="<?=$item->ma_bp?>"><?=$item->ten_bp?></option>
                                                <?php
                                                endforeach;
                                            endif ?>
                                        </select>
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
                                                       class="form-check-input" value="" ><?=lang('TaiSanLang.quan_ly_nha_nuoc')?>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline disabled">
                                            <label class="form-check-label">
                                                <input type="checkbox" id="hdsn_kkd" name="hdsn_kkd"
                                                       class="form-check-input" value="" disabled><?=lang('TaiSanLang.hdsn_kkd')?>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" id="hdsn_kd" name="hdsn_kd"
                                                       class="form-check-input" value="" disabled><?=lang('TaiSanLang.hdsn_kd')?>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" id="hdsn_ldlk" name="hdsn_ldlk"
                                                       class="form-check-input" value="" disabled><?=lang('TaiSanLang.hdsn_ldlk')?>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" id="hdsn_ct" name="hdsn_ct"
                                                       class="form-check-input" value="" disabled><?=lang('TaiSanLang.hdsn_ct')?>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" id="su_dung_khac" name="su_dung_khac"
                                                       class="form-check-input" value="" ><?=lang('TaiSanLang.su_dung_khac')?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="add_edit" name="add_tai_san" class="btn btn-primary "><?=lang('AppLang.save')?></button>
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
                                            <label><?=lang('TaiSanLang.ngay_mua')?> <span class="text-danger">*</span></label>
                                            <input type="date" name="ngay_mua" id="ngay_mua" class="form-control" placeholder=""  >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ngay_bd_su_dung')?> <span class="text-danger">*</span></label>
                                            <input type="date" name="ngay_bd_su_dung" id="ngay_bd_su_dung" class="form-control"  placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ngay_ghi_tang')?> <span class="text-danger">*</span></label>
                                            <input type="date" name="ngay_ghi_tang" id="ngay_ghi_tang" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label><?=lang('TaiSanLang.nam_theo_doi')?></label>
                                            <input type="text" name="nam_theo_doi" id="nam_theo_doi" readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ngay_bd_tinh_hm')?> <span class="text-danger">*</span></label>
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
<script type="text/javascript">
    $('#form_id').on('submit', function (event) {
        event.preventDefault();
        $("#response_success").hide('fast');
        $("#response_danger").hide('fast');
        $("#response_danger_modal").hide('fast');
        var name = $("#add_edit").attr("name");
        var formData = $(this).serialize();
        $.ajax({
            url: "<?= base_url() ?>dashboard/dm_ts/"+name+"_dm",
            method: "POST",
            data: formData,
            dataType: "json",
            success: function (data) {
                if (data[0]==0) {
                    $("#response_success").show('fast');
                    $("#response_success").html(data[1]);
                    $('#myModal').modal('toggle');
                    ajaxDataTable.ajax.reload();
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
            "   <select class=\"custom-select\" id=\"\" name=\"data["+stt+"][ma_kp]\" value=\""+data[0]+"\">\n";

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
            //console.log(`Trường nhập ${inputId}: Giá trị ban đầu = ${giaTri}`);
        });
        set_Listener_input_gia_tri();
    };
    function remove_row_nguon_hinh_thanh(id) {
        $("#"+id).remove();
        html_nguon_hinh_thanh = $("#tab_nguon_hinh_thanh").html();
        calculateSum();
    };
    add_row_nguon_hinh_thanh(['0','0']);
    // Hàm tính tổng và hiển thị kết quả
    function calculateSum() {
        let sum = 0;
        const giaTriElements = document.querySelectorAll('input[id^="nguon_hinh_thanh_gia_tri"]');
        giaTriElements.forEach((element) => {
            const match = element.id.match(/\d+/);
            if (match) {
                console.log(parseInt(match[0]);
                sum += parseFloat(element.value || 0); // Nếu giá trị rỗng hoặc không hợp lệ, coi như là 0
            }
        });
        alert(`Tổng giá trị là: ${sum}`);
    }
    function set_Listener_input_gia_tri() {
        // Lắng nghe sự kiện "input" của các trường nhập
        const giaTriInputs = document.querySelectorAll('input[id^="nguon_hinh_thanh_gia_tri"]');
        giaTriInputs.forEach((input) => {
            input.addEventListener("input", calculateSum);
        });
    }


</script>

