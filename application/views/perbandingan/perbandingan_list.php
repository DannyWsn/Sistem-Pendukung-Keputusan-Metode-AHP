<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Data Perbandingan</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <p>
            Pembobotan kriteria, subkriteria dan alternatif
        </p>

        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-kriteria-tab" data-toggle="pill" href="#custom-content-below-kriteria" role="tab" aria-controls="custom-content-below-kriteria" aria-selected="true">Bobot Kriteria</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-content-below-subkriteria-tab" data-toggle="pill" href="#custom-content-below-subkriteria" role="tab" aria-controls="custom-content-below-subkriteria" aria-selected="false">Bobot SubKriteria</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-content-below-alternatif-tab" data-toggle="pill" href="#custom-content-below-alternatif" role="tab" aria-controls="custom-content-below-alternatif" aria-selected="false">Bobot Alternatif</a>
            </li>
        </ul>
        <div class="tab-content" id="custom-content-below-tabContent">
            <div class="tab-pane fade active show" id="custom-content-below-kriteria" role="tabpanel" aria-labelledby="custom-content-below-kriteria-tab">
                <div class="mt-2" id="matrik"></div>
            </div>
            <div class="tab-pane fade" id="custom-content-below-subkriteria" role="tabpanel" aria-labelledby="custom-content-below-subkriteria-tab">
                <div class="mt-2" id="submatrik"></div>
            </div>
            <div class="tab-pane fade" id="custom-content-below-alternatif" role="tabpanel" aria-labelledby="custom-content-below-alternatif-tab">
                <div class="mt-2" id="altmatrik"></div>
            </div>

        </div>

    </div>
</div>
<script type="text/javascript">
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: "<?= base_url('Matriks/kriteria'); ?>",
        data: $(this).serialize(),
        error: function() {
            $("#matrik").html('Gagal mengambil data matrik');
        },
        beforeSend: function() {
            $("#matrik").html('Mengambil data matrik. Tunggu sebentar');
        },
        success: function(x) {
            $("#matrik").html(x);
        },
    });


    $.ajax({
        type: 'get',
        dataType: 'html',
        url: "<?= base_url('Matriks/subkriteria_container') ?>",
        data: "",
        error: function() {
            $("#submatrik").html('Gagal mengambil data matrik sub kriteria');
        },
        beforeSend: function() {
            $("#submatrik").html('Loading, sedang mengambil data matrik');
        },
        success: function(x) {
            $("#submatrik").html(x);
        }
    });
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: "<?= base_url('Matriks/alternatif_container'); ?>",
        data: "",
        error: function() {
            $("#altmatrik").html('Gagal mengambil data matrik alternatif');
        },
        beforeSend: function() {
            $("#altmatrik").html('Mengambil data matrik alternatif. Tunggu sebentar');
        },
        success: function(x) {
            $("#altmatrik").html(x);
        },
    });
</script>