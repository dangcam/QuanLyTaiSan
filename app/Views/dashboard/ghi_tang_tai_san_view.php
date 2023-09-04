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
                                <tbody id ="lits_tai_san_ghi_tang">
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
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" role="alert" id="response_danger_modal">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"><?=lang('GhiTangTaiSanLang.chon_tai_san')?></h5>
                <button type="button" id="close_modal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="data-table_list_tai_san" class="table table-bordered table-striped verticle-middle table-responsive-sm" style="width:100%">
                            <thead>
                            <tr>
                                <th scope="col"><input type="checkbox" id="selectAll"></th>
                                <th scope="col"><?=lang('TaiSanLang.ma_tai_san')?></th>
                                <th scope="col"><?=lang('TaiSanLang.ten_tai_san')?></th>
                                <th scope="col"><?=lang('TaiSanLang.bo_phan_su_dung')?></th>
                                <th scope="col"><?=lang('TaiSanLang.gia_tri')?></th>
                                <th scope="col"><?=lang('TaiSanLang.hm_luy_ke')?></th>
                                <th scope="col"><?=lang('TaiSanLang.gia_tri_con_lai')?></th>
                            </tr>
                            </thead>
                            <tbody id ="list_tai_san">
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=lang('AppLang.close')?></button>
                    <input id="add_row" type="submit" class="btn btn-primary" name="" value="<?=lang('AppLang.add')?>">
                </div>
        </div>
    </div>
</div>
<!---->

<script>
    var selectedRows =[];
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
            var ngay_chung_tu = button.data('ngay_chung_tu');
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
                const formattedDate = currentDate.toISOString().slice(0, 10);
                $('#ngay_chung_tu').val(formattedDate);
                $('#ngay_ghi_tang').val(formattedDate);
                selectedRows = [];
                loadRowGhiTang();
            }else {
                $('#myModalLabel').text("<?=lang('GhiTangTaiSanLang.edit_ghitang')?>");
                $('#ma_chung_tu').prop("readonly",true);
                $.ajax({
                    url: "<?= base_url() ?>dashboard/ghitangtaisan/ghitang_taisan_ajax",
                    method: "POST",
                    dataType: "json",
                    data: {ma_chung_tu: ma_chung_tu },
                    success: function (data) {
                        console.log(data);
                        selectedRows =[];
                        data.forEach(function (row) {
                            selectedRows.push(row);
                        });
                        loadRowGhiTang();
                    },
                    error: function (data) {
                        $("#list_tai_san_ghi_tang").html(data);
                    }
                });
            }
        });
        $('#myModal').on('show.bs.modal', function (event) {
            $.ajax({
                url: "<?= base_url() ?>dashboard/ghitangtaisan/taisan_ajax",
                method: "POST",
                dataType: "json",
                data: {nam_ghi_tang: $('#nam_ghi_tang').val() },
                success: function (data) {
                    $("#list_tai_san").html(data);
                    $('.item-checkbox').trigger("change");
                },
                error: function (data) {
                    $("#list_tai_san").html(data);
                }
            });
        });
        // Delete
        $('#smallModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('ma_chung_tu') // Extract info from data-* attributes
            $("#modal-btn-yes").on("click", function(event){
                $("#smallModal").modal('hide');
                event.preventDefault();
                $("#response_success").hide('fast');
                $("#response_danger").hide('fast');
                $.ajax({
                    url: '<?= base_url() ?>dashboard/ghitangtaisan/delete_ghitang',
                    type: 'POST',
                    data: { ma_chung_tu:recipient },
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
            //var formData = $(this).serialize();
            console.log((selectedRows));
            $.ajax({
                url: "<?= base_url() ?>dashboard/ghitangtaisan/"+name+"_ghitang",
                method: "POST",
                data: {ma_chung_tu:$('#ma_chung_tu').val(), ngay_chung_tu:$('#ngay_chung_tu').val(),
                    ngay_ghi_tang:$('#ngay_ghi_tang').val(),tong_nguyen_gia:$('#tong_nguyen_gia').val(),
                    ghi_chu:$('#ghi_chu').val(),nam_ghi_tang:$('#nam_ghi_tang').val(), selectedRows:(selectedRows)},
                dataType: "json",
                success: function (data) {
                    if (data[0]==0) {
                        $("#response_success").show('fast');
                        $("#response_success").html(data[1]);
                        $('#myModal_Full').modal('toggle');
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
        $('#myModal').on('change', '#selectAll', function () {
            $('.item-checkbox').prop('checked', this.checked);
        });

        // Attach the individual checkbox event handler using event delegation
        $('#myModal').on('change', '.item-checkbox', function () {
            if ($('.item-checkbox:checked').length === $('.item-checkbox').length) {
                $('#selectAll').prop('checked', true);
            } else {
                $('#selectAll').prop('checked', false);
            }
        });
        //
        $('#add_row').on('click', function (e) {
            e.preventDefault(); // Prevent the default form submission

            $('.item-checkbox:checked').each(function () {
                var $row = $(this).closest('tr'); // Get the closest row element
                var maTaiSan = $row.find('td:eq(1)').text();
                var tenTaiSan = $row.find('td:eq(2)').text();
                var boPhanSuDung = $row.find('td:eq(3)').text();
                var giaTri = $row.find('td:eq(4)').text();
                var hmLuyKe = $row.find('td:eq(5)').text();
                var giaTriConLai = $row.find('td:eq(6)').text();
                var exists = selectedRows.some(function (row) {
                    return row.maTaiSan === maTaiSan;
                });
                if (!exists) {
                    selectedRows.push({
                        maTaiSan: maTaiSan,
                        tenTaiSan: tenTaiSan,
                        boPhanSuDung: boPhanSuDung,
                        giaTri: giaTri,
                        hmLuyKe: hmLuyKe,
                        giaTriConLai: giaTriConLai,
                    });
                }
            });
            $('#myModal').modal('toggle');
            loadRowGhiTang();
            console.log(selectedRows);
        });

    });
    function loadRowGhiTang() {
        let tongNguyenGia = 0;
        let rowhtml = '';

        selectedRows.forEach(function (row) {
            let active_row =
                '          <a href="javascript:void(remove_row_ghi_tang(\''+row.maTaiSan+'\'))" class="mr-4" ' +
                '               data-toggle="tooltip" data-placement="to" title="<?=lang('AppLang.delete')?>">' +
                '           <i class="fa fa-close color-danger"></i></a>\n';
            rowhtml += '<tr>';
            rowhtml += '<td>' + row.maTaiSan + '</td>';
            rowhtml += '<td>' + row.tenTaiSan + '</td>';
            rowhtml += '<td>' + row.boPhanSuDung + '</td>';
            rowhtml += '<td>' + row.giaTri + '</td>';
            rowhtml += '<td>' + row.hmLuyKe + '</td>';
            rowhtml += '<td>' + row.giaTriConLai + '</td>';
            rowhtml += '<td>' + active_row + '</td>';
            rowhtml += '</tr>'
            tongNguyenGia += parseInt(row.giaTri);
        });

        $('#lits_tai_san_ghi_tang').html(rowhtml);
        $('#tong_nguyen_gia').val(tongNguyenGia);
    };
    function remove_row_ghi_tang(id) {
        selectedRows = selectedRows.filter(function (row) {
            return row.maTaiSan !== id;
        });
        loadRowGhiTang();
    };
</script>

