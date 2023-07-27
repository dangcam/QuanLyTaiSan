<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label" ><?=lang('AppLang.year')?></label>
                            <div class="col-lg-2">
                                <select class="form-control" id="nam_ke_khai" name="nam_ke_khai">
                                    <?php
                                    $nowYear =2022;
                                    foreach (range(date('Y'), $nowYear) as $i) {
                                        echo "<option value=$i>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <button type="button" id="khai_bao_tai_san" class="btn btn-rounded btn-success">
                                    <span class="btn-icon-left text-success"><i class="fa fa-upload color-success"></i>
                                        </span><?=lang('TaiSanLang.khai_bao_tai_san')?></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered table-striped verticle-middle table-responsive-sm" style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col"><?=lang('TaiSanLang.ma_tai_san')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.ten_tai_san')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.loai_tai_san')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.bo_phan_su_dung')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.so_luong')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.gia_tri')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.hm_luy_ke')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.gia_tri_con_lai')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.ngay_ghi_tang')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.trang_thai')?></th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<link href="vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="js/plugins-init/datatables.init.js"></script>

<script>
    jQuery(document).ready(function($) {
        var ajaxDataTable = $('#data-table').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('AppLang.all') ?>"]],
            'searching': true, // Remove default Search Control
            'ajax': {
                'url': '<?=base_url()?>dashboard/tai_san/tai_san_ajax',
                'data': function (data) {
                    data.searchYear = $('#nam_ke_khai').val();
                }
            },
            'columns': [
                {data: 'ma_tai_san'},
                {data: 'ten_tai_san'},
                {data: 'loai_tai_san'},
                {data: 'bo_phan_su_dung'},
                {data: 'so_luong'},
                {data: 'gia_tri'},
                {data: 'hm_luy_ke'},
                {data: 'gia_tri_con_lai'},
                {data: 'ngay_ghi_tang'},
                {data: 'trang_thai'},
                {data: 'active'}
            ]
        });

        $('#nam_ke_khai').change(function(){
            ajaxDataTable.draw();
        });
        // Delete
        $('#smallModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('group_id') // Extract info from data-* attributes
            $("#modal-btn-yes").on("click", function(event){
                $("#smallModal").modal('hide');
                event.preventDefault();
                $("#response_success").hide('fast');
                $("#response_danger").hide('fast');
                $.ajax({
                    url: '<?= base_url() ?>dashboard/group/delete_group',
                    type: 'POST',
                    data: { group_id:recipient },
                    dataType:"json",
                    success:function (data) {
                        if(data[0]==0){
                            $("#response_success").show('fast');
                            $("#response_success").html(data[1]);
                            groupDataTable.ajax.reload();
                            treeGroup();
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


    });
</script>
