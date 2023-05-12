<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data User</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- <div style="margin-top: 8px" id="message" class="swalDefaultSuccess">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
</div> -->


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <?php
                        if ($this->session->flashdata('gagal')) {
                            echo  "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" . $this->session->flashdata('gagal') . "</div>";
                        } else if ($this->session->flashdata('sukses')) {
                            echo  "<div class='alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" . $this->session->flashdata('sukses') . "</div>";
                        }
                        ?>
                        <div id="infoMessage"><?php echo $message; ?></div>
                        <?= anchor('admin/auth/create_group', 'Tambah Grup', array('class' => 'btn btn-primary btn-sm')); ?>
                        <div class="card-tools">
                            <form action="" class="form-inline" method="get">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="q" class="form-control float-right" placeholder="Search" value="">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Grup</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <?php foreach ($user->groups as $group) : ?>
                                                <?php echo anchor('admin/auth/edit_group/' . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'), array('class' => 'badge badge-secondary badge-roundless')); ?>
                                            <?php endforeach ?>
                                        </td>
                                        <td><?php echo ($user->active) ? anchor("admin/auth/deactivate/" . $user->id, lang('index_active_link'), array('class' => 'badge badge-success badge-roundless')) : anchor("admin/auth/activate/" . $user->id, lang('index_inactive_link'), array('class' => 'badge badge-secondary badge-roundless')); ?>
                                        </td>
                                        <td style="text-align:center" width="200px">
                                            <?php
                                            echo anchor(site_url('admin/auth/create_user'), '<button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>');
                                            echo ' ';
                                            echo anchor(site_url('admin/auth/edit_user/' . $user->id), '<button class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></button>');
                                            ?>
                                            <button class="btn btn-danger btn-sm" data-href="<?php echo base_url('auth/delete_user/' . $user->id) ?>" data-toggle="modal" data-target="#confirm-delete"><i class="far fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>