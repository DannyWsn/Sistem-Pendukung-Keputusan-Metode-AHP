<?php $pag = $this->uri->segment(1); ?>
<?php $page = $this->uri->segment(2); ?>
<?php $pages = $this->uri->segment(3); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Update Sub-kriteria
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">
                        Update Sub-kriteria
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

                    <?php
                    if (empty($data)) {
                        redirect('');
                    }

                    foreach ($data as $row) {
                    }

                    echo validation_errors();
                    echo form_open('subkriteria/update_action' . $kriteria, array('class' => 'form-horizontal'));
                    ?>
                    <input type="hidden" name="subkriteria" value="<?= $row->id_subkriteria; ?>" />
                    <div class="card-body">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="">Kriteria Utama</label>
                            <select name="id_kriteria" class="form-control" required="">
                                <option>Pilih Kriteria Utama</option>
                                <?php
                                if (!empty($utama)) {
                                    foreach ($utama as $rutama) {
                                        $jj = '';
                                        if ($rutama->id_kriteria == $row->id_kriteria) {
                                            $jj = 'selected="selected"';
                                        }
                                        echo '<option value="' . $rutama->id_kriteria . '" ' . $jj . '>' . $rutama->nama_kriteria . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="field-1">Nama Sub-Kriteria</label>
                            <input type="text" name="nama_subkriteria" id="nama_subkriteria" class="form-control "
                                autocomplete="" placeholder="keterangan" required=""
                                value="<?= $row->nama_subkriteria ?>" />
                        </div>

                    </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary btn-flat">Ubah</button>
                    <a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    </div>
</section>