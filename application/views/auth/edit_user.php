<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Pengguna </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">
                        Update Pengguna
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
                    <div class="panel-body">
                        <?php echo form_open(uri_string(), array('form' => 'form', 'class' => 'form-horizontal form-groups-bordered')); ?>
                        <?php echo form_hidden('id', $user->id); ?>
                        <?php echo form_hidden($csrf); ?>
                        <div class="card-body">
                            <h1 style="text-align: center;"><?php echo lang('edit_user_heading'); ?></h1>
                            <p style="text-align: center;"><?php echo lang('edit_user_subheading'); ?></p>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>

                                <div class="col-sm-12">
                                    <div id="infoMessage"><?php echo $message; ?></div>
                                    <?php echo lang('edit_user_fname_label', 'first_name'); ?> <br />
                                    <div class="input-group minimal">
                                        <?php echo form_input($first_name); ?>
                                        <span class="input-group-addon"><i class="entypo-user"></i></span>
                                    </div>
                                    <br>

                                    <?php echo lang('edit_user_lname_label', 'last_name'); ?> <br />
                                    <div class="input-group minimal">
                                        <?php echo form_input($last_name); ?>
                                        <span class="input-group-addon"><i class="entypo-user"></i></span>
                                    </div>
                                    <br />

                                    <?php echo lang('edit_user_company_label', 'company'); ?> <br />
                                    <div class="input-group minimal">
                                        <?php echo form_input($company); ?>
                                        <span class="input-group-addon"><i class="entypo-user"></i></span>
                                    </div>
                                    <br>

                                    <?php echo lang('edit_user_phone_label', 'phone'); ?> <br />
                                    <div class="input-group minimal">
                                        <?php echo form_input($phone); ?>
                                        <span class="input-group-addon"><i class="entypo-user"></i></span>
                                    </div>
                                    <br>

                                    <?php echo lang('edit_user_password_label', 'password'); ?> <br />
                                    <div class="input-group minimal">
                                        <?php echo form_input($password); ?>
                                        <span class="input-group-addon"><i class="entypo-lock"></i></span>
                                    </div>
                                    <br>

                                    <?php echo lang('edit_user_password_confirm_label', 'password_confirm'); ?><br />
                                    <div class="input-group minimal">
                                        <?php echo form_input($password_confirm); ?>
                                        <span class="input-group-addon"><i class="entypo-lock"></i></span>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <?php if ($this->ion_auth->is_admin()) : ?>
                                            <h3><?php echo lang('edit_user_groups_heading'); ?></h3>
                                            <?php foreach ($groups as $group) : ?>
                                                <label class="checkbox">
                                                    <?php
                                                    $gID = $group['id'];
                                                    $checked = null;
                                                    $item = null;
                                                    foreach ($currentGroups as $grp) {
                                                        if ($gID == $grp->id) {
                                                            $checked = ' checked="checked"';
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                                    <div class="checkbox checkbox-replace">
                                                        <input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo $checked; ?>>
                                                        <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                                    </div>
                                                </label>
                                            <?php endforeach ?>

                                        <?php endif ?>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-default">Edit
                                            Pengguna</button>
                                        <?= anchor('admin/Auth', 'Batal', array('class' => 'btn btn-danger')) ?>

                                    </div>
                                </div>

                                <?php echo form_close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>