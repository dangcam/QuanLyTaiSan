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
                            <div class="stat-digit">961</div>
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
                            <div class="stat-digit">1,012</div>
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
                            <div class="stat-digit">2,781</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---->
    </div>
</div>

<script type="text/javascript">
    var currentDate = new Date();
    $('#ngay_bao_cao').val(currentDate.toISOString().slice(0, 10));
    $('#ngay_bao_cao').change(function(){

    });
</script>