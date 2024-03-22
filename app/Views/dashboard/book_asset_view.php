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
                                    <thead style="text-align:center;vertical-align: middle" >
                                    <tr>
                                        <th rowspan="3">STT</th>
                                        <th colspan="2">Chứng từ</th>
                                        <th colspan="6">Ghi tăng tài sản cố định</th>
                                        <th colspan="6">Khấu hao (hao mòn) tài sản cố định</th>
                                        <th colspan="4">Ghi giảm TSCĐ</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2">Số hiệu</th>
                                        <th rowspan="2">Ngày, tháng</th>
                                        <th rowspan="2">Tên, đặc điểm, ký hiệu TSCĐ</th>
                                        <th rowspan="2">Nước sản xuất</th>
                                        <th rowspan="2">Tháng, năm đưa vào sử dụng ở đơn vị</th>
                                        <th rowspan="2">Số hiệu TSCĐ</th>
                                        <th rowspan="2">Thẻ TSCĐ</th>
                                        <th rowspan="2">Nguyên giá TSCĐ</th>
                                        <th colspan="2">Khấu hao</th>
                                        <th colspan="2">Hao mòn</th>
                                        <th rowspan="2">Tổng số khấu hao (hao mòn) phát sinh trong năm</th>
                                        <th rowspan="2">Lũy kế khấu hao/hao mòn đã tính đến khi chuyển sổ hoặc ghi giảm TSCĐ</th>
                                        <th colspan="2">Chứng từ</th>
                                        <th rowspan="2">Lý do ghi giảm TSCĐ</th>
                                        <th rowspan="2">Giá trị còn lại của TSCĐ</th>
                                    </tr>
                                    <tr>
                                        <th>Tỷ lệ %</th>
                                        <th>Số tiền</th>
                                        <th>Tỷ lệ %</th>
                                        <th>Số tiền</th>
                                        <th>Số hiệu</th>
                                        <th>Ngày, tháng</th>
                                    </tr>
                                    </thead>
                                    <tbody id ="data_table">
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
            console.log(myData);
            export_excel_so_ts(nam_theo_doi.options[nam_theo_doi.selectedIndex].text,myData);
        });
        function loadDataTable() {
            var year = $('#nam_theo_doi').val();

            $.ajax({
                url: "<?= base_url() ?>dashboard/report/book_asset_ajax",
                method: "POST",
                dataType: "json",
                data: {report_year: year},
                success: function (data) {
                    $("#data_table").html(data[1]);
                    myData = (data[0]);
                    console.log(myData);
                },
                error: function (data) {
                    $("#data_table").html(data[1]);
                }
            });
        };
        loadDataTable();
        $('#nam_theo_doi').change(function(){
            loadDataTable();
        });
    });
</script>
