<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <select class="form-control" onchange="showData(this.value)">
                    <option>Pilih Sub-Kriteria</option>
                    <?php
                    if (!empty($subkriteria)) {
                        foreach ($subkriteria as $rk) {

                            echo '<option value="' . $rk->id_subkriteria . '" >' . $rk->nama_kriteria." - ". $rk->nama_subkriteria . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="col-12 mt-4">
                <div id="matrik_alternatif">
                    <p>*Silahkan pilih terlebih dahulu Sub-Kriteria pada opsi diatas</p>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<script>
    function showData(id) {
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: "<?= base_url('Matriks/alternatif/' . $id_penilaian); ?>",
            data: "subkriteria=" + id,
            error: function () {
                $("#matrik_alternatif").html('Gagal mengambil data matrik');
            },
            beforeSend: function () {
                $("#matrik_alternatif").html('Mengambil data matrik. Tunggu sebentar');
            },
            success: function (x) {
                console.log(x);
                $("#matrik_alternatif").html(x);
                $("#matrik_alternatif").prop;
            },
        });
    }
</script>