<style>
    #response_danger_modal{display: none}
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_title_type_road')?></h4>
                </div>
            </div>
        </div>
        <!------------------>
        <div class="row">
            <div class="col-lg-12">
                <!---->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?=lang('AppLang.page_title_type_asset')?></h4>
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
                                    <th scope="col"><?=lang('LoaiTaiSanLang.type_asset_id')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.type_asset_name')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.category')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.rate_of_wear')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.number_of_year')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.note')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.use')?></th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><?=lang('LoaiTaiSanLang.type_asset_id')?></th>
                                    <th><?=lang('LoaiTaiSanLang.type_asset_name')?></th>
                                    <th><?=lang('LoaiTaiSanLang.category')?></th>
                                    <th><?=lang('LoaiTaiSanLang.rate_of_wear')?></th>
                                    <th><?=lang('LoaiTaiSanLang.number_of_year')?></th>
                                    <th><?=lang('LoaiTaiSanLang.note')?></th>
                                    <th><?=lang('LoaiTaiSanLang.use')?></th>
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
                            <label><?=lang('LoaiTaiSanLang.type_asset_id')?></label>
                            <input type="text" id="ma_loai_ts" name="ma_loai_ts"
                                   class="form-control" placeholder="<?=lang('LoaiTaiSanLang.type_asset_id')?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label><?=lang('LoaiTaiSanLang.type_asset_name')?></label>
                            <input type="text" id="ten_loai_ts" name="ten_loai_ts"
                                   class="form-control" placeholder="<?=lang('LoaiTaiSanLang.type_asset_name')?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label><?=lang('LoaiTaiSanLang.category')?></label>
                            <select class="custom-select" id="thuoc_loai" name="thuoc_loai">
                                <?php if (isset($list_loai_tai_san) && count($list_loai_tai_san)) :
                                    foreach ($list_loai_tai_san as $key => $item) : ?>
                                        <option value="<?=$item->ma_loai_ts?>"><?=$item->ten_loai_ts?></option>
                                    <?php
                                    endforeach;
                                endif ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label><?=lang('LoaiTaiSanLang.rate_of_wear')?></label>
                            <input type="text" id="tyle_haomon" name="tyle_haomon" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label><?=lang('LoaiTaiSanLang.number_of_year')?></label>
                            <input type="text" id="sonam_sudung" name="sonam_sudung" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label><?=lang('LoaiTaiSanLang.note')?></label>
                            <input type="text" id="ghi_chu" name="ghi_chu" class="form-control" placeholder="<?=lang('LoaiTaiSanLang.note')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" id="su_dung" name="su_dung" type="checkbox">
                            <label class="form-check-label">
                                <label><?=lang('LoaiTaiSanLang.use')?></label>
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
        let max_ncc = '';
        var ajaxDataTable = $('#data-table').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('AppLang.all') ?>"]],
            'searching': true, // Remove default Search Control
            'ajax': {
                'url': '<?=base_url()?>dashboard/type_road/type_asset_ajax',
                'data': function (data) {
                }
            },
            'columns': [
                {data: 'ma_loai_ts'},
                {data: 'ten_loai_ts'},
                {data: 'thuoc_loai'},
                {data: 'tyle_haomon'},
                {data: 'sonam_sudung'},
                {data: 'ghi_chu'},
                {data: 'su_dung'},
                {data: 'active'}
            ]
        });

        $('#myModal').on('show.bs.modal', function (event) {
            $("#response_danger_modal").hide('fast');
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            var ma_loai_ts = button.data('ma_loai_ts');
            var ten_loai_ts = button.data('ten_loai_ts');
            var thuoc_loai = button.data('thuoc_loai');
            var tyle_haomon = button.data('tyle_haomon');
            var sonam_sudung = button.data('sonam_sudung');
            var ghi_chu = button.data('ghi_chu');
            var su_dung = button.data('su_dung');

            var field = document.getElementById("add_edit");
            field.setAttribute("name",recipient);
            $('#ma_loai_ts').val(ma_loai_ts);
            $('#ten_loai_ts').val(ten_loai_ts);
            $('#thuoc_loai').val(thuoc_loai);
            $('#tyle_haomon').val(tyle_haomon);
            $('#sonam_sudung').val(sonam_sudung);
            $('#ghi_chu').val(ghi_chu);
            if(su_dung == 1)
                $('#su_dung').prop("checked", true);
            else $('#su_dung').prop("checked", false);

            if(recipient=="add"){
                $('#myModalLabel').text("<?=lang('LoaiTaiSanLang.add_asset')?>");
                $('#ma_loai_ts').prop("readonly",false);
            }else {
                $('#myModalLabel').text("<?=lang('LoaiTaiSanLang.edit_asset')?>");
                $('#ma_loai_ts').prop("readonly",true);
            }
        });
        // Delete
        $('#smallModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('ma_loai_ts') // Extract info from data-* attributes
            $("#modal-btn-yes").on("click", function(event){
                $("#smallModal").modal('hide');
                event.preventDefault();
                $("#response_success").hide('fast');
                $("#response_danger").hide('fast');
                $.ajax({
                    url: '<?= base_url() ?>dashboard/type_road/delete_asset',
                    type: 'POST',
                    data: { ma_loai_ts:recipient },
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
                url: "<?= base_url() ?>dashboard/type_road/"+name+"_asset",
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