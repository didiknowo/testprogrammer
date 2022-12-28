<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('AdminLTE') ?>/dist/img/dd.jpg" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Berita PT. Global</b></span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('AdminLTE') ?>/dist/img/dd.png" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session('user')['username'] ?></a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="<?= base_url('dasboard') ?>" class="nav-link <?= $menu =='dasboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('manajemenBerita') ?>" class="nav-link <?= $menu =='berita' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Manajemen Berita
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('ManajemenKategori')?>" class="nav-link <?= $menu =='kategori' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-link"></i>
                        <p>
                            Manajemen Kategori
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user') ?>" class="nav-link <?= $menu =='user' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Manajemen User
                        </p>
                    </a>
                </li> 
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $judul ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $judul ?></a></li>
                        <li class="breadcrumb-item active"><?= $subjudul ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <?php 
                if ($page) {
                echo view($page);
                }
            ?>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

