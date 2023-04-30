<section class="content">
    <div class="container-fluid">
        <div class="row">

            <select class="form-control" onchange="pilSubKrta(this)">
                <option>Pilih Sub-Kriteria</option>
                <?php
                if (!empty($subkriteria)) {
                    foreach ($subkriteria as $rk) {
                        $jj = '';
                        if ($rk->id_subkriteria == $rk->id_subkriteria) {
                            $jj = 'selected="selected"';
                        }
                        echo '<option value="' . $rk->id_subkriteria . '" ' . $jj . '>' . $rk->nama_subkriteria . '</option>';
                    }
                }
                ?>
            </select>

            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">



                        <ul class="list-group list-group-unbordered mb-3">
                            <?php
                            if (!empty($subkriteria)) {
                                foreach ($subkriteria as $rk) {
                                    echo '<li class="list-group-item"><a style="color:black" href="javascript:;" onclick="showData(' . $rk->id_subkriteria . ');">' . $rk->nama_subkriteria . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- /.col -->

                <!-- /.card -->
            </div>
            <div class="col-md-9">
                <div id="matriksub"></div>
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
            url: "<?= base_url('Perbandingan/getalt'); ?>",
            data: "subkriteria=" + id,
            error: function() {
                $("#matriksub").html('Gagal mengambil data matrik');
            },
            beforeSend: function() {
                $("#matriksub").html('Mengambil data matrik. Tunggu sebentar');
            },
            success: function(x) {
                $("#matriksub").html(x);
            },
        });
    }
</script>

<script>
    function showDataSub(id) {
        $.ajax({
            method: "get",
            dataType: 'html',
            url: baseurl + "/Perbandingan/getalt/" + id,
            error: function() {
                $("#matriksub").html('Gagal mengambil data matrik');
            },
            beforeSend: function() {
                $("#matriksub").html('Mengambil data matrik. Tunggu sebentar');
            },
            success: function(x) {
                $("#matriksub").html(x);
            },
        });
    }

    function pilSubKrta(id) {
        showDataSub(id.value);
    }
</script>