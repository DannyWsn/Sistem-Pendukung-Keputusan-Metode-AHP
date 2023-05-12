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
                        echo 'Tambah Supplier';
                    } else {
                        echo 'Update Supplier';
                    } ?>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">
                        <?php
                        if ($page == "create" || $page == "Create") {
                            echo 'Tambah Supplier';
                        } else {
                            echo 'Update Supplier';
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
                                <label for="varchar">Nama Supplier <?php echo form_error('nama_supplier') ?></label>
                                <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" placeholder="Nama Supplier" value="<?php echo $nama_supplier; ?>">
                            </div>

                            <div class="form-group">
                                <label for="alamat_supplier">Alamat Supplier
                                    <?php echo form_error('alamat_supplier') ?></label>
                                <textarea class="form-control" rows="3" name="alamat_supplier" id="alamat_supplier" placeholder="Alamat Supplier"><?php echo $alamat_supplier; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="varchar">Komoditi <?php echo form_error('komoditi') ?></label>
                                <input type="text" class="form-control" name="komoditi" id="komoditi" placeholder="No Telpon" value="<?php echo $komoditi; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="varchar">No Telpon <?php echo form_error('no_telpon') ?></label>
                                <input type="text" class="form-control" name="no_telpon" id="no_telpon" placeholder="No Telpon" value="<?php echo $no_telpon; ?>" />
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <input type="hidden" name="id_supplier" value="<?php echo $id_supplier; ?>" />
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                            <a href="<?php echo site_url('supplier') ?>" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>