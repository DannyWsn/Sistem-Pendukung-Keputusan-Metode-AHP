<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Pengguna </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">
            Tambah Pengguna
          </li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <?= form_open('admin/auth/create_user', array('form' => 'form', 'class' => 'form-horizontal form-groups-bordered')); ?>
          <div class="card-body">
            <h1 style="text-align: center;"><?php echo lang('create_user_heading'); ?></h1>
            <p style="text-align: center;"><?php echo lang('create_user_subheading'); ?></p>
            <div class="form-group">
              <label class="col-sm-3 control-label"></label>

              <div class="col-sm-12">
                <div id="infoMessage"><?php echo $message; ?></div>
                <div class="input-group minimal">
                  <?php echo form_input($first_name); ?>
                  <span class="input-group-addon"><i class="entypo-user"></i></span>
                </div>
                <br>
                <div class="input-group minimal">
                  <?php echo form_input($last_name); ?>
                  <span class="input-group-addon"><i class="entypo-user"></i></span>
                </div>
                <br>
                <?php
                if ($identity_column !== 'email') {
                  echo '<p>';
                  echo lang('create_user_identity_label', 'identity');
                  echo '<br />';
                  echo form_error('identity');
                  echo form_input($identity);
                  echo '</p>';
                }
                ?>
                <div class="input-group minimal">
                  <?php echo form_input($email); ?>
                  <span class="input-group-addon"><i class="entypo-mail"></i></span>
                </div>

                <br />

                <div class="input-group minimal">
                  <?php echo form_input($company); ?>
                  <span class="input-group-addon"><i class="entypo-user"></i></span>
                </div>
                <br>

                <div class="input-group minimal">
                  <?php echo form_input($phone); ?>
                  <span class="input-group-addon"><i class="entypo-user"></i></span>
                </div>
                <br>

                <div class="input-group minimal">
                  <?php echo form_input($password); ?>
                  <span class="input-group-addon"><i class="entypo-lock"></i></span>
                </div>
                <br>

                <div class="input-group minimal">
                  <?php echo form_input($password_confirm); ?>
                  <span class="input-group-addon"><i class="entypo-lock"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-5">
                <button type="submit" name="submit" class="btn btn-primary">Buat
                  Pengguna</button>
                <?= anchor('admin/Auth', 'Batal', array('class' => 'btn btn-danger')) ?>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</section>