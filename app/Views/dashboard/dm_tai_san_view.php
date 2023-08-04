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
                    <div id="tab_dinh_muc">

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
<div class="modal fade" id="smallModal_DinhMuc" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
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
                <button type="button" id="modal-btn-no_dm" class="btn btn-white" data-dismiss="modal"><?=lang('AppLang.no')?></button>
                <button type="button" id="modal-btn-yes_dm" class="btn btn-primary"><?=lang('AppLang.yes')?></button>
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
<script src="vendor/jquery-steps/build/jquery.steps.min.js"></script>


<!---->

<script type="text/javascript">
    let html_dung_chung ="";
    let html_bo_phan = "";
    let html_chuc_vu = "";
    let stt_bo_phan = 1;
    let stt_chuc_vu = 1;
    function create_dung_chung(stt=1,data = ['0','0','0']){
        html_dung_chung =
            "<div class=\"form-row\" id=\"\">" +
            "   <div class=\"form-group col-md-6\">\n" +
            "       <input name=\"data["+stt+"][ma_dm]\" value=\"dung_chung\" type=\"hidden\">" +
            "       <label><?=lang('DMTaiSanLang.dinh_muc')?></label>\n" +
            "           <input type=\"text\" name=\"data["+stt+"][dinh_muc]\" value=\""+data[1]+"\"\n" +
            "               class=\"form-control\" placeholder=\"<?=lang('DMTaiSanLang.dinh_muc')?>\">\n" +
            "   </div>\n" +
            "   <div class=\"form-group col-md-6\">\n" +
            "       <label><?=lang('DMTaiSanLang.don_gia')?></label>\n" +
            "           <input type=\"text\" name=\"data["+stt+"][don_gia]\" value=\""+data[2]+"\"\n" +
            "               class=\"form-control\" placeholder=\"<?=lang('DMTaiSanLang.don_gia')?>\">\n" +
            "   </div>" +
            "</div>";
    };
    function create_bo_phan(stt=1,data = ['0','0','0']){
        html_bo_phan +=
            "<div class=\"form-row\" id=\""+stt+"_bo_phan\">" +
            " <div class=\"form-group col-md-3\">\n" +
            "   <label><?=lang('DMTaiSanLang.bo_phan')?></label>\n" +
            "   <select class=\"custom-select\" id=\"\" name=\"data["+stt+"][ma_dm]\" value=\""+data[0]+"\">\n";

        <?php if (isset($list_bo_phan) && count($list_bo_phan)) :
                foreach ($list_bo_phan as $key => $item) : ?>
                    html_bo_phan +="<option value=\"<?=$item->ma_bp?>\" "+("<?=$item->ma_bp?>"==data[0]? "selected":"")+ " ><?=$item->ten_bp?></option>\n";
        <?php
                endforeach;
            endif ?>
        html_bo_phan +=
            "   </select>\n" +
            "</div>"+
            "<div class=\"form-group col-md-3\">\n" +
            "   <label><?=lang('DMTaiSanLang.dinh_muc')?></label>\n" +
            "       <input type=\"text\" id=\"\" name=\"data["+stt+"][dinh_muc]\" value=\""+data[1]+"\" \n" +
            "           class=\"form-control\" placeholder=\"<?=lang('DMTaiSanLang.dinh_muc')?>\">\n" +
            "</div>\n" +
            "<div class=\"form-group col-md-3\">\n" +
            "   <label><?=lang('DMTaiSanLang.don_gia')?></label>\n" +
            "       <input type=\"text\" id=\"\" name=\"data["+stt+"][don_gia]\" value=\""+data[2]+"\" \n" +
            "           class=\"form-control\" placeholder=\"<?=lang('DMTaiSanLang.don_gia')?>\">\n" +
            "</div>\n" +
            "<div class =\"form-group \">\n" +
            "   <label>Action</label>\n" +
            "   <div class=\"form-control\">" +
            "           <a href=\"javascript:void(add_row_bo_phan())\" class=\"mr-4\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Add\">" +
            "           <i class=\"fa fa-plus color-muted\"></i> </a>";
        if(stt>1) {
            html_bo_phan +=
                "          <a href=\"#\" data-toggle=\"modal\" data-target=\"#smallModal_DinhMuc\"\n" +
                "             data-placement=\"top\" title=\"<?=lang('AppLang.delete')?>\" data-id_row_dinh_muc=\""+stt+"_bo_phan\">\n" +
                "           <i class=\"fa fa-close color-danger\"></i></a>\n"
        }
        html_bo_phan +=
            "   </div>\n" +
            "</div>" +
            "</div>";
    };
    function create_chuc_vu(stt=1,data = ['0','0','0']){
        html_chuc_vu +=
            "<div class=\"form-row\" id=\""+stt+"_chuc_vu\">" +
            "<div class=\"form-group col-md-3\">\n" +
            "   <label><?=lang('DMTaiSanLang.chuc_vu')?></label>\n" +
            "   <select class=\"custom-select\" id=\"\" name=\"data["+stt+"][ma_dm]\" value=\""+data[0]+"\">\n";
        <?php if (isset($list_chuc_vu) && count($list_chuc_vu)) :
                foreach ($list_chuc_vu as $key => $item) : ?>
        html_chuc_vu +="<option value=\"<?=$item->ma_cv?>\" "+("<?=$item->ma_cv?>"==data[0]? "selected":"")+ " ><?=$item->ten_cv?></option>\n";
        <?php
                endforeach;
            endif ?>
         html_chuc_vu +=
            "   </select>\n" +
            "</div>"+
            "<div class=\"form-group col-md-3\">\n" +
            "   <label><?=lang('DMTaiSanLang.dinh_muc')?></label>\n" +
            "       <input type=\"text\" id=\"\" name=\"data["+stt+"][dinh_muc]\" value=\""+data[0]+"\" \n" +
            "           class=\"form-control\" placeholder=\"<?=lang('DMTaiSanLang.dinh_muc')?>\">\n" +
            "</div>\n" +
            "<div class=\"form-group col-md-3\">\n" +
            "   <label><?=lang('DMTaiSanLang.don_gia')?></label>\n" +
            "       <input type=\"text\" id=\"\" name=\"data["+stt+"][don_gia]\" value=\""+data[0]+"\" \n" +
            "           class=\"form-control\" placeholder=\"<?=lang('DMTaiSanLang.don_gia')?>\">\n" +
            "</div>\n" +
            "<div class =\"form-group\">\n" +
            "   <label>Action</label>\n" +
            "   <div class=\"form-control\">" +
            "       <a href=\"javascript:void(add_row_chuc_vu())\"  class=\"mr-4\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Add\">" +
            "           <i class=\"fa fa-plus color-muted\"></i> </a>";
        if(stt>1) {
            html_chuc_vu +=
                "          <a href=\"#\" data-toggle=\"modal\" data-target=\"#smallModal_DinhMuc\"\n" +
                "             data-placement=\"top\" title=\"<?=lang('AppLang.delete')?>\" data-id_row_dinh_muc=\""+stt+"_chuc_vu\">\n" +
                "           <i class=\"fa fa-close color-danger\"></i></a>\n"
        }
        html_chuc_vu +=
            "   </div>\n" +
            "</div>" +
            "</div>";
    };
    function add_row_chuc_vu() {
        stt_chuc_vu = stt_chuc_vu+1;
        create_chuc_vu(stt_chuc_vu,['0','0','0']);
        loadViewDinhMuc(3);
    };
    function add_row_bo_phan() {
        stt_bo_phan = stt_bo_phan+1;
        create_bo_phan(stt_bo_phan,['0','0','0']);
        loadViewDinhMuc(2);
    };
    function loadViewDinhMuc(loai_dm){
        if(loai_dm==1){
            // dùng chung
            $("#tab_dinh_muc").html(html_dung_chung);
        }else
        if(loai_dm==2){
            // phòng ban
            $("#tab_dinh_muc").html(html_bo_phan);
        }else
        if(loai_dm==3){
            // chức vụ
            $("#tab_dinh_muc").html(html_chuc_vu);
        }else{
            $("#tab_dinh_muc").html("");
        };
    };
    jQuery(document).ready(function($) {

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
            create_dung_chung();
            html_bo_phan = "";
            stt_bo_phan = 1;
            create_bo_phan();
            html_chuc_vu ="";
            stt_chuc_vu = 1;
            create_chuc_vu();
            if(recipient=="add"){
                //
                $('#myModalLabel').text("<?=lang('DMTaiSanLang.add_dm')?>");
                $('#ma_dm').prop("readonly",false);
            }else {
                $('#myModalLabel').text("<?=lang('DMTaiSanLang.edit_dm')?>");
                $('#ma_dm').prop("readonly",true);
                // lấy dữ liệu dinh_muc
                $.ajax({
                    url: "<?= base_url() ?>dashboard/dm_ts/list_dinh_muc",
                    method: "POST",
                    async: false,
                    dataType: "json",
                    data: {ma_dm_ts: ma_dm },
                    success: function (data) {
                        if(dinh_muc == 1){
                            data.forEach(async (dm)=>{
                                var row = [dm.ma_dm,dm.dinh_muc,dm.don_gia];
                                create_dung_chung(1,row );

                            });
                        } else
                        if(dinh_muc == 2){
                            html_bo_phan = "";
                            stt_bo_phan = 1;
                            data.forEach(async (dm)=>{
                                var row = [dm.ma_dm,dm.dinh_muc,dm.don_gia];
                                create_bo_phan(stt_bo_phan,row );
                                stt_bo_phan++;
                            });
                        }else{
                            html_chuc_vu ="";
                            stt_chuc_vu = 1;
                            data.forEach(async (dm)=>{
                                var row = [dm.ma_dm,dm.dinh_muc,dm.don_gia];
                                create_chuc_vu(stt_chuc_vu,row );
                                stt_chuc_vu++;
                            });
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
            loadViewDinhMuc(dinh_muc);
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
        $('#smallModal_DinhMuc').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('id_row_dinh_muc') // Extract info from data-* attributes
            $("#modal-btn-yes_dm").on("click", function(event){
                $("#smallModal_DinhMuc").modal('hide');
                event.preventDefault();
                $("#"+recipient).remove();
                var dinh_muc = $('#dinh_muc').val();
                if(dinh_muc == 2){
                    html_bo_phan = $("#tab_dinh_muc").html();
                }else if(dinh_muc == 3){
                    html_chuc_vu = $("#tab_dinh_muc").html();
                }

            });
        });
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

        $('#dinh_muc').change(function(){
           loadViewDinhMuc(this.value);
        });

    });
</script>