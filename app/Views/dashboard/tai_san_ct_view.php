<div class="content-body">
    <div class="container-fluid">
        <form>
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                            <h4><?=lang('TaiSanLang.add_taisan')?></h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <select class="form-control" id="val-skill" name="val-skill">
                                <option value="">Please select</option>
                                <option value="html">HTML</option>
                                <option value="css">CSS</option>
                                <option value="javascript">JavaScript</option>
                                <option value="angular">Angular</option>
                                <option value="angular">React</option>
                                <option value="vuejs">Vue.js</option>
                                <option value="ruby">Ruby</option>
                                <option value="php">PHP</option>
                                <option value="asp">ASP.NET</option>
                                <option value="python">Python</option>
                                <option value="mysql">MySQL</option>
                            </select>
                        </div>
                        <button type="button" onclick="location.href='<?= base_url() ?>dashboard/tai_san'"
                                id="btn_cancel" class="btn btn-warning"><?=lang('AppLang.cancel')?></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?=lang('TaiSanLang.thong_tin_chung')?></h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="1234 Main St">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>City</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>State</label>
                                        <select id="inputState" class="form-control">
                                            <option selected="">Choose...</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Zip</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            Check me out
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?=lang('TaiSanLang.thong_tin_hm')?></h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label><?=lang('TaiSanLang.ngay_mua')?></label>
                                            <input type="text" class="form-control" placeholder="" id="mdate" data-dtp="dtp_fyJxr">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>City</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>State</label>
                                            <select id="inputState" class="form-control">
                                                <option selected="">Choose...</option>
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Zip</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label">
                                                Check me out
                                            </label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<!-- Daterangepicker -->
<!-- momment js is must -->
<script src="vendor/moment/moment.min.js"></script>
<script src="vendor/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- clockpicker -->
<script src="vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<!-- asColorPicker -->
<script src="vendor/jquery-asColor/jquery-asColor.min.js"></script>
<script src="vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
<script src="vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
<!-- Material color picker -->
<script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!-- pickdate -->
<script src="vendor/pickadate/picker.js"></script>
<script src="vendor/pickadate/picker.time.js"></script>
<script src="vendor/pickadate/picker.date.js"></script>



<!-- Daterangepicker -->
<script src="js/plugins-init/bs-daterange-picker-init.js"></script>
<!-- Clockpicker init -->
<script src="js/plugins-init/clock-picker-init.js"></script>
<!-- asColorPicker init -->
<script src="js/plugins-init/jquery-asColorPicker.init.js"></script>
<!-- Material color picker init -->
<script src="js/plugins-init/material-date-picker-init.js"></script>
<!-- Pickdate -->
<script src="js/plugins-init/pickadate-init.js"></script>