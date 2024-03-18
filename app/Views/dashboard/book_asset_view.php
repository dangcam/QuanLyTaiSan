<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('ReportLang.book_asset')?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <!---->
                        <div class="card-body">
                            <div class="form-group row col-lg-12">
                                <label class="col-lg-1 col-form-label" for="nam_theo_doi"><?=lang('ReportLang.year')?></label>
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

                                <div class="col-lg-2">
                                    <button type="button" id="export_excel" class="btn btn-rounded btn-success"><span class="btn-icon-left text-success"><i class="fa fa-upload color-success"></i>
                                        </span>Excel</button>
                                </div>
                            </div>

                            <!---->
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
                                        <th scope="col" ><?=lang('TaiSanLang.so_luong')?></th>
                                        <th scope="col"><?=lang('TaiSanLang.gia_tri')?></th>
                                        <th scope="col"><?=lang('TaiSanLang.hm_luy_ke')?></th>
                                        <th scope="col"><?=lang('TaiSanLang.gia_tri_con_lai')?></th>
                                        <th scope="col"><?=lang('TaiSanLang.ngay_ghi_tang')?></th>
                                        <th scope="col"><?=lang('TaiSanLang.trang_thai')?></th>
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

<script lang="javascript" src="js/exceljs.min.js"></script>
<script lang="javascript" src="js/FileSaver.min.js"></script>
<script lang="javascript" src="js/export2excel.js"></script>

<script>
    jQuery(document).ready(function($) {
        let myData = [];
        $("#export_excel").on( "click", function() {
            var nam_theo_doi = document.getElementById('nam_theo_doi');
            var bo_phan_su_dung = document.getElementById('bo_phan_su_dung');
            console.log(myData);
            export_excel(nam_theo_doi.options[nam_theo_doi.selectedIndex].text,
                bo_phan_su_dung.options[bo_phan_su_dung.selectedIndex].text,myData);
        });
        var ajaxDataTable = $('#data-table').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('AppLang.all') ?>"]],
            'searching': true, // Remove default Search Control
            'ajax': {
                'url': '<?=base_url()?>dashboard/report/report_tai_san_ajax',
                'data': function (data) {
                    data.searchYear = $('#nam_theo_doi').val();
                },
                'complete': function (data) {
                    myData = data.responseJSON['data_table'];
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
                {data: 'trang_thai'}
            ]
        });

        $('#nam_theo_doi,#bo_phan_su_dung').change(function(){
            ajaxDataTable.draw();
        });
    });
</script>
