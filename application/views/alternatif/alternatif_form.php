<!-- get alternatif -->
<script type="text/javascript">
$(document).ready(function() {
    $("select").select2();
});
</script>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Alternatif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Alternatif</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"> Tambah Alternatif</h3>
            </div>
            <?= form_open('Alternatif/create'); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Alternatif</label>
                            <select class="form-control select2" name="id_supplier" style="width: 100%;">
                                <?php
                                if (!empty($supplier)) {
                                    foreach ($supplier as $s) {
                                ?>
                                <option value='<?php echo $s->id_supplier ?>'><?php echo $s->nama_supplier ?></option>
                                <?php }
                                } else { ?>
                                <option class="form-control"> Semua Supplier sudah terdaftar</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <h5>Penilaian Alternatif</h5>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <th>Kriteria</th>
                                <th>Sub-Kriteria</th>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($kriteria)) {
                                    foreach ($kriteria as $rk) {
                                        $kriteriaid = $rk->id_kriteria;
                                        echo '<tr>';
                                        echo '<td>' . $rk->nama_kriteria . '</td>';
                                        echo '<td>';
                                        $dSub = $this->m_db->get_data('subkriteria', array('id_kriteria' => $kriteriaid));
                                        if (!empty($dSub)) {
                                            echo '<select name="kriteria[' . $kriteriaid . ']"  class="form-control" data-placeholder="Pilih Sub-Kriteria" required style="width: 100%">';
                                            echo '<option></option>';
                                            foreach ($dSub as $rSub) {
                                                $o = '';
                                                echo '<option value="' . $rSub->id_subkriteria . '">' . $o = $rSub->nama_subkriteria . '</option>';
                                            }
                                            echo '</select>';
                                        }
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                if (!empty($supplier)) {
                ?>
                <button type="submit" name="submit" class="btn btn-sm btn-primary btn-flat">Tambah</button>
                <a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
                <?php } else { ?>
                <button type="submit" name="submit" class="btn btn-sm btn-primary btn-flat" disabled>Tambah</button>
                <a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
                <?php } ?>

            </div>
        </div>
        <?= form_close(); ?>
    </div>
</section>