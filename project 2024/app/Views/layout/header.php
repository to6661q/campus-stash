<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/plugin/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/plugin/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/plugin/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/plugin/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/plugin/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/plugin/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/plugin/summernote/summernote-bs4.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugin/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugin/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugin/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/anggota/logout"><i class="fas fa-lock"></i> Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="/img/LogoIPPAT.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">IPPAT</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/img/<?= $picture; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= '/anggota/datauser/' . $detailuser['id_user']; ?>" class="d-block" target='_blank'><?= $detailuser['nama']; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/DashboardAnggota/index" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <?php
                        foreach ($menuuser as $menu) :
                            if (empty($menu['root_id'])) {
                        ?>
                                <li class="nav-item">
                                    <a href="<?= $menu['alamat']; ?>" class="nav-link">
                                        <i class="nav-icon fa <?= $menu['icon']; ?>"></i>
                                        <p>
                                            <?= $menu['menu_name']; ?>
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <?php
                                        foreach ($menuuser as $submenu) :
                                            if ($submenu['root_id'] == $menu['id_menu']) {
                                        ?>
                                                <li class="nav-item">
                                                    <a href="<?= $submenu['alamat']; ?>" class="nav-link">
                                                        <i class="nav-icon fas <?= $submenu['icon']; ?>"></i>
                                                        <p>
                                                            <?= $submenu['menu_name']; ?>
                                                        </p>
                                                    </a>
                                                </li>
                                        <?php
                                            }
                                        endforeach;
                                        ?>
                                    </ul>
                                </li>
                        <?php
                            }
                        endforeach;
                        ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>