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
                        <div class="form-group col-md-5">
                            <label>Email</label>
                            <input type="text" name="ghi_chu" id="ghi_chu" class="form-control" placeholder="<?=lang('GhiTangTaiSanLang.ghi_chu')?>" >
                        </div>
                    </div>
                        </div>
                    <div class="card-header">
                        <h4 class="card-title"><?=lang('AppLang.page_title_ghi_tang')?></h4>
                        <a href="#" type="button" class="btn btn-rounded btn-info" data-toggle="modal" data-target="#myModal_Full" data-whatever="add">
                            <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                    </span><?=lang('GhiTangTaiSanLang.chon_tai_san')?></a>
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

        $('#myModal').on('show.bs.modal', function (event) {
            $("#response_danger_modal").hide('fast');
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            var ma_cv = button.data('ma_cv');
            var ten_cv = button.data('ten_cv');
            var ghi_chu = button.data('ghi_chu');
            var field = document.getElementById("add_edit");
            field.setAttribute("name",recipient);
            $('#ma_cv').val(ma_cv);
            $('#ten_cv').val(ten_cv);
            $('#ghi_chu').val(ghi_chu);
            if(recipient=="add"){
                $('#myModalLabel').text("<?=lang('GhiTangTaiSanLang.add_cv')?>");
                $('#ma_cv').prop("readonly",false);
            }else {
                $('#myModalLabel').text("<?=lang('GhiTangTaiSanLang.edit_cv')?>");
                $('#ma_cv').prop("readonly",true);
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

