<style>
    #response_danger_modal{display: none}
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_title_department')?></h4>
                </div>
            </div>
        </div>
        <!------------------>
        <div class="row">
            <div class="col-lg-12">
                <!---->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?=lang('AppLang.page_title_department')?></h4>
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
                                    <th scope="col"><?=lang('BoPhanLang.ma_bp')?></th>
                                    <th scope="col"><?=lang('BoPhanLang.ten_bp')?></th>
                                    <th scope="col"><?=lang('BoPhanLang.truc_thuoc')?></th>
                                    <th scope="col"><?=lang('BoPhanLang.ghi_chu')?></th>
                                    <th scope="col"><?=lang('BoPhanLang.chuong_md')?></th>
                                    <th scope="col"><?=lang('BoPhanLang.khoan_md')?></th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><?=lang('BoPhanLang.ma_bp')?></th>
                                    <th><?=lang('BoPhanLang.ten_bp')?></th>
                                    <th><?=lang('BoPhanLang.truc_thuoc')?></th>
                                    <th><?=lang('BoPhanLang.ghi_chu')?></th>
                                    <th><?=lang('BoPhanLang.chuong_md')?></th>
                                    <th><?=lang('BoPhanLang.khoan_md')?></th>
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
                            <label><?=lang('BoPhanLang.ma_bp')?></label>
                            <input type="text" id="ma_bp" name="ma_bp"
                                   class="form-control" placeholder="<?=lang('BoPhanLang.ma_bp')?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label><?=lang('BoPhanLang.ten_bp')?></label>
                            <input type="text" id="ten_bp" name="ten_bp"
                                   class="form-control" placeholder="<?=lang('BoPhanLang.ten_bp')?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label><?=lang('BoPhanLang.truc_thuoc')?></label>
                            <select class="custom-select" id="truc_thuoc" name="truc_thuoc">
                                <?php if (isset($list_bp) && count($list_bp)) :
                                    foreach ($list_bp as $key => $item) : ?>
                                        <option value="<?=$item->ma_bp?>"><?=$item->ten_bp?></option>
                                    <?php
                                    endforeach;
                                endif ?>
                            </select>
                        </div>                      
                        
                        <div class="form-group col-md-6">
                            <label><?=lang('BoPhanLang.ghi_chu')?></label>
                            <input type="text" id="ghi_chu" name="ghi_chu" class="form-control" placeholder="<?=lang('BoPhanLang.ghi_chu')?>">
                        </div>
                    </div>                  
                   
                    <div class="form-row">
                        
                        <div class="form-group col-md-3">
                            <label><?=lang('BoPhanLang.chuong_md')?></label>
                            <select class="custom-select" id="chuong_md" name="chuong_md">
                                <?php if (isset($list_chuong) && count($list_chuong)) :
                                    foreach ($list_chuong as $key => $item) : ?>
                                        <option value="<?=$item->ma?>"><?=$item->ten?></option>
                                    <?php
                                    endforeach;
                                endif ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label><?=lang('BoPhanLang.khoan_md')?></label>
                            <select class="custom-select" id="khoan_md" name="khoan_md">
                                <?php if (isset($list_khoan) && count($list_khoan)) :
                                    foreach ($list_khoan as $key => $item) : ?>
                                        <option value="<?=$item->ma?>"><?=$item->ten?></option>
                                    <?php
                                    endforeach;
                                endif ?>
                            </select>
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
                'url': '<?=base_url()?>dashboard/department/department_ajax',
                'data': function (data) {
                }
            },
            'columns': [
                {data: 'ma_bp'},
                {data: 'ten_bp'},
                {data: 'truc_thuoc'},
                {data: 'ghi_chu'},
                {data: 'chuong_md'},
                {data: 'khoan_md'},
                {data: 'active'}
            ]
        });

        $('#myModal').on('show.bs.modal', function (event) {
            $("#response_danger_modal").hide('fast');
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            var ma_bp = button.data('ma_bp');
            var ten_bp = button.data('ten_bp');
            var truc_thuoc = button.data('truc_thuoc');
            var ghi_chu = button.data('ghi_chu');
            var chuong_md = button.data('chuong_md');
            var khoan_md = button.data('khoan_md');

            var field = document.getElementById("add_edit");
            field.setAttribute("name",recipient);
            $('#ma_bp').val(ma_bp);
            $('#ten_bp').val(ten_bp);
            $('#truc_thuoc').val(truc_thuoc);
            $('#ghi_chu').val(ghi_chu);           
            $('#chuong_md').val(chuong_md);
            $('#khoan_md').val(khoan_md);
           

            if(recipient=="add"){
                $('#myModalLabel').text("<?=lang('BoPhanLang.add_bp')?>");
                $('#ma_bp').prop("readonly",false);
            }else {
                $('#myModalLabel').text("<?=lang('BoPhanLang.edit_bp')?>");
                $('#ma_bp').prop("readonly",true);
            }
        });
        // Delete
        $('#smallModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('ma_bp') // Extract info from data-* attributes
            $("#modal-btn-yes").on("click", function(event){
                $("#smallModal").modal('hide');
                event.preventDefault();
                $("#response_success").hide('fast');
                $("#response_danger").hide('fast');
                $.ajax({
                    url: '<?= base_url() ?>dashboard/department/delete_department',
                    type: 'POST',
                    data: { ma_bp:recipient },
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
                url: "<?= base_url() ?>dashboard/department/"+name+"_department",
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