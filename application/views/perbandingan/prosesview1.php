<script type="text/javascript">
    function proseshitung() {
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: "<?= base_url('Perbandingan/proseshitung'); ?>",
            error: function () {
                $("#respon").html('Proses hitung seleksi supplier gagal');
                $("#error").show();
            },
            beforeSend: function () {
                $("#error").hide();
                $("#respon").html("Sedang bekerja, tunggu sebentar");
            },
            success: function (x) {
                if (x.status == "ok") {
                    alert('Proses seleksi berhasil. Halaman akan direfresh');
                    window.location = window.location;
                } else {
                    $("#respon").html('Proses hitung seleksi Alternatif gagal');
                    $("#error").show();
                }
            },
        });
    }
</script>

<div id="respon" class="hidden-print"></div>


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Perankingan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Perankingan</li>
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Perangkingan Supplier</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <td>Kriteria/Subkriteria</td>
                                <td>Bobot</td>
                                <?php
                                foreach ($this->m_db->get as $rss) {
                                    echo '<td>' . $rss['detail'] . '</td>';
                                }
                                ?>
                            </thead>
                            <?php


                            $dAlternatif = $this->m_db->get_data('alternatif');
                            if (!empty($dAlternatif)) {

                                foreach ($dAlternatif as $rAlternatif) {
                                    $alternatifID = $rAlternatif->id_alternatif;
                                    $supplierID = $rAlternatif->id_supplier;
                                    $nama_supplier = field_value('supplier', 'id_supplier', $supplierID, 'nama_supplier');

                                    ?>
                                    <tr>
                                        <td>
                                            <?= $nama_supplier; ?>
                                        </td>
                                        <?php
                                        $total = 0;
                                        if (!empty($dKriteria)) {
                                            foreach ($dKriteria as $rKriteria) {
                                                $kriteriaid = $rKriteria->id_kriteria;
                                                $subkriteria = alternatif_nilai($alternatifID, $kriteriaid);
                                                $nilaiID = field_value('subkriteria', 'id_subkriteria', $subkriteria, 'id_nilai');
                                                $nilai = field_value('nilai_kategori', 'id_nilai', $nilaiID, 'nama_nilai');
                                                $prioritas = ambil_prioritas($subkriteria);
                                                echo '<td>' . number_format((float) $prioritas, 2) . '</td>';
                                            }
                                        }
                                        ?>
                                        <td>
                                            <?= number_format($total, 2); ?>
                                        </td>
                                        <!-- <td><?= ucwords($rAlternatif->status); ?></td> -->

                                    </tr>
                                    <?php

                                }
                            } else {
                                return false;
                            }
                            ?>

                        </table>
                        <a href="javascript:;" onclick="proseshitung();" class="btn btn-sm btn-primary btn-md mt-2">
                            Hitung</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>