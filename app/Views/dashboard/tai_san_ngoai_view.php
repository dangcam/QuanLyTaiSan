<style>
    #response_danger_modal{display: none}
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_title_off_asset')?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!---->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?=lang('AppLang.off_asset')?></h4>
                        <a href="#" type="button" class="btn btn-rounded btn-info" data-toggle="modal" data-target="#myModal" data-whatever="add">
                            <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                    </span>Add</a>
                        <input type="file" id="myfile" name="myfile"><br><br>
                        <div class="col-lg-2">
                            <button type="button" id="import_excel" class="btn btn-rounded btn-success"><span class="btn-icon-left text-success"><i class="fa fa-upload color-success"></i>
                                        </span>Excel</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label" ><?=lang('AppLang.year')?></label>
                            <div class="col-lg-2">
                                <select class="form-control" id="nam_kiem_ke_view" name="nam_kiem_ke_view">
                                    <?php
                                    $nowYear =2019;
                                    foreach (range(date('Y'), $nowYear) as $i) {
                                        echo "<option value=$i>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <label  class="col-lg-2 col-form-label" for="bo_phan_su_dung"><?=lang('TaiSanLang.bo_phan_su_dung')?></label>
                            <div class="col-lg-4">
                                <select class="form-control" id="bo_phan_su_dung_view" name="bo_phan_su_dung_view">
                                    <?php if (isset($list_bo_phan_su_dung) && count($list_bo_phan_su_dung)) :
                                        foreach ($list_bo_phan_su_dung as $key => $item) : ?>
                                            <option value="<?=$item->ma_bp?>"><?=$item->ten_bp?></option>
                                        <?php
                                        endforeach;
                                    endif ?>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-control" id="loai_kiem_ke_view" name="loai_kiem_ke_view">
                                        <option value="1">Trong sổ sách</option>
                                        <option value="2">Ngoài sổ sách</option>
                                </select>
                            </div>
                        </div>
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
                                    <th scope="col"><?=lang('TaiSanLang.ten_tai_san')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.so_luong')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.don_vi_tinh')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.nguoi_su_dung')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.ghi_chu')?></th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><?=lang('TaiSanLang.ten_tai_san')?></th>
                                    <th><?=lang('TaiSanLang.so_luong')?></th>
                                    <th><?=lang('TaiSanLang.don_vi_tinh')?></th>
                                    <th><?=lang('TaiSanLang.nguoi_su_dung')?></th>
                                    <th><?=lang('TaiSanLang.ghi_chu')?></th>
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
                    <input type="text" name="id" class="form-control" id="id" hidden >
                    <input type="text" name="nam_kiem_ke" class="form-control" id="nam_kiem_ke" hidden >
                    <input type="text" name="loai_kiem_ke" class="form-control" id="loai_kiem_ke" hidden >
                    <input type="text" name="bo_phan_su_dung" class="form-control" id="bo_phan_su_dung" hidden >
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label"><?=lang('TaiSanLang.ten_tai_san')?></label>
                        <input type="text" name="ten_tai_san" class="form-control" id="ten_tai_san" required placeholder="<?=lang('TaiSanLang.ten_tai_san')?>">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label"><?=lang('TaiSanLang.so_luong')?></label>
                        <input type="text" name="so_luong" class="form-control" id="so_luong" required placeholder="<?=lang('TaiSanLang.so_luong')?>">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><?=lang('TaiSanLang.don_vi_tinh')?></label>
                        <input type="text" name="don_vi" class="form-control" id="don_vi"  placeholder="<?=lang('TaiSanLang.don_vi_tinh')?>">
                    </div>                    
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><?=lang('TaiSanLang.nguoi_su_dung')?></label>
                        <input type="text" name="nguoi_su_dung" class="form-control" id="nguoi_su_dung" placeholder="<?=lang('TaiSanLang.nguoi_su_dung')?>">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><?=lang('TaiSanLang.ghi_chu')?></label>
                        <input type="text" name="ghi_chu" class="form-control" id="ghi_chu" placeholder="<?=lang('TaiSanLang.ghi_chu')?>">
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
                'url': '<?=base_url()?>dashboard/off_asset/asset_ajax',
                'data': function (data) {
                    data.searchYear = $('#nam_kiem_ke_view').val();
                    data.searchBoPhan = $('#bo_phan_su_dung_view').val();
                    data.searchLoaiKK = $('#loai_kiem_ke_view').val();
                },
            },
            'columns': [
                {data: 'ten_tai_san'},
                {data: 'so_luong'},
                {data: 'don_vi'},
                {data: 'nguoi_su_dung'},
                {data: 'ghi_chu'},
                {data: 'active'}
            ],

        });
        $('#nam_kiem_ke_view,#bo_phan_su_dung_view,#loai_kiem_ke_view').change(function(){
            ajaxDataTable.draw();
        });
        $('#myModal').on('show.bs.modal', function (event) {
            $("#response_danger_modal").hide('fast');
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            var id = button.data('id');
            var ten_tai_san = button.data('ten_tai_san');
            var so_luong = button.data('so_luong');
            var don_vi = button.data('don_vi');
            var nguoi_su_dung = button.data('nguoi_su_dung');
            var nam_kiem_ke = $('#nam_kiem_ke_view').val();
            var loai_kiem_ke = $('#loai_kiem_ke_view').val();
            var ghi_chu = button.data('ghi_chu');
            var bo_phan_su_dung = $('#bo_phan_su_dung_view').val();
            var field = document.getElementById("add_edit");
            field.setAttribute("name",recipient);
            $('#id').val(id);
            $('#ten_tai_san').val(ten_tai_san);
            $('#so_luong').val(so_luong);
            $('#don_vi').val(don_vi);
            $('#nguoi_su_dung').val(nguoi_su_dung);
            $('#ghi_chu').val(ghi_chu);
            $('#bo_phan_su_dung').val(bo_phan_su_dung);
            $('#nam_kiem_ke').val(nam_kiem_ke);
            $('#loai_kiem_ke').val(loai_kiem_ke);
            if(recipient=="add"){
                $('#myModalLabel').text("<?=lang('TaiSanLang.add_taisan')?>");
                //$('#ma_da').prop("readonly",false);
                //$('#su_dung').val(1);
            }else {
                $('#myModalLabel').text("<?=lang('TaiSanLang.edit_taisan')?>");
                //$('#ma_da').prop("readonly",true);
                //$('#su_dung').val(su_dung);
            }
        });
        // Delete
        $('#smallModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('id') // Extract info from data-* attributes
            $("#modal-btn-yes").on("click", function(event){
                $("#smallModal").modal('hide');
                event.preventDefault();
                $("#response_success").hide('fast');
                $("#response_danger").hide('fast');
                $.ajax({
                    url: '<?= base_url() ?>dashboard/off_asset/delete_asset',
                    type: 'POST',
                    data: { id:recipient },
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
                url: "<?= base_url() ?>dashboard/off_asset/"+name+"_asset",
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
        $("#import_excel").on( "click",async function() {
            let data_file = document.getElementById("myfile").files[0];
            let formData = new FormData();
            formData.append("file_import", myfile.files[0]);
            formData.append("bo_phan_su_dung", $('#bo_phan_su_dung_view').val());
            formData.append("nam_kiem_ke", $('#nam_kiem_ke_view').val());
            formData.append("loai_kiem_ke", $('#loai_kiem_ke_view').val());
            //console.log(formData);
            try {
                let response = await fetch('<?= base_url() ?>dashboard/off_asset/off_asset_import', {
                    method: "POST",
                    body: formData
                });

                if (response.ok) {
                    let message = await response.text();
                    ajaxDataTable.draw();
                    alert(message); // Hiển thị thông báo từ server
                } else {
                    throw new Error('Network response was not ok.');
                }
            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
                alert('An error occurred. Please try again later.'); // Thông báo lỗi nếu có lỗi xảy ra
            }

        });

    });
</script>

