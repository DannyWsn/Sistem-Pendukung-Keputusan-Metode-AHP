<?php
$jumlah = count($arr);
?>
<script type="text/javascript">
    $(document).ready(function () {

        <?php
        if (!empty($arr)) {
            ?>
            hitung_matrik_kriteria();
            <?php
        }
        ?>

        $(".input_number_kriteria").each(function () {
            $(this).change(function () {
                // hitung();
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


                hitung_matrik_kriteria()
            });
        });

    });

    function hitung_matrik_kriteria() {
        total_kriteria();
        mnk_kriteria();
        mptb_kriteria();
        rk_kriteria();
    }

    $("#form_entri_kriteria").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: "<?= base_url(); ?>Matriks/update_kriteria/<?= $id_penilaian ?>",
            data: $(this).serialize(),
            error: function () {
                show_notice_kriteria('danger', 'Gagal menyimpan data');
                $("#form_entri_kriteria select").removeAttr("disabled");
                $("#form_entri_kriteria button").removeAttr("disabled");
            },
            beforeSend: function () {
                $("#form_entri_kriteria select").attr('disabled', 'disabled');
                $("#form_entri_kriteria button").attr('disabled', 'disabled');
                show_notice_kriteria('info', 'Tunggu sebentar,lagi menyimpan data');
            },
            success: function (x) {
                if (x.status == "ok") {
                    $("#form_prio_kriteria").trigger('submit');
                    show_notice_kriteria('success', x.msg);
                } else {
                    show_notice_kriteria('danger', x.msg);
                }
                $("#form_entri_kriteria select").removeAttr("disabled");
                $("#form_entri_kriteria button").removeAttr("disabled");
            },
        });
    });

    $("#form_prio_kriteria").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: "<?= base_url(); ?>Matriks/update_kriteria_prioritas/<?= $id_penilaian ?>",
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

    function show_notice_kriteria(tipe, pesan) {
        $("#respon_kriteria").html('<div class="alert alert-' + tipe + '">' + pesan + '</div>');
        $("#respon_kriteria").show('fadeIn');
        if ($("#respon_kriteria").is(":visible")) {
            setTimeout(function () {
                $("#respon_kriteria").hide('fadeOut');
            }, 3000);
        }
    }

    function show_matrik_kriteria() {
        $("#div_matrik_kriteria").toggle('fade');
    }

    function total_kriteria() {
        for (i = 1; i <= <?= $jumlah; ?>; i++) {
            var sum = 0;
            $(".kriteria_kolom" + i).each(function () {
                var n = $(this).val();
                if (n == undefined || n == '') {
                    n = 0;
                }
                sum += parseFloat(n);
            });
            var fx = sum;
            $("#kriteria_total" + i).val(fx.toFixed(2));
        }
    }

    function mnk_kriteria() {
        for (i = 1; i <= <?= $jumlah; ?>; i++) {
            var jml = 0;
            for (x = 1; x <= <?= $jumlah; ?>; x++) {
                var vtarget = $("#kriteria_k" + i + "b" + x).val();
                var vkolom = $("#kriteria_total" + x).val();
                var rumus = parseFloat(vtarget) / parseFloat(vkolom);
                var fx = rumus;
                jml += parseFloat(rumus);
                $("#kriteria_mn-k" + i + "b" + x).val(fx.toFixed(2));
                //$("#mn-k"+i+"b"+x).val(i+" "+x);						
            }
            var jumlahmnk = jml;
            var prio = parseFloat(jml) / parseFloat(<?= $jumlah; ?>);
            var totprio = prio;
            $("#kriteria_jml-b" + i).val(jumlahmnk.toFixed(2));
            $("#kriteria_pri-b" + i).val(totprio.toFixed(2));

        }
    }


    function mptb_kriteria() {
        for (i = 1; i <= <?= $jumlah; ?>; i++) {
            var jml = 0;
            for (x = 1; x <= <?= $jumlah; ?>; x++) {
                var prio = $("#kriteria_pri-b" + x).val();
                var nilai = $("#kriteria_k" + i + "b" + x).val();
                var rumus = parseFloat(nilai) * parseFloat(prio);
                var fx = rumus;
                jml += parseFloat(rumus);
                //$("#mptb-k"+i+"b"+x).val(prio+"*"+nilai);
                $("#kriteria_mptb-k" + i + "b" + x).val(fx.toFixed(2));
            }
            var jumlahmnk = jml;
            $("#kriteria_jmlmptb-b" + i).val(jumlahmnk.toFixed(2));
        }
    }


    function rk_kriteria() {
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
            var prio = $("#kriteria_pri-b" + i).val();
            var jml = $("#kriteria_jmlmptb-b" + i).val();
            var hasil = parseFloat(jml) / parseFloat(prio);
            var fx = hasil;
            total += hasil;
            $("#kriteria_jmlrk-b" + i).val(jml);
            $("#kriteria_priork-b" + i).val(prio);
            $("#kriteria_hasilrk-b" + i).val(fx.toFixed(2));
        }
        var fx2 = total / parseFloat(jumlah);
        $("#kriteria_totalrk").val(fx2.toFixed(2));
        $("#kriteria_sumrk").val(fx2.toFixed(2));
        var summaks = parseFloat(total) / parseFloat(jumlah);
        var fx_summaks = summaks;
        $("#kriteria_summaks").val(fx_summaks.toFixed(2));
        var ci = ((parseFloat(summaks) - parseFloat(jumlah)) / (parseFloat(jumlah) - 1));
        var fx_ci = ci;
        $("#kriteria_sumci").val(fx_ci.toFixed(2));
        var cr = parseFloat(ci) / parseFloat(ir);
        var fx_cr = cr;
        $("#kriteria_sumcr").val(fx_cr.toFixed(2));
        $("#kriteria_crvalue").val(fx_cr.toFixed(2));
    }


</script>

<div id="respon_kriteria"></div>

<div class="col-md-12">
    <?php
    echo form_open('#', array('class' => 'form-horizontal', 'id' => 'form_entri_kriteria'));
    ?>
    <input type="hidden" name="crvalue" id="kriteria_crvalue" />
    
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
                        <th class="text-center">
                            <?= $v; ?>
                        </th>
                        <?php
                    }
                    ?>
                </thead>
                <tbody>
                    <?php
                    $kolom = 0;
                    foreach ($arr as $k2 => $v2) {
                        $kolom += 1;
                        //array_shift($xxx);
                        echo '<tr>';
                        echo '<td class="text-center">' . $v2 . '</td>';
                        $baris = 0;
                        $xxx = '';
                        for ($i = 1; $i <= $jumlah; $i++) {
                            $keys = array_keys($arr);
                            $xxx = $keys[array_search("gsda", $keys) + ($i - 1)];
                            $newname = $k2 . "[" . $xxx . "]";
                            $baris += 1;
                            if ($baris == $kolom) {
                                echo '<td class="col-xs-1"><input type="number" id="kriteria_k' . $kolom . 'b' . $baris . '" class="bg-blue form-control form-control-sm kriteria_kolom' . $baris . '" value="1" readonly="" title="kriteria_kolom' . $baris . '"/></td>';
                            } else {
                                $nilai = ambil_nilai_kriteria($k2, $xxx, $id_penilaian);
                                echo '<td><input type="number" max="9" step=".01" name="' . $newname . '" id="kriteria_k' . $kolom . 'b' . $baris . '" class="form-control form-control-sm input_number_kriteria kriteria_kolom' . $baris . '" data-target="kriteria_k' . $baris . 'b' . $kolom . '" data-kolom="' . $baris . '" value="' . $nilai . '"  title="kriteria_kolom' . $baris . '"/></td>';
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
                            <td><input type="text" id="kriteria_total<?= $h; ?>" class="form-control form-control-sm"
                                    value="0" title="kriteria_total<?= $h; ?>" readonly="" /></td>
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
        <a href="javascript:;" onclick="show_matrik_kriteria();" class="btn btn-info">Lihat Matriks</a>
        <button type="submit" name="submit" class="btn btn-success">Simpan Kriteria</button>
    </div>
    <?php
    echo form_close();
    ?>
</div>
<br><br><br>


<div id="div_matrik_kriteria" class="col-md-12" style="display: none">

    <div class="table-responsive">
        <?php echo form_open('#', array('id' => 'form_prio_kriteria')); ?>
        
        <table class="table table-bordered table-striped">
            <thead>
                <th colspan="<?= $jumlah + 3; ?>" class="text-center">Matrik Nilai Kriteria</th>
            </thead>
            <thead>
                <th class="text-center">Kriteria</th>
                <?php
                foreach ($arr as $k => $v) {
                    ?>
                    <th class="text-center">
                        <?= $v; ?>
                    </th>
                    <?php
                }
                ?>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Prioritas</th>
            </thead>
            <tbody>
                <?php
                $kolom2 = 0;
                foreach ($arr as $k2 => $v2) {
                    $kolom2 += 1;
                    echo '<tr>';
                    echo '<td class="text-center">' . $v2 . '</td>';
                    $baris2 = 0;
                    for ($i = 1; $i <= $jumlah; $i++) {
                        $baris2 += 1;
                        echo '<td><input type="text" id="kriteria_mn-k' . $kolom2 . 'b' . $baris2 . '" class="bg-white form-control form-control-sm" value="0" readonly=""/></td>';
                    }
                    echo '<td><input type="text" class="bg-white form-control form-control-sm" id="kriteria_jml-b' . $kolom2 . '" value="0" readonly=""/></td>';
                    echo '<td><input type="text" name="prio[' . $k2 . ']" class="bg-white form-control form-control-sm" id="kriteria_pri-b' . $kolom2 . '" value="0" readonly=""/></td>';
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
                    <th class="text-center">
                        <?= $v; ?>
                    </th>
                    <?php
                }
                ?>
                <th class="text-center">Jumlah</th>
            </thead>
            <tbody>
                <?php
                $kolom3 = 0;
                foreach ($arr as $k3 => $v3) {
                    $kolom3 += 1;
                    echo '<tr>';
                    echo '<td class="text-center">' . $v3 . '</td>';
                    $baris3 = 0;
                    for ($i = 1; $i <= $jumlah; $i++) {
                        $baris3 += 1;
                        echo '<td><input type="text" id="kriteria_mptb-k' . $kolom3 . 'b' . $baris3 . '" class="bg-white form-control form-control-sm" value="0" readonly=""/></td>';
                    }
                    echo '<td><input type="text" class="bg-white form-control form-control-sm" id="kriteria_jmlmptb-b' . $kolom3 . '" value="0" readonly=""/></td>';
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
                $kolom4 = 0;
                foreach ($arr as $k4 => $v4) {
                    $kolom4 += 1;
                    echo '<tr>';
                    echo '<td>' . $v4 . '</td>';
                    echo '<td><input type="text" class="bg-white form-control form-control-sm" id="kriteria_jmlrk-b' . $kolom4 . '" value="0" readonly=""/></td>';
                    echo '<td><input type="text" class="bg-white form-control form-control-sm" id="kriteria_priork-b' . $kolom4 . '" value="0" readonly=""/></td>';
                    echo '<td><input type="text" class="bg-white form-control form-control-sm" id="kriteria_hasilrk-b' . $kolom4 . '" value="0" readonly=""/></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" align="center"><b>TOTAL</b></td>
                    <td>
                        <input type="text" class="bg-white form-control form-control-sm" id="kriteria_totalrk" value="0"
                            readonly="" />
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
                        <input type="text" class="bg-white form-control form-control-sm" id="kriteria_sumrk" value="0"
                            readonly="" />
                    </td>
                </tr>
                <tr>
                    <td>n(Jumlah Kriteria)</td>
                    <td>
                        <input type="text" class="bg-white form-control form-control-sm" id="kriteria_sumkriteria"
                            value="<?= $jumlah; ?>" readonly="" />
                    </td>
                </tr>
                <tr>
                    <td>Maks(Jumlah/n)</td>
                    <td>
                        <input type="text" class="bg-white form-control form-control-sm" id="kriteria_summaks" value="0"
                            readonly="" />
                    </td>
                </tr>
                <tr>
                    <td>CI((Maks-n)/n)</td>
                    <td>
                        <input type="text" class="bg-white form-control form-control-sm" id="kriteria_sumci" value="0"
                            readonly="" />
                    </td>
                </tr>
                <tr>
                    <td>CR(CI/IR)</td>
                    <td>
                        <input type="text" class="bg-white form-control form-control-sm" id="kriteria_sumcr" value="0"
                            readonly="" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>