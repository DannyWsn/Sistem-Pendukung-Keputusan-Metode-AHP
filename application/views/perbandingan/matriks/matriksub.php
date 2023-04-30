<?php


if (!empty($arr)) {

    $jumlah = count($arr);

?>
    <script>
        $(document).ready(function() {

            <?php
            if (!empty($arr)) {
            ?>
                hitungMatrixSub();
            <?php
            }
            ?>

            $(".inputnumbersub").each(function() {
                $(this).change(function() {

                    var dtarget = $(this).attr('data-target');
                    var dkolom = $(this).attr('data-kolom');
                    var jumlah = $(this).val();
                    var rumus = 1 / parseFloat(jumlah);
                    var fx = rumus;
                    $("#" + dtarget).val(fx.toFixed(2));


                    hitungMatrixSub()

                });
            });
        })

        function hitungMatrixSub() {
            totalsub();
            mnksub();
            mptbsub();
            rksub();
        }
        $("#formentrisub").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: "<?= base_url(); ?>Perbandingan/updatesub",
                data: $(this).serialize(),
                error: function() {
                    shownoticesub('danger', 'Gagal menyimpan data');
                    $("#formentrisub select").removeAttr("disabled");
                    $("#formentrisub button").removeAttr("disabled");
                },
                beforeSend: function() {

                    console.log($(this).serialize());
                    $("#formentrisub select").attr('disabled', 'disabled');
                    $("#formentrisub button").attr('disabled', 'disabled');
                    shownoticesub('info', 'Tunggu sebentar,lagi menyimpan data');
                },
                success: function(x) {
                    if (x.status == "ok") {
                        $("#prioformsub").trigger('submit');
                        shownoticesub('success', x.msg);
                    } else {
                        shownoticesub('danger', x.msg);
                    }
                    $("#formentrisub select").removeAttr("disabled");
                    $("#formentrisub button").removeAttr("disabled");
                },
            });
        });


        $("#prioformsub").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: "<?= base_url(); ?>Perbandingan/updatesubprioritas",
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

        function shownoticesub(tipe, pesan) {
            $("#respon").html('<div class="alert alert-' + tipe + '">' + pesan + '</div>');
            $("#respon").show('fadeIn');
            if ($("#respon").is(":visible")) {
                setTimeout(function() {
                    $("#respon").hide('fadeOut');
                }, 3000);
            }
        }


        function showmatrixsub() {
            $("#matrikdivsub").toggle('fade');
        }

        function totalsub() {
            for (i = 1; i <= <?= $jumlah; ?>; i++) {
                var sum = 0;
                $(".kolom" + i).each(function() {
                    var n = $(this).val();
                    if (n == undefined || n == '') {
                        n = 0;
                    }
                    sum += parseFloat(n);
                });
                var fx = sum;
                $("#total" + i).val(fx.toFixed(2));
            }
        }

        function mnksub() {
            var mm = [];
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
                mm.push(totprio);
            }
            maksprio = arrayMax(mm);
            mnk2sub();
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

        function mnk2sub() {
            var i = [];
            for (i = 1; i <= <?= $jumlah; ?>; i++) {
                var prio = $("#pri-b" + i).val();
                var rumus = parseFloat(prio) / parseFloat(maksprio);
                $("#prisub-b" + i).val(rumus.toFixed(2));
                $("#prisub-bhasil" + i).val(rumus.toFixed(2));
            }
        }

        function mptbsub() {
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

        function rksub() {
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
    </script>

    <div id="respon"></div>

    <div id="entri" class="col-md-12">
        <?php
        echo validation_errors();
        echo form_open('#', array('class' => 'form-horizontal', 'id' => 'formentrisub'));
        ?>
        <input type="hidden" name="crvalue" id="crvalue" />
        <input type="hidden" name="kriteriaid" value="<?= $kriteriaid; ?>" />
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th colspan="<?= $jumlah + 3; ?>" class="text-center">Matrik Perbandingan Berpasangan |
                        <?= $namakriteria ?>
                    </th>
                </thead>
                <thead>
                    <th>Kriteria</th>
                    <?php
                    foreach ($arr as $k => $v) {
                    ?>
                        <th><?= $v; ?></th>
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
                                echo '<td><input type="number" id="k' . $noUtama . 'b' . $noSub . '" class="bg-blue form-control form-control-sm kolom' . $noSub . '" value="1" readonly="" title="kolom' . $noSub . '"/></td>';
                            } else {

                                if ($noUtama > $noSub) {
                                    $nilai = ambil_nilai_subkriteria($kriteriaid, $k2, $xxx);
                                    echo '<td><input type="text" name="' . $newname . '" id="k' . $noUtama . 'b' . $noSub . '" class="form-control form-control-sm inputnumbersub kolom' . $noSub . '" data-target="k' . $noSub . 'b' . $noUtama . '" data-kolom="' . $noSub . '" value="' . $nilai . '" title="kolom' . $noSub . '"/></td>';
                                } else {
                                    $nilai = ambil_nilai_subkriteria($kriteriaid, $k2, $xxx);
                                    echo '<td><input type="text" name="' . $newname . '" id="k' . $noUtama . 'b' . $noSub . '" class="form-control form-control-sm inputnumbersub kolom' . $noSub . '" data-target="k' . $noSub . 'b' . $noUtama . '" data-kolom="' . $noSub . '" value="' . $nilai . '" title="kolom' . $noSub . '"/></td>';
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
                            <td><input type="text" id="total<?= $h; ?>" class="bg-white form-control form-control-sm" value="0" title="total<?= $h; ?>" readonly="" /></td>
                        <?php
                        }
                        ?>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="pull-left">
            <!-- <a href="javascript:;" onclick="hitung();" class="btn btn-primary">Hitung</a>  -->
            <a href="javascript:;" onclick="showmatrixsub();" class="btn btn-info">Lihat Matriks</a>
            <button type="submit" class="btn btn-success">Simpan Kriteria</button>
        </div>

        <?php
        echo form_close();
        ?>
    </div>

    <br><br><br>
    <div class="row">
        <div id="matrikdivsub" class="col-md-12" style="display: none">

            <div class="table-responsive">
                <?php echo form_open('#', array('id' => 'prioformsub')); ?>
                <input type="hidden" name="kriteriaid" value="<?= $kriteriaid; ?>" />
                <table class="table table-bordered">
                    <thead>
                        <th colspan="<?= $jumlah + 5; ?>" class="text-center">Matrik Nilai Kriteria</th>
                    </thead>
                    <thead>
                        <th>Kriteria</th>
                        <?php
                        foreach ($arr as $k => $v) {
                        ?>
                            <th><?= $v; ?></th>
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
                                echo '<td><input type="text" id="mn-k' . $noUtama2 . 'b' . $noSub2 . '" class="bg-white form-control form-control-sm" value="0" readonly=""/></td>';
                            }
                            echo '<td><input type="text" class="bg-white form-control form-control-sm" id="jml-b' . $noUtama2 . '" value="0" readonly=""/></td>';
                            echo '<td><input type="text" name="prio[' . $k2 . ']" class="bg-white form-control form-control-sm" id="pri-b' . $noUtama2 . '" value="0" readonly=""/></td>';
                            echo '<td><input type="text" class="bg-white form-control form-control-sm" id="prisub-b' . $noUtama2 . '" value="0" readonly=""/></td>';
                            echo '<td><input type="text"  class="bg-white form-control form-control-sm" id="prisub-bhasil' . $noUtama2 . '" value="" readonly=""/></td>';
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
                <table class="table table-bordered">
                    <thead>
                        <th colspan="<?= $jumlah + 1; ?>" class="text-center">Matrik Penjumlahan Tiap Baris</th>
                    </thead>
                    <thead>
                        <th>Kriteria</th>
                        <?php
                        foreach ($arr as $k => $v) {
                        ?>
                            <th><?= $v; ?></th>
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
                <table class="table table-bordered">
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
                <table class="table table-bordered">
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
    </div>
<?php
} else {
?>
    <div class="alert alert-danger">Parameter belum dibuat. Silahkan buat terlebih dahulu <a href="<?= base_url(akses() . '/master/kriteria/subkriteria?kriteria=' . $kriteriaid); ?>">Di sini</a> </div>
<?php
}
?>