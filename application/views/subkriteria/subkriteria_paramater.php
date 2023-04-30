<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Sub-kriteria</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Sub-kriteria</li>
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
                        <?php echo anchor(site_url('subkriteria/create?kriteria=' . $kriteria), 'Tambah Sub-kriteria', 'class="btn btn-primary btn-sm"'); ?>
                        <div class="card-tools">
                            <form action="<?php echo site_url('subkriteria/parameter'); ?>" class="form-inline"
                                method="get">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="q" class="form-control float-right" placeholder="Search"
                                        value="<?php echo $q; ?>">
                                    <?php
                                    if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('subkriteria/parameter'); ?>"
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
                                    <th>Nama Sub-Kriteria</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($record)) {
                                    foreach ($record as $subkriteria) {
                                        $link = str_replace("?", "&", $kriteriaa);
                                ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><?= $subkriteria->nama_subkriteria; ?>
                                    </td>
                                    <td style="text-align:center" width="200px">
                                        <?php
                                                echo anchor(site_url('subkriteria/update_action' . '?id=' . $subkriteria->id_subkriteria . $link), '<button class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></button>');
                                               
                                                ?>

                                        <button class="btn btn-danger btn-sm"
                                            data-href="<?php echo base_url('subkriteria/delete/' . $subkriteria->id_subkriteria) ?>"
                                            data-toggle="modal" data-target="#delete-subkriteria"><i
                                                class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    ?>
                                <tr>
                                    <td colspan="4" align="center"><strong>Tidak ada data</strong></td>
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