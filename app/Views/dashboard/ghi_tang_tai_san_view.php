<style>
    #response_danger_modal{display: none}


    .modal-dialog-full {
        max-width: 100%;
        margin: 10px;
    }


</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_title_ghi_tang')?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!---->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?=lang('AppLang.page_title_ghi_tang')?></h4>
                        <div class="col-lg-2">
                            <select class="form-control" id="nam_ghi_tang" name="nam_ghi_tang">
                                <?php
                                $nowYear =2022;
                                foreach (range(date('Y'), $nowYear) as $i) {
                                    echo "<option value=$i>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <a href="#" type="button" class="btn btn-rounded btn-info" data-toggle="modal" data-target="#myModal_Full" data-whatever="add">
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
                                    <th scope="col"><?=lang('GhiTangTaiSanLang.ma_chung_tu')?></th>
                                    <th scope="col"><?=lang('GhiTangTaiSanLang.ngay_chung_tu')?></th>
                                    <th scope="col"><?=lang('GhiTangTaiSanLang.ngay_ghi_tang')?></th>
                                    <th scope="col"><?=lang('GhiTangTaiSanLang.tong_nguyen_gia')?></th>
                                    <th scope="col"><?=lang('GhiTangTaiSanLang.ghi_chu')?></th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><?=lang('GhiTangTaiSanLang.ma_chung_tu')?></th>
                                    <th><?=lang('GhiTangTaiSanLang.ngay_chung_tu')?></th>
                                    <th><?=lang('GhiTangTaiSanLang.ngay_ghi_tang')?></th>
                                    <th><?=lang('GhiTangTaiSanLang.tong_nguyen_gia')?></th>
                                    <th><?=lang('GhiTangTaiSanLang.ghi_chu')?></th>
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
    </div>
</div>

<!--<script src="vendor/jquery/jquery.min.js"></script>-->

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

<div class="modal fade" id="myModal_Full" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-full"  role="document">
        <div class="modal-content">
            <div class="alert alert-danger" role="alert" id="response_danger_modal">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-header">
                <h5 class="modal-title"  id="myModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form method="post" id="form_id">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                    <h6 class="card-title"><?=lang('TaiSanLang.thong_tin_chung')?></h6>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><?=lang('GhiTangTaiSanLang.ma_chung_tu')?></label>
                            <input type="text" name="ma_chung_tu" id="ma_chung_tu" class="form-control" placeholder="<?=lang('GhiTangTaiSanLang.ma_chung_tu')?>" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label><?=lang('GhiTangTaiSanLang.ngay_chung_tu')?></label>
                            <input type="date" name="ngay_chung_tu" id="ngay_chung_tu" class="form-control" placeholder="<?=lang('GhiTangTaiSanLang.ngay_chung_tu')?>" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label><?=lang('GhiTangTaiSanLang.ngay_ghi_tang')?></label>
                            <input type="date" name="ngay_ghi_tang" id="ngay_ghi_tang" class="form-control" placeholder="<?=lang('GhiTangTaiSanLang.ngay_ghi_tang')?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label><?=lang('GhiTangTaiSanLang.ghi_chu')?></label>
                            <input type="text" name="ghi_chu" id="ghi_chu" class="form-control" placeholder="<?=lang('GhiTangTaiSanLang.ghi_chu')?>" >
                        </div>
                        <div class="form-group col-md-2">
                            <label><?=lang('GhiTangTaiSanLang.tong_nguyen_gia')?></label>
                            <input type="text" name="tong_nguyen_gia" id="tong_nguyen_gia" class="form-control" disabled >
                        </div>
                    </div>
                        </div>
                    <div class="card-header">
                        <h4 class="card-title"><?=lang('AppLang.page_title_ghi_tang')?></h4>
                        <a href="#" type="button" class="btn btn-rounded btn-info" data-toggle="modal" data-target="#myModal" data-whatever="add">
                            <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                    </span><?=lang('GhiTangTaiSanLang.chon_tai_san')?></a>
                    </div>
                        <div class="table-responsive">
                            <table id="data-table-taisan" class="table table-bordered table-striped verticle-middle table-responsive-sm" style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col"><?=lang('TaiSanLang.ma_tai_san')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.ten_tai_san')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.bo_phan_su_dung')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.gia_tri')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.hm_luy_ke')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.gia_tri_con_lai')?></th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody id ="lits_tai_san">
                                </tbody>
                            </table>
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" role="alert" id="response_danger_modal">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Group</h5>
                <button type="button" id="close_modal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label"><?=lang('NhaCCLang.ma_ncc')?></label>
                        <input type="text" name="ma_ncc" class="form-control" id="ma_ncc" required placeholder="<?=lang('NhaCCLang.ma_ncc')?>">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><?=lang('NhaCCLang.ten_ncc')?></label>
                        <input type="text" name="ten_ncc" class="form-control" id="ten_ncc" required placeholder="<?=lang('NhaCCLang.ten_ncc')?>">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><?=lang('NhaCCLang.dia_chi')?></label>
                        <input type="text" name="dia_chi" class="form-control" id="dia_chi" required placeholder="<?=lang('NhaCCLang.dia_chi')?>">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><?=lang('NhaCCLang.ncc_status')?></label>
                        <select id="ncc_status" class="form-control"name ="ncc_status">
                            <option value="1"><?=lang('AppLang.active')?></option>
                            <option value="2"><?=lang('AppLang.inactive')?></option>
                        </select>
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
<!---->

<script>
    jQuery(document).ready(function($) {
        var ajaxDataTable = $('#data-table').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('AppLang.all') ?>"]],
            'searching': true, // Remove default Search Control
            'ajax': {
                'url': '<?=base_url()?>dashboard/ghitangtaisan/ghitang_ajax',
                'data': function (data) {
                    data.searchYear = $('#nam_ghi_tang').val();
                },
            },
            'columns': [
                {data: 'ma_chung_tu'},
                {data: 'ngay_chung_tu'},
                {data: 'ngay_ghi_tang'},
                {data: 'tong_nguyen_gia'},
                {data: 'ghi_chu'},
                {data: 'active'}
            ],

        });
        $('#nam_ghi_tang').change(function(){
            ajaxDataTable.draw();
        });
        $('#myModal_Full').on('show.bs.modal', function (event) {
            $("#response_danger_modal").hide('fast');
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            var ma_chung_tu = button.data('ma_chung_tu');
            var ngay_ghi_tang = button.data('ngay_ghi_tang');
            var tong_nguyen_gia = button.data('tong_nguyen_gia');
            var ghi_chu = button.data('ghi_chu');
            var field = document.getElementById("add_edit");
            field.setAttribute("name",recipient);
            $('#ma_chung_tu').val(ma_chung_tu);
            $('#ngay_chung_tu').val(ngay_chung_tu);
            $('#ngay_ghi_tang').val(ngay_ghi_tang);
            $('#tong_nguyen_gia').val(tong_nguyen_gia);
            $('#ghi_chu').val(ghi_chu);
            if(recipient=="add"){
                $('#myModalLabel').text("<?=lang('GhiTangTaiSanLang.add_ghitang')?>");
                $('#ma_chung_tu').prop("readonly",false);
                const currentDate = new Date();
                currentDate.setFullYear($('#nam_ghi_tang').val());
                // Format the date as "yyyy-MM-dd"
                const formattedDate = currentDate.toISOString().slice(0, 10);
                $('#ngay_chung_tu').val(formattedDate);
                $('#ngay_ghi_tang').val(formattedDate);
            }else {
                $('#myModalLabel').text("<?=lang('GhiTangTaiSanLang.edit_ghitang')?>");
                $('#ma_chung_tu').prop("readonly",true);
                $.ajax({
                    url: "<?= base_url() ?>dashboard/report_group/data_report_group",
                    method: "POST",
                    dataType: "json",
                    data: {report_month: $('#report_month').val() },
                    success: function (data) {
                        $("#list_tai_san").html(data);
                    },
                    error: function (data) {
                        $("#list_tai_san").html(data);
                    }
                });
            }
        });
        // Delete
        $('#smallModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('ma_cv') // Extract info from data-* attributes
            $("#modal-btn-yes").on("click", function(event){
                $("#smallModal").modal('hide');
                event.preventDefault();
                $("#response_success").hide('fast');
                $("#response_danger").hide('fast');
                $.ajax({
                    url: '<?= base_url() ?>dashboard/position/delete_position',
                    type: 'POST',
                    data: { ma_cv:recipient },
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
            $.ajax({
                url: "<?= base_url() ?>dashboard/position/"+name+"_position",
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
    });
</script>

