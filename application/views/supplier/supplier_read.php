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

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Lengkap Supplier</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Supplier</th>
                                    <th>Alamat Supplier</th>
                                    <th>Komoditi</th>
                                    <th>No Telpon</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $nama_supplier; ?></td>
                                    <td><?php echo $alamat_supplier; ?></td>
                                    <td><?php echo $komoditi; ?></td>
                                    <td><?php echo $no_telpon; ?></td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>