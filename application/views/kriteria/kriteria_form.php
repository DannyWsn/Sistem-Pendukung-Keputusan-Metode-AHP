<?php $pag = $this->uri->segment(1); ?>
<?php $page = $this->uri->segment(2); ?>
<?php $pages = $this->uri->segment(3); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <?php
                    if ($page == "create" || $page == "Create") {
                        echo 'Tambah Kriteria';
                    } else {
                        echo 'Update Kriteria';
                    } ?>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">
                        <?php
                        if ($page == "create" || $page == "Create") {
                            echo 'Tambah Kriteria';
                        } else {
                            echo 'Update Kriteria';
                        } ?>
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
                <!-- general form elements -->
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="varchar">Nama Kriteria <?php echo form_error('nama_kriteria') ?></label>
                                <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" placeholder="Nama Kriteria" value="<?php echo $nama_kriteria; ?>">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <input type="hidden" name="id_kriteria" value="<?php echo $id_kriteria; ?>" />
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                            <a href="<?php echo site_url('kriteria') ?>" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>