<style>
    #response_danger_modal{display: none}
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_title_tool')?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!---->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?=lang('AppLang.page_title_tool')?></h4>
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
                                    <th scope="col"><?=lang('ToolLang.ma_ccdc')?></th>
                                    <th scope="col"><?=lang('ToolLang.ten_ccdc')?></th>
                                    <th scope="col"><?=lang('ToolLang.thuoc_loai')?></th>
                                    <th scope="col"><?=lang('ToolLang.ghi_chu')?></th>
                                    <th scope="col"><?=lang('ToolLang.su_dung')?></th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><?=lang('ToolLang.ma_ccdc')?></th>
                                    <th><?=lang('ToolLang.ten_ccdc')?></th>
                                    <th><?=lang('ToolLang.thuoc_loai')?></th>
                                    <th><?=lang('ToolLang.ghi_chu')?></th>
                                    <th><?=lang('ToolLang.su_dung')?></th>
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
                        <label for="recipient-name" class="col-form-label"><?=lang('ToolLang.ma_ccdc')?></label>
                        <input type="text" name="ma_ccdc" class="form-control" id="ma_ccdc" required placeholder="<?=lang('ToolLang.ma_ccdc')?>">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><?=lang('ToolLang.ten_ccdc')?></label>
                        <input type="text" name="ten_ccdc" class="form-control" id="ten_ccdc" required placeholder="<?=lang('ToolLang.ten_ccdc')?>">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><?=lang('ToolLang.thuoc_loai')?></label>
                        <select class="custom-select" id="thuoc_loai" name="thuoc_loai">
                            <?php if (isset($list_ccdc) && count($list_ccdc)) :
                                foreach ($list_ccdc as $key => $item) : ?>
                                    <option value="<?=$item->ma_ccdc?>"><?=$item->ten_ccdc?></option>
                                <?php
                                endforeach;
                            endif ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><?=lang('ToolLang.ghi_chu')?></label>
                        <input type="text" name="ghi_chu" class="form-control" id="ghi_chu" placeholder="<?=lang('ToolLang.ghi_chu')?>">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><?=lang('ToolLang.su_dung')?></label>
                        <select id="su_dung" class="form-control"name ="su_dung">
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

<script>
    jQuery(document).ready(function($) {
        var ajaxDataTable = $('#data-table').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('AppLang.all') ?>"]],
            'searching': true, // Remove default Search Control
            'ajax': {
                'url': '<?=base_url()?>dashboard/tool/tool_ajax',
                'data': function (data) {
                },
            },
            'columns': [
                {data: 'ma_ccdc'},
                {data: 'ten_ccdc'},
                {data: 'thuoc_loai'},
                {data: 'ghi_chu'},
                {data: 'su_dung'},
                {data: 'active'}
            ],

        });

        $('#myModal').on('show.bs.modal', function (event) {
            $("#response_danger_modal").hide('fast');
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            var ma_ccdc = button.data('ma_ccdc');
            var ten_ccdc = button.data('ten_ccdc');
            var thuoc_loai = button.data('thuoc_loai');
            var ghi_chu = button.data('ghi_chu');
            var su_dung = button.data('su_dung');
            var field = document.getElementById("add_edit");
            field.setAttribute("name",recipient);
            $('#ma_ccdc').val(ma_ccdc);
            $('#ten_ccdc').val(ten_ccdc);
            $('#thuoc_loai').val(thuoc_loai);
            $('#ghi_chu').val(ghi_chu);
            $('#su_dung').val(su_dung);
            if(recipient=="add"){
                $('#myModalLabel').text("<?=lang('ToolLang.add_ccdc')?>");
                $('#ma_ccdc').prop("readonly",false);
                $('#su_dung').val(1);
            }else {
                $('#myModalLabel').text("<?=lang('ToolLang.edit_ccdc')?>");
                $('#ma_ccdc').prop("readonly",true);
                $('#su_dung').val(su_dung);
            }
        });
        // Delete
        $('#smallModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('ma_ccdc') // Extract info from data-* attributes
            $("#modal-btn-yes").on("click", function(event){
                $("#smallModal").modal('hide');
                event.preventDefault();
                $("#response_success").hide('fast');
                $("#response_danger").hide('fast');
                $.ajax({
                    url: '<?= base_url() ?>dashboard/tool/delete_tool',
                    type: 'POST',
                    data: { ma_ccdc:recipient },
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
                url: "<?= base_url() ?>dashboard/tool/"+name+"_tool",
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

