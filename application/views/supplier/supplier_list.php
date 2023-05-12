<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Supplier</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Supplier</li>
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
                        <?php echo anchor(site_url('supplier/create'), 'Tambah Data', 'class="btn btn-primary btn-sm"'); ?>
                        <div class="card-tools">
                            <form action="<?php echo site_url('supplier/index'); ?>" class="form-inline" method="get">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="q" class="form-control float-right" placeholder="Search"
                                        value="<?php echo $q; ?>">
                                    <?php
                                    if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('supplier'); ?>"
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
                                    <th>Nama Supplier</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($supplier_data as $supplier) {
                                ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo $supplier->nama_supplier ?></td>
                                    <td><?php echo $supplier->alamat_supplier ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php
                                            echo anchor(site_url('supplier/read/' . $supplier->id_supplier), '<button class="btn btn-sm btn-success"><i class="far fa-eye"></i></button>');
                                            echo ' ';
                                            echo anchor(site_url('supplier/update/' . $supplier->id_supplier), '<button class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></button>');
                                        
                                            ?>
                                        <button class="btn btn-danger btn-sm"
                                            data-href="<?php echo base_url('supplier/delete/' . $supplier->id_supplier) ?>"
                                            data-toggle="modal" data-target="#delete-supplier"><i
                                                class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <?php echo anchor(site_url('supplier/excel'), 'Excel', 'class="btn btn-primary btn-sm"'); ?>
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