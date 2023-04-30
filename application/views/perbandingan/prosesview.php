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
                <div class="card card-blue card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Perangkingan Supplier</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p>Setelah menemukan bobot dari masing-masing kriteria terhadap alternatif yang sudah
                            ditentukan,
                            langkah selanjutnya adalah mengalikan bobot prioritas kriteria dengan bobot dari
                            masing-masing
                            alternatif, kemudian hasil perkalian tersebut dijumlahkan perbaris. Sehingga didapatkan
                            total
                            prioritas global seperti pada tabel berikut.</p>
                        <div id="ctkhsl">
                            <div class="table-responsive">
                                <table class='table table-bordered table-striped' border="1" width='100%'>

                                    <thead>
                                        <th width="15%">Kriteria</th>
                                        <th colspan="2" width="30%" class="text-center">Sub-kriteria | Bobot Prioritas
                                        </th>
                                        <th colspan="2" width="30%" class="text-center">Sub-kriteria | Bobot Prioritas
                                        </th>
                                    </thead>
                                    <?php
                                    foreach ($kriteria as $k => $v) {

                                        // Kriteria
                                        echo '<tr>';
                                        echo  '<td>' . $v->nama_kriteria . '(' . $v->prioritas . ')' . '</td>';



                                        foreach ($subkriteria as $k2 => $v2) {
                                            if (!($v2->id_kriteria == $v->id_kriteria)) { // skip even members
                                                continue;
                                            }
                                            echo  '<td> SK-' . $v2->id_subkriteria . ' (' . $v2->prioritas . ')' . '</td>';
                                            echo  '<td>' . $v->prioritas * $v2->prioritas . '</td>';
                                        }
                                        echo '</tr>';
                                    }

                                    ?>


                                </table>
                            </div>


                            <table id="example2" class="table table-bordered table-hover">

                                <thead>
                                    <th>Subkriteria</th>
                                    <th>Bobot Global</th>
                                    <?php
                                    foreach ($alternatif as $k => $v) {
                                        echo '<th>';
                                        echo  $v->nama_supplier;
                                        echo '</th>';
                                    }
                                    ?>
                                </thead>
                                <?php
                                foreach ($kriteria as $k => $v) {

                                    // SubKriteria
                                    echo '</tr>';
                                    foreach ($subkriteria as $k2 => $v2) {
                                        if (!($v2->id_kriteria == $v->id_kriteria)) { // skip even members
                                            continue;
                                        }
                                        echo '<tr>';
                                        echo  '<td>    ' . $v2->nama_subkriteria . '</td>';
                                        echo  '<td>' . $v->prioritas * $v2->prioritas . '</td>';
                                        // looping data alternatif
                                        foreach ($alternatif as $k3 => $v3) {
                                            $hasilAlt = "-";
                                            // mencari nilai alternatif
                                            foreach ($v3->nilai as $key => $value) {
                                                if ($value->subkriteriaid == $v2->id_subkriteria) {
                                                    $hasilAlt =  $v->prioritas * $v2->prioritas * $value->prioritas;
                                                    break;
                                                }
                                            }
                                            echo '<td>';
                                            echo $hasilAlt;
                                            echo '</td>';

                                            if (!is_numeric($hasilAlt)) {
                                                $hasilAlt = 0;
                                            }
                                            $alternatif[$k3]->total += $hasilAlt;
                                        }
                                        echo '</tr>';
                                    }
                                }
                                echo '<tr>';
                                echo  '<td>Total</td>';
                                echo  '<td></td>';
                                // looping data alternatif
                                foreach ($alternatif as $k3 => $v3) {
                                    echo '<td>';
                                    echo $v3->total;
                                    echo '</td>';


                                    $rank[$v3->nama_supplier] = $v3->total;
                                }
                                echo '</tr>';
                                arsort($rank);
                                ?>


                            </table>
                            <div class="row">
                                <div class='col-md-5 mt-3'>
                                    <h3>Perangkingan :</h3>
                                    <table class='table table-bordered table-striped' border="1" width='100%'>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nilai</th>
                                            <th>Rangking</th>
                                        </tr>
                                        <?php $ra = 0;
                                        foreach ($rank as $k => $v) {
                                            $ra++;
                                            if ($ra == 1) {
                                                $bg = "bg-gold";
                                            } else if ($ra == 2) {
                                                $bg = "bg-silver";
                                            } else if ($ra == 3) {
                                                $bg = "bg-brown";
                                            } else {
                                                $bg = "";
                                            }
                                            echo "<tr class='$bg'>";
                                            echo "<td>" . $k . "</td><td>" . $v . "</td></td><td align='center'>" . $ra . "</td>";
                                            echo "</tr>";
                                        } ?>
                                    </table>
                                </div>

                                <div class="col-md-7 mt-3">
                                    <p class="text-center"><strong>Grafik Hasil Perhitungan AHP</strong></p>
                                    <div class="card">
                                        <div id="grafahp" class="card-body">
                                            <?php $n = 1;
                                            $bg = ['', 'primary', 'green', 'warning', 'danger'];
                                            foreach ($rank as $k => $v) {
                                                if ($n <= 4) {
                                                    $abg = $bg[$n];
                                                } else {
                                                    $abg = 'secondary';
                                                }
                                                $n++; ?>
                                                <div class='progress-group'>
                                                    <?= $k ?>
                                                    <span class='float-right'>
                                                        <b><?= number_format($v * 100, 2, ',', '.') ?>%</b>
                                                    </span>
                                                    <div class='progress progress-sm'>
                                                        <div class='progress-bar bg-<?= $abg ?>' style='width: <?= number_format($v * 100, 2) ?>%'></div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type='button' onclick='cetak()' class='btn bg-gradient-blue'><i class='fa fa-print'></i>
                            Cetak
                            Hasil Perhitungan</button>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


<script>
    $("#appbd").addClass("sidebar-collapse");

    function cetak() {
        var printContents = document.getElementById('ctkhsl').innerHTML;
        var width = window.innerWidth * 0.75;
        var height = width * window.innerHeight / window.innerWidth;
        var ctkWin = window.open('<?php echo base_url('perbandingan/cetak') ?>', 'newwindow', 'width=' + width +
            ', height=' +
            height + ', top=' + ((window.innerHeight - height) / 2) + ', left=' + ((window.innerWidth - width) / 2))
        printContents = printContents.replace(/table table-bordered table-striped/g, "");
        ctkWin.onload = function() {
            ctkWin.document.getElementById('tctk').innerHTML = printContents;
            ctkWin.window.print();
        }
    }
</script>