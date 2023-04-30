<?php

$jumlah = count($arr);
?>
<script type="text/javascript">
    $(document).ready(function() {

        <?php
        if (!empty($arr)) {
        ?>
            hitungMatrixKriteria();
        <?php
        }
        ?>

        $(".inputnumberkriteria").each(function() {
            $(this).change(function() {
                // hitung();
                var dtarget = $(this).attr('data-target');
                var dkolom = $(this).attr('data-kolom');
                var jumlah = $(this).val();
                var rumus = 1 / parseFloat(jumlah);
                var fx = rumus;
                $("#" + dtarget).val(fx.toFixed(2));


                hitungMatrixKriteria()
            });
        });

    });

    function hitungMatrixKriteria() {
        totalkriteria();
        mnkkriteria();
        mptbkriteria();
        rkkriteria();
    }

    $("#formentrikriteria").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: "<?= base_url(); ?>Perbandingan/updateutama",
            data: $(this).serialize(),
            error: function() {
                shownoticekriteria('danger', 'Gagal menyimpan data');
                $("#formentrikriteria select").removeAttr("disabled");
                $("#formentrikriteria button").removeAttr("disabled");
            },
            beforeSend: function() {
                $("#formentrikriteria select").attr('disabled', 'disabled');
                $("#formentrikriteria button").attr('disabled', 'disabled');
                shownoticekriteria('info', 'Tunggu sebentar,lagi menyimpan data');
            },
            success: function(x) {
                if (x.status == "ok") {
                    $("#prioformkriteria").trigger('submit');
                    shownoticekriteria('success', x.msg);
                } else {
                    shownoticekriteria('danger', x.msg);
                }
                $("#formentrikriteria select").removeAttr("disabled");
                $("#formentrikriteria button").removeAttr("disabled");
            },
        });
    });

    $("#prioformkriteria").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: "<?= base_url(); ?>Perbandingan/updateutamaprioritas",
            data: $(this).serialize(),
            error: function() {

            },
            beforeSend: function() {
                console.log($(this).serialize());
            },
            success: function(x) {

            },
        });
    });

    function shownoticekriteria(tipe, pesan) {
        $("#respon").html('<div class="alert alert-' + tipe + '">' + pesan + '</div>');
        $("#respon").show('fadeIn');
        if ($("#respon").is(":visible")) {
            setTimeout(function() {
                $("#respon").hide('fadeOut');
            }, 3000);
        }
    }

    function showmatrikkriteria() {
        $("#matrikdiv").toggle('fade');
    }

    function totalkriteria() {
        for (i = 1; i <= <?= $jumlah; ?>; i++) {
            var sum = 0;
            $(".kolom" + i).each(function() {
                var n = $(this).val();
                if (n == undefined || n == '') {
                    n = 0;
                }
                sum += parseFloat(n);
            });
            var fx = sum + 1;
            $("#total" + i).val(fx.toFixed(2));
        }
    }

    function mnkkriteria() {
        for (i = 1; i <= <?= $jumlah; ?>; i++) {
            var jml = 0;
            for (x = 1; x <= <?= $jumlah; ?>; x++) {
                var vtarget = $("#k" + i + "b" + x).val();
                var vkolom = $("#total" + x).val();
                var rumus = parseFloat(vtarget) / parseFloat(vkolom);
                var fx = rumus;
                jml += parseFloat(rumus);
                $("#mn-k" + i + "b" + x).val(fx.toFixed(2));
                //$("#mn-k"+i+"b"+x).val(i+" "+x);						
            }
            var jumlahmnk = jml;
            var prio = parseFloat(jml) / parseFloat(<?= $jumlah; ?>);
            var totprio = prio;
            $("#jml-b" + i).val(jumlahmnk.toFixed(2));
            $("#pri-b" + i).val(totprio.toFixed(2));

        }
    }


    function mptbkriteria() {
        for (i = 1; i <= <?= $jumlah; ?>; i++) {
            var jml = 0;
            for (x = 1; x <= <?= $jumlah; ?>; x++) {
                var prio = $("#pri-b" + x).val();
                var nilai = $("#k" + i + "b" + x).val();
                var rumus = parseFloat(nilai) * parseFloat(prio);
                var fx = rumus;
                jml += parseFloat(rumus);
                //$("#mptb-k"+i+"b"+x).val(prio+"*"+nilai);
                $("#mptb-k" + i + "b" + x).val(fx.toFixed(2));
            }
            var jumlahmnk = jml;
            $("#jmlmptb-b" + i).val(jumlahmnk.toFixed(2));
        }
    }


    function rkkriteria() {
        const irList = [
            0.00,
            0.00,
            0.00,
            0.58,
            0.90,
            1.12,
            1.24,
            1.32,
            1.41,
            1.45,
            1.49,
            1.51,
            1.48,
            1.56,
            1.57,
            1.59,
        ];

        var jumlah = <?= $jumlah; ?>;
        var ir = irList[jumlah];
        var total = 0;
        for (i = 1; i <= jumlah; i++) {
            var prio = $("#pri-b" + i).val();
            var jml = $("#jmlmptb-b" + i).val();
            var hasil = parseFloat(jml) / parseFloat(prio);
            var fx = hasil;
            total += hasil;
            $("#jmlrk-b" + i).val(jml);
            $("#priork-b" + i).val(prio);
            $("#hasilrk-b" + i).val(fx.toFixed(2));
        }
        var fx2 = total / parseFloat(jumlah);
        $("#totalrk").val(fx2.toFixed(2));
        $("#sumrk").val(fx2.toFixed(2));
        var summaks = parseFloat(total) / parseFloat(jumlah);
        var fx_summaks = summaks;
        $("#summaks").val(fx_summaks.toFixed(2));
        var ci = ((parseFloat(summaks) - parseFloat(jumlah)) / (parseFloat(jumlah) - 1));
        var fx_ci = ci;
        $("#sumci").val(fx_ci.toFixed(2));
        var cr = parseFloat(ci) / parseFloat(ir);
        var fx_cr = cr;
        $("#sumcr").val(fx_cr.toFixed(2));
        $("#crvalue").val(fx_cr.toFixed(2));
    }



    function showsubkriteria() {
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: "<?= base_url('Perbandingan/getsubcontainer'); ?>",
            data: "",
            error: function() {
                $("#matrik").html('Gagal mengambil data matrik sub kriteria');
            },
            beforeSend: function() {
                $("#matrik").html('Mengambil data matrik sub kriteria. Tunggu sebentar');
            },
            success: function(x) {
                $("#matrik").html(x);
            },
        });
    }

    function showAlternatif() {
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: "<?= base_url('Perbandingan/getaltcontainer'); ?>",
            data: "",
            error: function() {
                $("#matrik").html('Gagal mengambil data matrik alternatif');
            },
            beforeSend: function() {
                $("#matrik").html('Mengambil data matrik alternatif. Tunggu sebentar');
            },
            success: function(x) {
                $("#matrik").html(x);
            },
        });
    }
</script>

<div id="respon"></div>

<div id="entri" class="col-md-12">
    <?php
    echo form_open('#', array('class' => 'form-horizontal', 'id' => 'formentrikriteria'));
    ?>
    <input type="hidden" name="crvalue" id="crvalue" />
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <th colspan="<?= $jumlah + 1; ?>" class="text-center">Matrik Perbandingan Berpasangan</th>
                </thead>
                <thead>
                    <th class="text-center">Kriteria</th>
                    <?php
                    foreach ($arr as $k => $v) {
                    ?>
                        <th class="text-center"><?= $v; ?></th>
                    <?php
                    }
                    ?>
                </thead>
                <tbody>
                    <?php
                    $noUtama = 0;
                    foreach ($arr as $k2 => $v2) {
                        $noUtama += 1;
                        //array_shift($xxx);
                        echo '<tr>';
                        echo '<td class="text-center">' . $v2 . '</td>';
                        $noSub = 0;
                        $xxx = '';
                        for ($i = 1; $i <= $jumlah; $i++) {
                            $keys = array_keys($arr);
                            $xxx = $keys[array_search("gsda", $keys) + ($i - 1)];
                            $newname = $k2 . "[" . $xxx . "]";
                            $noSub += 1;
                            if ($noSub == $noUtama) {
                                echo '<td class="col-xs-1"><input type="number" id="k' . $noUtama . 'b' . $noSub . '" class="bg-blue form-control form-control-sm baris' . $noSub . '" value="1" readonly="" title="kolom' . $noSub . '"/></td>';
                            } else {

                                if ($noUtama > $noSub) {
                                    $nilai = ambil_nilai_kriteria($k2, $xxx);
                                    echo '<td><input type="text" name="' . $newname . '" id="k' . $noUtama . 'b' . $noSub . '" class="form-control form-control-sm inputnumberkriteria kolom' . $noSub . '" data-target="k' . $noSub . 'b' . $noUtama . '" data-kolom="' . $noSub . '" value="' . $nilai . '"  title="kolom' . $noSub . '"/></td>';
                                } else {
                                    $nilai = ambil_nilai_kriteria($k2, $xxx);
                                    echo '<td><input type="text" name="' . $newname . '" id="k' . $noUtama . 'b' . $noSub . '" class="form-control form-control-sm inputnumberkriteria kolom' . $noSub . '" data-target="k' . $noSub . 'b' . $noUtama . '" data-kolom="' . $noSub . '" value="' . $nilai . '"  title="kolom' . $noSub . '"/></td>';
                                }
                            }
                        }
                        echo '</tr>';
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Jumlah</td>
                        <?php
                        for ($h = 1; $h <= $jumlah; $h++) {
                        ?>
                            <td><input type="text" id="total<?= $h; ?>" class="form-control form-control-sm" value="0" title="total<?= $h; ?>" readonly="" /></td>
                        <?php
                        }
                        ?>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="pull-left">
        <!-- <a href="javascript:;" onclick="hitung();" class="btn btn-primary">Hitung</a>  -->
        <a href="javascript:;" onclick="showmatrikkriteria();" class="btn btn-info">Lihat Matriks</a>
        <button type="submit" name="submit" class="btn btn-success">Simpan Kriteria</button>
    </div>
    <?php
    echo form_close();
    ?>
</div>
<br><br><br>
<div id="matrikdiv" class="col-md-12" style="display: none">

    <div class="table-responsive">
        <?php echo form_open('#', array('id' => 'prioformkriteria')); ?>
        <table class="table table-bordered table-striped">
            <thead>
                <th colspan="<?= $jumlah + 3; ?>" class="text-center">Matrik Nilai Kriteria</th>
            </thead>
            <thead>
                <th class="text-center">Kriteria</th>
                <?php
                foreach ($arr as $k => $v) {
                ?>
                    <th class="text-center"><?= $v; ?></th>
                <?php
                }
                ?>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Prioritas</th>
            </thead>
            <tbody>
                <?php
                $noUtama2 = 0;
                foreach ($arr as $k2 => $v2) {
                    $noUtama2 += 1;
                    echo '<tr>';
                    echo '<td class="text-center">' . $v2 . '</td>';
                    $noSub2 = 0;
                    for ($i = 1; $i <= $jumlah; $i++) {
                        $noSub2 += 1;
                        echo '<td><input type="text" id="mn-k' . $noUtama2 . 'b' . $noSub2 . '" class="bg-white form-control form-control-sm" value="0" readonly=""/></td>';
                    }
                    echo '<td><input type="text" class="bg-white form-control form-control-sm" id="jml-b' . $noUtama2 . '" value="0" readonly=""/></td>';
                    echo '<td><input type="text" name="prio[' . $k2 . ']" class="bg-white form-control form-control-sm" id="pri-b' . $noUtama2 . '" value="0" readonly=""/></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <?php
        echo '<button type="submit" class="btn btn-success" style="display:none;">Simpan Prioritas</button>';
        echo form_close();
        ?>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <th colspan="<?= $jumlah + 1; ?>" class="text-center">Matrik Penjumlahan Tiap Baris</th>
            </thead>
            <thead>
                <th class="text-center">Kriteria</th>
                <?php
                foreach ($arr as $k => $v) {
                ?>
                    <th class="text-center"><?= $v; ?></th>
                <?php
                }
                ?>
                <th class="text-center">Jumlah</th>
            </thead>
            <tbody>
                <?php
                $noUtama3 = 0;
                foreach ($arr as $k3 => $v3) {
                    $noUtama3 += 1;
                    echo '<tr>';
                    echo '<td class="text-center">' . $v3 . '</td>';
                    $noSub3 = 0;
                    for ($i = 1; $i <= $jumlah; $i++) {
                        $noSub3 += 1;
                        echo '<td><input type="text" id="mptb-k' . $noUtama3 . 'b' . $noSub3 . '" class="bg-white form-control form-control-sm" value="0" readonly=""/></td>';
                    }
                    echo '<td><input type="text" class="bg-white form-control form-control-sm" id="jmlmptb-b' . $noUtama3 . '" value="0" readonly=""/></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <th colspan="<?= $jumlah + 1; ?>" class="text-center">Rasio Konsistensi</th>
            </thead>
            <thead>
                <th>Kriteria</th>
                <th>Jumlah Per Baris</th>
                <th>Prioritas</th>
                <th>Hasil</th>
            </thead>
            <tbody>
                <?php
                $noUtama4 = 0;
                foreach ($arr as $k4 => $v4) {
                    $noUtama4 += 1;
                    echo '<tr>';
                    echo '<td>' . $v4 . '</td>';
                    echo '<td><input type="text" class="bg-white form-control form-control-sm" id="jmlrk-b' . $noUtama4 . '" value="0" readonly=""/></td>';
                    echo '<td><input type="text" class="bg-white form-control form-control-sm" id="priork-b' . $noUtama4 . '" value="0" readonly=""/></td>';
                    echo '<td><input type="text" class="bg-white form-control form-control-sm" id="hasilrk-b' . $noUtama4 . '" value="0" readonly=""/></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" align="center"><b>TOTAL</b></td>
                    <td>
                        <input type="text" class="bg-white form-control form-control-sm" id="totalrk" value="0" readonly="" />
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <th colspan="<?= $jumlah + 1; ?>" class="text-center">Hasil Perhitungan</th>
            </thead>
            <thead>
                <th>Keterangan</th>
                <th>Nilai</th>
            </thead>
            <tbody>
                <tr>
                    <td>Jumlah</td>
                    <td>
                        <input type="text" class="bg-white form-control form-control-sm" id="sumrk" value="0" readonly="" />
                    </td>
                </tr>
                <tr>
                    <td>n(Jumlah Kriteria)</td>
                    <td>
                        <input type="text" class="bg-white form-control form-control-sm" id="sumkriteria" value="<?= $jumlah; ?>" readonly="" />
                    </td>
                </tr>
                <tr>
                    <td>Maks(Jumlah/n)</td>
                    <td>
                        <input type="text" class="bg-white form-control form-control-sm" id="summaks" value="0" readonly="" />
                    </td>
                </tr>
                <tr>
                    <td>CI((Maks-n)/n)</td>
                    <td>
                        <input type="text" class="bg-white form-control form-control-sm" id="sumci" value="0" readonly="" />
                    </td>
                </tr>
                <tr>
                    <td>CR(CI/IR)</td>
                    <td>
                        <input type="text" class="bg-white form-control form-control-sm" id="sumcr" value="0" readonly="" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>