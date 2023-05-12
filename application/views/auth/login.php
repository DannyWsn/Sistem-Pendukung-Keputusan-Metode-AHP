<!-- /.login-logo -->
<div class="card card-outline card loginadm">
    <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>SPK</b> AHP</a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Masukan email dan password untuk masuk</p>
        <div id="infoMessage">
            <?php echo $message; ?>
        </div>
        <?php echo form_open("admin/Auth/login", array("role" => "form")); ?>
        <div class="input-group mb-3">
            <?php echo form_input($identity); ?>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <?php echo form_input($password); ?>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">

                <div class="form-group pull-left">
                    <div class="cicheck-primary">
                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
                        <?php echo lang('login_remember_label', 'remember'); ?>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">

            </div>
            <!-- /.col -->
        </div>


        <div class="social-auth-links text-center mt-2 mb-3">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-login">
                <i class="entypo-login"></i>
                Sign In
            </button>
        </div>
        <!-- /.social-auth-links -->


        <?php echo form_close(); ?>
        <p class="mb-1">
            <?php echo anchor('admin/Auth/forgot_password', lang('login_forgot_password')); ?>
        </p>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->