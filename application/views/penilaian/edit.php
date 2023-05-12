<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Penilaian</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('penilaian'); ?>">Daftar Penilaian</a></li>
                    <li class="breadcrumb-item active">Update Penilaian</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?= form_open('penilaian/update/' . $penilaian->id_penilaian, ['class' => 'form-horizontal']) ?>
                <div class="card  card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Data Umum</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $penilaian->tanggal ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $penilaian->keterangan ?>">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= site_url('penilaian') ?>" class="btn btn-default float-right">Kembali</a>
                    </div>
                </div>
                <?= form_close() ?>
                <!-- /.card -->
            </div>

            <div class="col-12">
                <?php
                $this->load->view('perbandingan/perbandingan_list');
                ?>
            </div>


            <div class="col-12">
                <div id="perangkingan"></div>
            </div>

        </div>
    </div>


</section>

<script type="text/javascript">
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: "<?= base_url('Penilaian/rank'); ?>",
        data: $(this).serialize(),
        error: function() {
            $("#perangkingan").html('Gagal mengambil data perangkingan');
        },
        beforeSend: function() {
            $("#perangkingan").html('Mengambil data... Tunggu sebentar');
        },
        success: function(x) {
            $("#perangkingan").html(x);
        },
    });
</script>