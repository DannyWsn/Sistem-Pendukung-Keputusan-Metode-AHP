
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Penilaian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('penilaian'); ?>">Daftar Penilaian</a></li>
                        <li class="breadcrumb-item active">Tambah Penilaian</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo base_url('penilaian/store'); ?>" method="post">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo set_value('tanggal'); ?>">
                                    <?php echo form_error('tanggal'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" id="keterangan"><?php echo set_value('keterangan'); ?></textarea>
                                    <?php echo form_error('keterangan'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo base_url('penilaian'); ?>" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

