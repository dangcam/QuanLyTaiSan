<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"><?=lang('AppLang.ngay_bao_cao')?></label>
                    <div class="col-sm-4">
                        <input type="date" id="ngay_bao_cao" class="form-control" >
                    </div>
                </div>
            </div>
        </div>
        <!---->
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-layout-grid2 text-primary border-primary"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text"><?=lang('AppLang.tong_so_tai_san')?></div>
                            <div class="stat-digit" id="tong_tai_san">961</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-money text-success border-success"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text"><?=lang('AppLang.tong_nguyen_gia')?></div>
                            <div class="stat-digit" id="tong_nguyen_gia">1,012</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-link text-danger border-danger"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text"><?=lang('AppLang.gia_tri_con_lai')?></div>
                            <div class="stat-digit" id="gia_tri_con_lai">2,781</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---->
        <!-- row -->

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart_1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Gradient Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart_2"></canvas>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <!----->
    </div>
</div>
<!-- Chart ChartJS plugin files -->
<script src="vendor/chart.js/Chart.bundle.min.js"></script>
<script src="js/plugins-init/chartjs-init.js"></script>
<script type="text/javascript">
    var currentDate = new Date();
    $('#ngay_bao_cao').val(currentDate.toISOString().slice(0, 10));
    $('#ngay_bao_cao').change(function(){
       loadData();
    });
    function loadData(){
        $.ajax({
            url: "<?= base_url() ?>dashboard/ngay_bao_cao_ajax",
            method: "POST",
            dataType: "json",
            data: {ngay_bao_cao: $('#ngay_bao_cao').val() },
            success: function (data) {
                console.log(data);
                var tong_tai_san = data['tong_tai_san'];
                $('#tong_tai_san').html(parseFloat(tong_tai_san['tong_tai_san']).toLocaleString());
                $('#tong_nguyen_gia').html(parseFloat(tong_tai_san['tong_nguyen_gia']).toLocaleString());
                $('#gia_tri_con_lai').html(parseFloat(tong_tai_san['gia_tri_con_lai']).toLocaleString());
            },
            error: function (data) {
            }
        });
    };
    loadData();
</script>