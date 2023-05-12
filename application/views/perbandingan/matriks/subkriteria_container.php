<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <ul class="list-group list-group-unbordered mb-3">
                            <?php
                            if (!empty($kriteria)) {
                                foreach ($kriteria as $rk) {
                                    echo '<li class="list-group-item"><a style="color:black" href="javascript:;" onclick="showsubdata(' . $rk->id_kriteria . ');">' . $rk->nama_kriteria . '</a></li>';
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
function showsubdata(kriteria) {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: "<?= base_url('Matriks/subkriteria'); ?>",
        data: "kriteria=" + kriteria,
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