<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Alternatif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Alternatif</li>
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
                        <?php echo anchor(site_url('Alternatif/create'), 'Tambah Alternatif', 'class="btn btn-primary btn-sm"'); ?>
                        <div class="card-tools">
                            <form action="" class="form-inline" method="get">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="q" class="form-control float-right" placeholder="Search" value="">

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
                                    <th>Nama Supplier</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($data)) {
                                    $no = 1;
                                    foreach ($data as $alternatif) {
                                ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $alternatif->nama_supplier ?></td>
                                            <td><?php echo $alternatif->alamat_supplier ?></td>
                                            <td style="text-align:center" width="200px">
                                                <?php
                                                echo anchor(site_url('Alternatif/edit?alternatif=' . $alternatif->id_alternatif), '<button class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></button>');
                                                ?>
                                                <button class="btn btn-danger btn-sm" data-href="<?php echo base_url('Alternatif/hapus?alternatif=' . $alternatif->id_alternatif) ?>" data-toggle="modal" data-target="#delete-alternatif"><i class="far fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="5" align="center">Tidak Ada Data</td>
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