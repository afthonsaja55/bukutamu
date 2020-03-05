<div class="login-box">
    <div class="login-box-body">
        <center>
            <h1 class="h4 text-gray-900 mb-4"><img src="<?= base_url(); ?>assets/img/logokppn.png"></h1>
        </center>
        <br>
        <?= $this->session->flashdata('message') ?>
        <form action="<?= base_url('auth'); ?>" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email..." value="<?= set_value('email'); ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
            <br>
            <center>
                <a class="btn small btn-success" href="<?= base_url('bukutamu'); ?>">
                    <i class="fa fa-angle-double-left"></i> Back To Bukutamu
                </a>
            </center>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->