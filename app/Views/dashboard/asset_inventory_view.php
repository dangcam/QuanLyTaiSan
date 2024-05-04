<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('ReportLang.asset_inventory')?></h4>
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
                                        <th>STT</th>
                                        <th>Mã tài sản</th>
                                        <th>Tên tài sản</th>
                                        <th>Số seri</th>
                                        <th>Đơn vị tính</th>
                                        <th>Số lượng theo sổ kế toán</th>
                                        <th>Số lượng theo thực tế (*)</th>
                                        <th>Tình trạng của tài sản</th>
                                        <th>Ghi chú</th>
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
            export_excel_kk_ts(nam_theo_doi.options[nam_theo_doi.selectedIndex].text,myData);
        });
        function loadDataTable() {
            var year = $('#nam_theo_doi').val();

            $.ajax({
                url: "<?= base_url() ?>dashboard/report/asset_inventory_ajax",
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
