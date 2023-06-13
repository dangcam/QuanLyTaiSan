<style>
    #response_danger_modal{display: none}
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_title_type_asset')?></h4>
                </div>
            </div>
        </div>
        <!------------------>
        <div class="row">
            <div class="col-lg-12">
                <!---->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?=lang('AppLang.page_title_type_asset')?></h4>
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
                                    <th scope="col"><?=lang('LoaiTaiSanLang.type_asset_id')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.type_asset_name')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.category')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.asset_group')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.rate_of_wear')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.number_of_year')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.note')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.original_price')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.depreciation')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.subsection')?></th>
                                    <th scope="col"><?=lang('LoaiTaiSanLang.use')?></th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><?=lang('LoaiTaiSanLang.type_asset_id')?></th>
                                    <th><?=lang('LoaiTaiSanLang.type_asset_name')?></th>
                                    <th><?=lang('LoaiTaiSanLang.category')?></th>
                                    <th><?=lang('LoaiTaiSanLang.asset_group')?></th>
                                    <th><?=lang('LoaiTaiSanLang.rate_of_wear')?></th>
                                    <th><?=lang('LoaiTaiSanLang.number_of_year')?></th>
                                    <th><?=lang('LoaiTaiSanLang.note')?></th>
                                    <th><?=lang('LoaiTaiSanLang.original_price')?></th>
                                    <th><?=lang('LoaiTaiSanLang.depreciation')?></th>
                                    <th><?=lang('LoaiTaiSanLang.subsection')?></th>
                                    <th><?=lang('LoaiTaiSanLang.use')?></th>
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