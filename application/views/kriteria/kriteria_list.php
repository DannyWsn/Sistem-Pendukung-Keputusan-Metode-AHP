<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Kriteria</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Kriteria</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- <div style="margin-top: 8px" id="message" class="swalDefaultSuccess">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
</div> -->


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">


                        <button class="btn btn-primary btn-sm" data-href="<?php echo base_url('kriteria/create') ?>"
                            data-toggle="modal" data-target="#tambah-kriteria">Tambah Kriteria</button>

                        <div class="card-tools">
                            <form action="<?php echo site_url('kriteria/index'); ?>" class="form-inline" method="get">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="q" class="form-control float-right" placeholder="Search"
                                        value="<?php echo $q; ?>">
                                    <?php
                                    if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('kriteria'); ?>"
                                        class="btn btn-default btn-sm">Reset</a>
                                    <?php
                                    }
                                    ?>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Kriteria</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($kriteria_data as $kriteria) {
                                ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo $kriteria->nama_kriteria ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php
                                            echo anchor(site_url('Subkriteria/parameter?kriteria=' . $kriteria->id_kriteria), '<button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>');

                                            ?>
                                        <button class="btn btn-primary btn-sm"
                                            data-href="<?php echo base_url('kriteria/update/' . $kriteria->id_kriteria) ?>"
                                            data-toggle="modal" data-id_kriteria="<?= $kriteria->id_kriteria ?>"
                                            data-nama_kriteria="<?= $kriteria->nama_kriteria ?>"
                                            data-target="#update-kriteria"><i class="fas fa-pencil-alt"></i></button>
                                        <button class="btn btn-danger btn-sm"
                                            data-href="<?php echo base_url('kriteria/delete/' . $kriteria->id_kriteria) ?>"
                                            data-toggle="modal" data-target="#delete-kriteria"><i
                                                class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Tambah Kriteria -->
<div class="modal fade" id="tambah-kriteria">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Kriteria</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" action="<?= base_url('kriteria/create_action'); ?>" method="post"
                    enctype="multipart/form-data" role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="varchar">Nama Kriteria <?php echo form_error('nama_kriteria') ?></label>
                            <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria"
                                placeholder="Nama Kriteria" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<!-- Modal Update Kriteria -->

<div class="modal fade" id="update-kriteria">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Update Data Kriteria</h4>
            </div>

            <div class="modal-body">
                <form action="<?= base_url('kriteria/update_action'); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="varchar">Nama Kriteria <?php echo form_error('nama_kriteria') ?></label>
                            <input type="hidden" id="id_kriteria" name="id_kriteria">
                            <input type="text" id="nama_kriteria" class="form-control" name="nama_kriteria"
                                placeholder="Nama Kriteria" required>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    // Untuk sunting
    $('#update-kriteria').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)

        // Isi nilai pada field
        modal.find('#id_kriteria').attr("value", div.data('id_kriteria'));
        modal.find('#nama_kriteria').attr("value", div.data('nama_kriteria'));
    });
});
</script>