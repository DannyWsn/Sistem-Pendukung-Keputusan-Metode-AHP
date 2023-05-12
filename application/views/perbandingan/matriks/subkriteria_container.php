<section class="content">
    <div class="container-fluid">
        <div class="row">
           

            <div class="col-12">
                <select class="form-control" onchange="showsubdata(this.value)">
                    <option>Pilih Kriteria</option>
                    <?php
                    if (!empty($kriteria)) {
                        foreach ($kriteria as $rk) {

                            echo '<option value="' . $rk->id_kriteria . '" >' . $rk->nama_kriteria . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="col-12 mt-4">
                <div id="matriksub">
                    <p>*Silahkan pilih terlebih dahulu Kriteria pada opsi diatas</p>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<script>
    function showsubdata(kriteria) {
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: "<?= base_url('Matriks/subkriteria/' . $id_penilaian); ?>",
            data: "kriteria=" + kriteria,
            error: function () {
                $("#matriksub").html('Gagal mengambil data matrik');
            },
            beforeSend: function () {
                $("#matriksub").html('Mengambil data matrik. Tunggu sebentar');
            },
            success: function (x) {
                $("#matriksub").html(x);
            },
        });
    }
</script>