<script type="text/javascript">
$(function() {
    showkriteria();
});

$(function() {
    showsubkriteria();
});

$(function() {
    showAlternatif();
});

function showkriteria() {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: "<?= base_url('Perbandingan/gethtml'); ?>",
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
}


function showsubkriteria() {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: "<?= base_url('Perbandingan/getsubcontainer') ?>",
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
}

function showAlternatif() {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: "<?= base_url('Perbandingan/getaltcontainer'); ?>",
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
}
</script>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Perbandingan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Perbandingan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            Pembobotan kriteria, subkriteria dan alternatif
                        </h3>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-content-below-home-tab" onclick="showkriteria();"
                                    data-toggle="pill" href="javascript:; #kriteria" role="tab"
                                    aria-controls="custom-content-below-home" aria-selected="true">Nilai Bobot
                                    Kriteria</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-profile-tab" onclick="showsubkriteria();"
                                    data-toggle="pill" href="javascript:; #custom-content-below-profile" role="tab"
                                    aria-controls="custom-content-below-profile" aria-selected="false">Nilai Bobot Sub
                                    Kriteria</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-messages-tab" onclick="showAlternatif();"
                                    data-toggle="pill" href="javascript:;javascript:; #custom-content-below-messages"
                                    role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Nilai
                                    bobot
                                    alternatif</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="tab-pane fade show active" id="kriteria" role="tabpanel"
                                aria-labelledby="custom-content-below-home-tab">


                                <div class="card card-default card-outline">
                                    <div class="card-body" id="matrik"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel"
                                aria-labelledby="custom-content-below-profile-tab">
                                <div class="mt-2" id="submatrik">

                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel"
                                aria-labelledby="custom-content-below-messages-tab">
                                <div class="mt-2" id="altmatrik">

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>