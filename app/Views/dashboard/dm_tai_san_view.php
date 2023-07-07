<style>
    #response_danger_modal{display: none}
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_title_property_norms')?></h4>
                </div>
            </div>
        </div>
        <!------------------>
        <div class="row">
            <div class="col-lg-12">
                <!---->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?=lang('AppLang.page_title_property_norms')?></h4>
                        <a href="#" type="button" class="btn btn-rounded btn-info" data-toggle="modal" data-target="#myModal" data-whatever="add">
                            <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                    </span>Add</a>
                    </div>
                    <div class="card-body">
                        <!---->
                        <div class="alert alert-success alert-alt"role="alert" id="response_success"></div>
                        <div class="alert alert-info alert-alt"role="alert" id="response_info"></div>
                        <div class="alert alert-warning alert-alt "role="alert" id="response_warning"></div>
                        <div class="alert alert-danger alert-alt" role="alert" id="response_danger"></div>
                        <!---->
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered table-striped verticle-middle table-responsive-sm" style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col"><?=lang('DMTaiSanLang.ma_dm')?></th>
                                    <th scope="col"><?=lang('DMTaiSanLang.ten_dm')?></th>
                                    <th scope="col"><?=lang('DMTaiSanLang.thuoc_loai')?></th>
                                    <th scope="col"><?=lang('DMTaiSanLang.don_vi')?></th>
                                    <th scope="col"><?=lang('DMTaiSanLang.dinh_muc')?></th>
                                    <th scope="col"><?=lang('DMTaiSanLang.su_dung')?></th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><?=lang('DMTaiSanLang.ma_dm')?></th>
                                    <th><?=lang('DMTaiSanLang.ten_dm')?></th>
                                    <th><?=lang('DMTaiSanLang.thuoc_loai')?></th>
                                    <th><?=lang('DMTaiSanLang.don_vi')?></th>
                                    <th><?=lang('DMTaiSanLang.dinh_muc')?></th>
                                    <th><?=lang('DMTaiSanLang.su_dung')?></th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!---->
            </div>
        </div>
        <!------------------>
    </div>
</div>

<div class="modal fade myModal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="alert alert-danger" role="alert" id="response_danger_modal">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Group</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form method="post" id="form_id">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><?=lang('DMTaiSanLang.ma_dm')?></label>
                            <input type="text" id="ma_dm" name="ma_dm"
                                   class="form-control" placeholder="<?=lang('DMTaiSanLang.ma_dm')?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label><?=lang('DMTaiSanLang.ten_dm')?></label>
                            <input type="text" id="ten_dm" name="ten_dm"
                                   class="form-control" placeholder="<?=lang('DMTaiSanLang.ten_dm')?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label><?=lang('DMTaiSanLang.thuoc_loai')?></label>
                            <select class="custom-select" id="thuoc_loai" name="thuoc_loai">
                                <?php if (isset($list_dm_tai_san) && count($list_dm_tai_san)) :
                                    foreach ($list_dm_tai_san as $key => $item) : ?>
                                        <option value="<?=$item->ma_dm?>"><?=$item->ten_dm?></option>
                                    <?php
                                    endforeach;
                                endif ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label><?=lang('DMTaiSanLang.don_vi')?></label>
                            <select class="custom-select" id="don_vi" name="don_vi">
                                <option value="Cái">Cái</option>
                                <option value="Bộ">Bộ</option>
                                <option value="Chiếc">Chiếc</option>
                                <option value="Kg">Kg</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><?=lang('DMTaiSanLang.dinh_muc')?></label>
                            <select class="custom-select" id="dinh_muc" name="dinh_muc">
                                <option value="1"><?=lang('DMTaiSanLang.shared')?></option>
                                <option value="2"><?=lang('DMTaiSanLang.department')?></option>
                                <option value="3"><?=lang('DMTaiSanLang.position')?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row" id="tab_dinh_muc">

                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" id="su_dung" name="su_dung" type="checkbox">
                            <label class="form-check-label">
                                <label><?=lang('DMTaiSanLang.su_dung')?></label>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=lang('AppLang.close')?></button>
                    <input id="add_edit" type="submit" class="btn btn-primary" name="" value="<?=lang('AppLang.save')?>">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallModalLabel"><?=lang('AppLang.notify')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?=lang('AppLang.are_you_sure')?>
            </div>
            <div class="modal-footer">
                <button type="button" id="modal-btn-no" class="btn btn-white" data-dismiss="modal"><?=lang('AppLang.no')?></button>
                <button type="button" id="modal-btn-yes" class="btn btn-primary"><?=lang('AppLang.yes')?></button>
            </div>
        </div>
    </div>
</div>
<!---->

<script src="vendor/jqueryui/js/jquery-ui.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/moment/moment.min.js"></script>


<script src="vendor/bootstrap-tree/js/bootstrap-treeview.js"></script>
<link href="vendor/bootstrap-tree/css/bootstrap-treeview.css" rel="stylesheet">

<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<link href="vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="js/plugins-init/datatables.init.js"></script>


<!---->
<script>
    jQuery(document).ready(function($) {
        let html_dung_chung =
            "<div class=\"form-group col-md-6\">\n" +
            "   <label><?=lang('DMTaiSanLang.ma_dm')?></label>\n" +
            "       <input type=\"text\" id=\"\" name=\"data[dinh_muc]\"\n" +
            "           class=\"form-control\" placeholder=\"<?=lang('DMTaiSanLang.dinh_muc')?>\">\n" +
            "</div>\n" +
            "<div class=\"form-group col-md-6\">\n" +
            "   <label><?=lang('DMTaiSanLang.don_gia')?></label>\n" +
            "       <input type=\"text\" id=\"\" name=\"data[don_gia]\"\n" +
            "           class=\"form-control\" placeholder=\"<?=lang('DMTaiSanLang.don_gia')?>\">\n" +
            "</div>";
        let list_bo_phan = "";
        <?php if (isset($list_bo_phan) && count($list_bo_phan)) :
                foreach ($list_bo_phan as $key => $item) : ?>
            list_bo_phan +="<option value=\"<?=$item->ma_bp?>\"><?=$item->ten_bp?></option>\n";
        <?php
                endforeach;
            endif ?>

         let list_chuc_vu = "";
        <?php if (isset($list_chuc_vu) && count($list_chuc_vu)) :
            foreach ($list_chuc_vu as $key => $item) : ?>
                list_chuc_vu +="<option value=\"<?=$item->ma_cv?>\"><?=$item->ten_cv?></option>\n";
        <?php
                endforeach;
            endif ?>
        let html_bo_phan =
            " <div class=\"form-group col-md-3\">\n" +
            "   <label><?=lang('DMTaiSanLang.bo_phan')?></label>\n" +
            "   <select class=\"custom-select\" id=\"\" name=\"data[ma_dm]\">\n" +
                  list_bo_phan +
            "   </select>\n" +
            "</div>"+
            "<div class=\"form-group col-md-3\">\n" +
            "   <label><?=lang('DMTaiSanLang.ma_dm')?></label>\n" +
            "       <input type=\"text\" id=\"\" name=\"data[dinh_muc]\"\n" +
            "           class=\"form-control\" placeholder=\"<?=lang('DMTaiSanLang.dinh_muc')?>\">\n" +
            "</div>\n" +
            "<div class=\"form-group col-md-3\">\n" +
            "   <label><?=lang('DMTaiSanLang.ten_dm')?></label>\n" +
            "       <input type=\"text\" id=\"\" name=\"data[don_gia]\"\n" +
            "           class=\"form-control\" placeholder=\"<?=lang('DMTaiSanLang.don_gia')?>\">\n" +
            "</div>";
        let html_chuc_vu =
            " <div class=\"form-group col-md-3\">\n" +
            "   <label><?=lang('DMTaiSanLang.chuc_vu')?></label>\n" +
            "   <select class=\"custom-select\" id=\"\" name=\"data[ma_dm]\">\n" +
                list_chuc_vu +
            "   </select>\n" +
            "</div>"+
            "<div class=\"form-group col-md-3\">\n" +
            "   <label><?=lang('DMTaiSanLang.ma_dm')?></label>\n" +
            "       <input type=\"text\" id=\"\" name=\"data[dinh_muc]\"\n" +
            "           class=\"form-control\" placeholder=\"<?=lang('DMTaiSanLang.dinh_muc')?>\">\n" +
            "</div>\n" +
            "<div class=\"form-group col-md-3\">\n" +
            "   <label><?=lang('DMTaiSanLang.ten_dm')?></label>\n" +
            "       <input type=\"text\" id=\"\" name=\"data[don_gia]\"\n" +
            "           class=\"form-control\" placeholder=\"<?=lang('DMTaiSanLang.don_gia')?>\">\n" +
            "</div>";
        var ajaxDataTable = $('#data-table').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('AppLang.all') ?>"]],
            'searching': true, // Remove default Search Control
            'ajax': {
                'url': '<?=base_url()?>dashboard/dm_ts/dm_ajax',
                'data': function (data) {
                }
            },
            'columns': [
                {data: 'ma_dm'},
                {data: 'ten_dm'},
                {data: 'thuoc_loai'},
                {data: 'don_vi'},
                {data: 'dinh_muc'},              
                {data: 'su_dung'},
                {data: 'active'}
            ]
        });

        $('#myModal').on('show.bs.modal', function (event) {
            $("#response_danger_modal").hide('fast');
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            var ma_dm = button.data('ma_dm');
            var ten_dm = button.data('ten_dm');
            var thuoc_loai = button.data('thuoc_loai');
            var don_vi = button.data('don_vi');
            var dinh_muc = button.data('dinh_muc');           
            var su_dung = button.data('su_dung');

            var field = document.getElementById("add_edit");
            field.setAttribute("name",recipient);
            $('#ma_dm').val(ma_dm);
            $('#ten_dm').val(ten_dm);
            $('#thuoc_loai').val(thuoc_loai);
            $('#don_vi').val(don_vi);
            $('#dinh_muc').val(dinh_muc);           
            if(su_dung == 1)
                $('#su_dung').prop("checked", true);
            else $('#su_dung').prop("checked", false);

            if(recipient=="add"){
                $('#myModalLabel').text("<?=lang('DMTaiSanLang.add_dm')?>");
                $('#ma_dm').prop("readonly",false);
            }else {
                $('#myModalLabel').text("<?=lang('DMTaiSanLang.edit_dm')?>");
                $('#ma_dm').prop("readonly",true);
            }
            if(dinh_muc == 1){

            }else if(dinh_muc == 2){

            }else {

            }
        });
        // Delete
        $('#smallModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('ma_dm') // Extract info from data-* attributes
            $("#modal-btn-yes").on("click", function(event){
                $("#smallModal").modal('hide');
                event.preventDefault();
                $("#response_success").hide('fast');
                $("#response_danger").hide('fast');
                $.ajax({
                    url: '<?= base_url() ?>dashboard/dm_ts/delete_dm',
                    type: 'POST',
                    data: { ma_dm:recipient },
                    dataType:"json",
                    success:function (data) {
                        if(data[0]==0){
                            $("#response_success").show('fast');
                            $("#response_success").html(data[1]);
                            ajaxDataTable.ajax.reload();
                        }else {
                            $("#response_danger").show('fast');
                            $("#response_danger").html(data[1]);
                        }
                    },
                    error:function (data) {
                        $("#response_danger").show('fast');
                        $("#response_danger").html(data);
                    }
                });
            });
        });
        $('#form_id').on('submit', function (event) {
            event.preventDefault();
            $("#response_success").hide('fast');
            $("#response_danger").hide('fast');
            $("#response_danger_modal").hide('fast');
            var name = $("#add_edit").attr("name");
            var formData = $(this).serialize();
            console.log(formData);
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
        $('#dinh_muc').change(function(){
            if(this.value == 1){
                // dùng chung
                $("#tab_dinh_muc").html(html_dung_chung);
            }else
                if(this.value == 2){
                    // phòng ban
                    $("#tab_dinh_muc").html(html_bo_phan);
            }else {
                    // chức vụ
                    $("#tab_dinh_muc").html(html_chuc_vu);
                };
        });
    });
</script>