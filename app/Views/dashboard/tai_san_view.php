<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label" ><?=lang('AppLang.year')?></label>
                            <div class="col-lg-2">
                                <select class="form-control" id="nam_theo_doi" name="nam_theo_doi">
                                    <?php
                                    $nowYear =2022;
                                    foreach (range(date('Y'), $nowYear) as $i) {
                                        echo "<option value=$i>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <button onclick="location.href='<?= base_url() ?>dashboard/tai_san/tai_san_ct?year='+$('#nam_theo_doi').val()"
                                        type="button" id="khai_bao_tai_san" class="btn btn-rounded btn-success">
                                    <span class="btn-icon-left text-success"><i class="fa fa-upload color-success"></i>
                                        </span><?=lang('TaiSanLang.khai_bao_tai_san')?></button>
                            </div>
                            <input type="file" id="myfile" name="myfile"><br><br>
                            <div class="col-lg-2">
                                <button type="button" id="import_excel" class="btn btn-rounded btn-success"><span class="btn-icon-left text-success"><i class="fa fa-upload color-success"></i>
                                        </span>Upload</button>

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
                                    <th scope="col"><?=lang('TaiSanLang.ma_tai_san')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.ten_tai_san')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.loai_tai_san')?></th>
                                    <th scope="col"><?=lang('TaiSanLang.bo_phan_su_dung')?></th>
                                    <th scope="col" ><?=lang('TaiSanLang.so_luong')?></th>
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
                    data.searchYear = $('#nam_theo_doi').val();
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

        $('#nam_theo_doi').change(function(){
            ajaxDataTable.draw();
        });
        // Delete
        $('#smallModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('ma_tai_san') // Extract info from data-* attributes
            $("#modal-btn-yes").on("click", function(event){
                $("#smallModal").modal('hide');
                event.preventDefault();
                $("#response_success").hide('fast');
                $("#response_danger").hide('fast');
                $.ajax({
                    url: '<?= base_url() ?>dashboard/tai_san/delete_tai_san',
                    type: 'POST',
                    data: { ma_tai_san:recipient },
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

        $("#import_excel").on( "click",async function() {
            let data_file = document.getElementById("myfile").files[0];
            let formData = new FormData();
            formData.append("file_import", myfile.files[0]);
            formData.append("nam_theo_doi", $('#nam_theo_doi').val());
            //console.log(formData);
            try {
                let response = await fetch('<?= base_url() ?>dashboard/tai_san/tai_san_import', {
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
