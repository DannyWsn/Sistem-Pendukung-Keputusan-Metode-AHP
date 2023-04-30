<?php $pag = $this->uri->segment(1); ?>
<?php $page = $this->uri->segment(2); ?>
<?php $pages = $this->uri->segment(3); ?>


<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="<?= base_url('admin/Dashboard'); ?>" <?php if ($page == "Dashboard") {
                                                                echo 'class="nav-link active"';
                                                            } else {
                                                                echo 'class="nav-link"';
                                                            } ?>>
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= base_url('Supplier'); ?>" <?php if ($pag == "supplier" || $pag == "Supplier") {
                                                        echo 'class="nav-link active"';
                                                    } else {
                                                        echo 'class="nav-link"';
                                                    } ?>>
                <i class="nav-icon fas fa-copy"></i>
                <p>Data Supplier</p>
            </a>
        </li>

        <li <?php if ($pag == "Kriteria" || $pag == "kriteria" || $pag == "Subkriteria" || $pag == "subkriteria") {
                echo 'class="nav-item menu-open"';
            } else {
                echo 'class="nav-item"';
            } ?>>
            <a href="#" <?php if ($pag == "Kriteria" || $pag == "kriteria" || $pag == "Subkriteria" || $pag == "subkriteria") {
                            echo 'class="nav-link active"';
                        } else {
                            echo 'class="nav-link"';
                        } ?>>
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Pendataan
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview ml-2">
                <li class="nav-item">
                    <a href="<?= base_url('Kriteria'); ?>" <?php if ($pag == "Kriteria" || $pag == "kriteria") {
                                                                echo 'class="nav-link active" ';
                                                            } else {
                                                                echo 'class="nav-link" ';
                                                            } ?>>
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kriteria</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Subkriteria'); ?>" <?php if ($pag == "Subkriteria" || $pag == "subkriteria") {
                                                                    echo 'class="nav-link active" ';
                                                                } else {
                                                                    echo 'class="nav-link" ';
                                                                } ?>>
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sub-Kriteria</p>
                    </a>
                </li>
            </ul>
        </li>

        <li <?php if ($pag == "Alternatif" || $pag == "alternatif" || $page == "Banding" || $page == "banding" || $page == "Hasil" || $page == "hasil") {
                echo 'class="nav-item menu-open"';
            } else {
                echo 'class="nav-item"';
            } ?>>
            <a href="#" <?php if ($pag == "Alternatif" || $pag == "alternatif" || $page == "Banding" || $page == "banding" || $page == "Hasil" || $page == "hasil") {
                            echo 'class="nav-link active"';
                        } else {
                            echo 'class="nav-link"';
                        } ?>>
                <i class="nav-icon fa fa-calculator"></i>
                <p>
                    Perhitungan
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview ml-2">
                <li class="nav-item">
                    <a href="<?= base_url('Alternatif'); ?>" <?php if ($pag == "alternatif" || $pag == "Alternatif") {
                                                                    echo 'class="nav-link active" ';
                                                                } else {
                                                                    echo 'class="nav-link" ';
                                                                } ?>>
                        <i class="far fa-circle nav-icon"></i>
                        <p>Alternatif</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Perbandingan/banding'); ?>" <?php if ($page == "banding" || $page == "Banding") {
                                                                            echo 'class="nav-link active" ';
                                                                        } else {
                                                                            echo 'class="nav-link" ';
                                                                        } ?>>
                        <i class="far fa-circle nav-icon"></i>
                        <p>Perbandingan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Perbandingan/hasil'); ?>" <?php if ($page == "hasil" || $page == "Hasil") {
                                                                            echo 'class="nav-link active" ';
                                                                        } else {
                                                                            echo 'class="nav-link" ';
                                                                        } ?>>
                        <i class="far fa-circle nav-icon"></i>
                        <p>Perhitungan</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="<?= base_url('admin/Auth'); ?>" <?php if ($page == "Auth" || $page == "auth") {
                                                            echo 'class="nav-link active"';
                                                        } else {
                                                            echo 'class="nav-link"';
                                                        } ?>>
                <i class="nav-icon fa fa-users"></i>
                <p>User</p>
            </a>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>