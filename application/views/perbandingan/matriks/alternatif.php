<?php
$jumlah = count($arr);
?>

<script>
    $(document).ready(function () {

        <?php
        if (!empty($arr)) {
            ?>
            hitung_matrik_alternatif();
            <?php
        }
        ?>

        $(".input_number_alternatif").each(function () {
            $(this).change(function () {

                var dtarget = $(this).attr('data-target');
                var dkolom = $(this).attr('data-kolom');
                var jumlah = $(this).val();
                jumlah = parseFloat(jumlah);
                if (jumlah > 9) {
                    jumlah = 9.0;
                }
                var fx = 1 / jumlah;
                $(this).val(jumlah.toFixed(2));
                $("#" + dtarget).val(fx.toFixed(2));


                hitung_matrik_alternatif()

            });
        });
    })

    function hitung_matrik_alternatif() {
        total_alternatif();
        mnk_alternatif();
        mptb_alternatif();
        rk_alternatif();
    }
    $("#form_entri_alternatif").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: "<?= base_url(); ?>Matriks/update_alternatif",
            data: $(this).serialize(),
            error: function () {
                show_notice_alternatif('danger', 'Gagal menyimpan data');
                $("#form_entri_alternatif select").removeAttr("disabled");
                $("#form_entri_alternatif button").removeAttr("disabled");
            },
            beforeSend: function () {
                $("#form_entri_alternatif select").attr('disabled', 'disabled');
                $("#form_entri_alternatif button").attr('disabled', 'disabled');
                show_notice_alternatif('info', 'Tunggu sebentar,lagi menyimpan data');
            },
            success: function (x) {
                if (x.status == "ok") {
                    $("#form_prio_alternatif").trigger('submit');
                    show_notice_alternatif('success', x.msg);
                } else {
                    show_notice_alternatif('danger', x.msg);
                }
                $("#form_entri_alternatif select").removeAttr("disabled");
                $("#form_entri_alternatif button").removeAttr("disabled");
            },
        });
    });


    $("#form_prio_alternatif").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: "<?= base_url(); ?>Matriks/update_alternatif_prioritas",
            data: $(this).serialize(),
            error: function () {

            },
            beforeSend: function () {
                console.log($(this).serialize());
            },
            success: function (x) {

            },
        });
    });

    function show_notice_alternatif(tipe, pesan) {
        $("#respon_alternatif").html('<div class="alert alert-' + tipe + '">' + pesan + '</div>');
        $("#respon_alternatif").show('fadeIn');
        if ($("#respon_alternatif").is(":visible")) {
            setTimeout(function () {
                $("#respon_alternatif").hide('fadeOut');
            }, 3000);
        }
    }

    function show_matrik_alternatif() {
        $("#div_matrik_alternatif").toggle('fade');
    }

    function total_alternatif() {
        for (i = 1; i <= <?= $jumlah; ?>; i++) {
            var sum = 0;
            $(".alternatif_kolom" + i).each(function () {
                var n = $(this).val();
                if (n == undefined || n == '') {
                    n = 0;
                }
                sum += parseFloat(n);
            });
            var fx = sum;
            $("#alternatif_total" + i).val(fx.toFixed(2));
        }
    }

    function mnk_alternatif() {
        var mm = [];
        for (i = 1; i <= <?= $jumlah; ?>; i++) {
            var jml = 0;
            for (x = 1; x <= <?= $jumlah; ?>; x++) {
                var vtarget = $("#alternatif_k" + i + "b" + x).val();
                var vkolom = $("#alternatif_total" + x).val();
                var rumus = parseFloat(vtarget) / parseFloat(vkolom);
                var fx = rumus;
                jml += parseFloat(rumus);
                $("#alternatif_mn-k" + i + "b" + x).val(fx.toFixed(2));
                //$("#mn-k"+i+"b"+x).val(i+" "+x);						
            }
            var jumlahmnk = jml;
            var prio = parseFloat(jml) / parseFloat(<?= $jumlah; ?>);
            var totprio = prio;
            $("#alternatif_jml-b" + i).val(jumlahmnk.toFixed(2));
            $("#alternatif_pri-b" + i).val(totprio.toFixed(2));
            mm.push(totprio);
        }
        maksprio = arrayMax(mm);
        mnk_2_alternatif();
    }

    function arrayMax(arr) {
        var len = arr.length,
            max = -Infinity;
        while (len--) {
            if (arr[len] > max) {
                max = arr[len];
            }
        }
        return max;
    };

    function mnk_2_alternatif() {
        var i = [];
        for (i = 1; i <= <?= $jumlah; ?>; i++) {
            var prio = $("#alternatif_pri-b" + i).val();
            var rumus = parseFloat(prio) / parseFloat(maksprio);
            $("#alternatif_prisub-b" + i).val(rumus.toFixed(2));
            $("#alternatif_prisub-bhasil" + i).val(rumus.toFixed(2));
        }
    }

    function mptb_alternatif() {
        for (i = 1; i <= <?= $jumlah; ?>; i++) {
            var jml = 0;
            for (x = 1; x <= <?= $jumlah; ?>; x++) {
                var prio = $("#alternatif_pri-b" + x).val();
                var nilai = $("#alternatif_k" + i + "b" + x).val();
                var rumus = parseFloat(nilai) * parseFloat(prio);
                var fx = rumus;
                jml += parseFloat(rumus);
                //$("#mptb-k"+i+"b"+x).val(prio+"*"+nilai);
                $("#alternatif_mptb-k" + i + "b" + x).val(fx.toFixed(2));
            }
            var jumlahmnk = jml;
            $("#alternatif_jmlmptb-b" + i).val(jumlahmnk.toFixed(2));
        }
    }

    function rk_alternatif() {
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
            var prio = $("#alternatif_pri-b" + i).val();
            var jml = $("#alternatif_jmlmptb-b" + i).val();
            var hasil = parseFloat(jml) / parseFloat(prio);
            var fx = hasil;
            total += hasil;
            $("#alternatif_jmlrk-b" + i).val(jml);
            $("#alternatif_priork-b" + i).val(prio);
            $("#alternatif_hasilrk-b" + i).val(fx.toFixed(2));
        }
        var fx2 = total / parseFloat(jumlah);
        $("#alternatif_totalrk").val(fx2.toFixed(2));
        $("#alternatif_sumrk").val(fx2.toFixed(2));
        var summaks = parseFloat(total) / parseFloat(jumlah);
        var fx_summaks = summaks;
        $("#alternatif_summaks").val(fx_summaks.toFixed(2));
        var ci = ((parseFloat(summaks) - parseFloat(jumlah)) / (parseFloat(jumlah) - 1));
        var fx_ci = ci;
        $("#alternatif_sumci").val(fx_ci.toFixed(2));
        var cr = parseFloat(ci) / parseFloat(ir);
        var fx_cr = cr;
        $("#alternatif_sumcr").val(fx_cr.toFixed(2));
        $("#alternatif_crvalue").val(fx_cr.toFixed(2));
    }
</script>

<div id="respon_alternatif"></div>

<div id="entri" class="col-md-12">
    <?php
    echo validation_errors();
    echo form_open('#', array('class' => 'form-horizontal', 'id' => 'form_entri_alternatif'));
    ?>
    <input type="hidden" name="crvalue" id="alternatif_crvalue" />
    <input type="hidden" name="subkriteriaid" value="<?= $subkriteriaid; ?>" />
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <th colspan="<?= $jumlah + 3; ?>" class="text-center">Matrik Perbandingan Berpasangan |
                    <?= $namasubkriteria ?>
                </th>
            </thead>
            <thead>
                <th>Alternatif</th>
                <?php
                foreach ($arr as $k => $v) {
                    ?>
                    <th>
                        <?= $v; ?>
                    </th>
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
                    echo '<td>' . $v2 . '</td>';
                    $noSub = 0;
                    $xxx = '';
                    for ($i = 1; $i <= $jumlah; $i++) {
                        $keys = array_keys($arr);
                        $xxx = $keys[array_search("gsda", $keys) + ($i - 1)];
                        $newname = $k2 . "[" . $xxx . "]";
                        $noSub += 1;
                        if ($noSub == $noUtama) {
                            echo '<td><input type="number" min=1 id="alternatif_k' . $noUtama . 'b' . $noSub . '" class="bg-blue form-control form-control-sm alternatif_kolom' . $noSub . '" value="1" readonly="" title="alternatif_kolom' . $noSub . '"/></td>';
                        } else {

                            $nilai = ambil_nilai_alternatif($subkriteriaid, $k2, $xxx);
                            echo '<td><input type="number" max="9" step=".01" name="' . $newname . '" id="alternatif_k' . $noUtama . 'b' . $noSub . '" class="bg-white form-control form-control-sm input_number_alternatif alternatif_kolom' . $noSub . '" data-target="alternatif_k' . $noSub . 'b' . $noUtama . '" data-kolom="' . $noSub . '" value="' . $nilai . '" title="alternatif_kolom' . $noSub . '"/></td>';
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
                        <td><input type="text" id="alternatif_total<?= $h; ?>" class="bg-white form-control form-control-sm"
                                value="0" title="alternatif_total<?= $h; ?>" readonly="" /></td>
                        <?php
                    }
                    ?>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="pull-left">
        <!-- <a href="javascript:;" onclick="hitung();" class="btn btn-primary">Hitung</a>  -->
        <a href="javascript:;" onclick="show_matrik_alternatif();" class="btn btn-info">Lihat Matriks</a>
        <button type="submit" class="btn btn-success">Simpan Kriteria</button>
    </div>

    <?php
    echo form_close();
    ?>
</div>

<div class="row">
    <div id="div_matrik_alternatif" class="col-md-12" style="display: none">

        <div class="table-responsive">
            <?php echo form_open('#', array('id' => 'form_prio_alternatif')); ?>
            <input type="hidden" name="subkriteriaid" value="<?= $subkriteriaid; ?>" />
            <table class="table table-bordered table-striped">
                <thead>
                    <th colspan="<?= $jumlah + 5; ?>" class="text-center">Matrik Nilai Kriteria</th>
                </thead>
                <thead>
                    <th>Kriteria</th>
                    <?php
                    foreach ($arr as $k => $v) {
                        ?>
                        <th>
                            <?= $v; ?>
                        </th>
                        <?php
                    }
                    ?>
                    <th>Jumlah</th>
                    <th>Prioritas</th>
                    <th>Prioritas <br> Subkriteria</th>
                    <th>Jumlah</th>
                </thead>
                <tbody>
                    <?php
                    $noUtama2 = 0;
                    foreach ($arr as $k2 => $v2) {
                        $noUtama2 += 1;
                        echo '<tr>';
                        echo '<td>' . $v2 . '</td>';
                        $noSub2 = 0;
                        for ($i = 1; $i <= $jumlah; $i++) {
                            $noSub2 += 1;
                            echo '<td><input type="text" id="alternatif_mn-k' . $noUtama2 . 'b' . $noSub2 . '" class="bg-white form-control form-control-sm" value="0" readonly=""/></td>';
                        }
                        echo '<td><input type="text" class="bg-white form-control form-control-sm" id="alternatif_jml-b' . $noUtama2 . '" value="0" readonly=""/></td>';
                        echo '<td><input type="text" name="prio[' . $k2 . ']" class="bg-white form-control form-control-sm" id="alternatif_pri-b' . $noUtama2 . '" value="0" readonly=""/></td>';
                        echo '<td><input type="text" class="bg-white form-control form-control-sm" id="alternatif_prisub-b' . $noUtama2 . '" value="0" readonly=""/></td>';
                        echo '<td><input type="text"  class="bg-white form-control form-control-sm" id="alternatif_prisub-bhasil' . $noUtama2 . '" value="" readonly=""/></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <?php echo '<button type="submit" class="btn btn-success" style="display:none;">Simpan Prioritas</button>';
            echo form_close();
            ?>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <th colspan="<?= $jumlah + 1; ?>" class="text-center">Matrik Penjumlahan Tiap Baris</th>
                </thead>
                <thead>
                    <th>Kriteria</th>
                    <?php
                    foreach ($arr as $k => $v) {
                        ?>
                        <th>
                            <?= $v; ?>
                        </th>
                        <?php
                    }
                    ?>
                    <th>Jumlah</th>
                </thead>
                <tbody>
                    <?php
                    $noUtama3 = 0;
                    foreach ($arr as $k3 => $v3) {
                        $noUtama3 += 1;
                        echo '<tr>';
                        echo '<td>' . $v3 . '</td>';
                        $noSub3 = 0;
                        for ($i = 1; $i <= $jumlah; $i++) {
                            $noSub3 += 1;
                            echo '<td><input type="text" id="alternatif_mptb-k' . $noUtama3 . 'b' . $noSub3 . '" class="bg-white form-control form-control-sm" value="0" readonly=""/></td>';
                        }
                        echo '<td><input type="text" class="bg-white form-control form-control-sm" id="alternatif_jmlmptb-b' . $noUtama3 . '" value="0" readonly=""/></td>';
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
                        echo '<td><input type="text" class="bg-white form-control form-control-sm" id="alternatif_jmlrk-b' . $noUtama4 . '" value="0" readonly=""/></td>';
                        echo '<td><input type="text" class="bg-white form-control form-control-sm" id="alternatif_priork-b' . $noUtama4 . '" value="0" readonly=""/></td>';
                        echo '<td><input type="text" class="bg-white form-control form-control-sm" id="alternatif_hasilrk-b' . $noUtama4 . '" value="0" readonly=""/></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" align="center"><b>TOTAL</b></td>
                        <td>
                            <input type="text" class="bg-white form-control form-control-sm" id="alternatif_totalrk"
                                value="0" readonly="" />
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
                            <input type="text" class="bg-white form-control form-control-sm" id="alternatif_sumrk"
                                value="0" readonly="" />
                        </td>
                    </tr>
                    <tr>
                        <td>n(Jumlah Kriteria)</td>
                        <td>
                            <input type="text" class="bg-white form-control form-control-sm" id="alternatif_sumkriteria"
                                value="<?= $jumlah; ?>" readonly="" />
                        </td>
                    </tr>
                    <tr>
                        <td>Maks(Jumlah/n)</td>
                        <td>
                            <input type="text" class="bg-white form-control form-control-sm" id="alternatif_summaks"
                                value="0" readonly="" />
                        </td>
                    </tr>
                    <tr>
                        <td>CI((Maks-n)/n)</td>
                        <td>
                            <input type="text" class="bg-white form-control form-control-sm" id="alternatif_sumci"
                                value="0" readonly="" />
                        </td>
                    </tr>
                    <tr>
                        <td>CR(CI/IR)</td>
                        <td>
                            <input type="text" class="bg-white form-control form-control-sm" id="alternatif_sumcr"
                                value="0" readonly="" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>