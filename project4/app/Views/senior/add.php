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
            <a href="index3.html" class="brand-link">
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
                        <a href="#" class="d-block"><?= $detailuser['nama']; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/wreda/add" class="nav-link">
                                <i class="nav-icon fa fa-graduation-cap"></i>
                                <p>
                                    Daftar Wreda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/wreda/perpanjang" class="nav-link">
                                <i class="nav-icon fa fa-user-plus"></i>
                                <p>
                                    Perpanjang Anggota
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
                            <h1 class="m-0 text-dark">Perpanjang Anggota</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">
                    <form action="/senior/add_proc" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-4">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-body text-center">
                                        Sebagai syarat perpanjang keanggotaan IPPAT mohon lengkapi dokumen sebagai berikut.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <input type="hidden" id="tbid" name="tbid" value="<?= $detailuser['id_user']; ?>">
                                        <div class="alert <?= $displayc; ?> alert-dismissible" <?= $displayw; ?>>
                                            <?= $warning; ?>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fsertifikat" class="col-sm-5 col-form-label">Sertifikat Peningkatan Kualitas <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-7">
                                                <div class="custom-file ">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fsertifikat" name="fsertifikat">
                                                    <label class="custom-file-label" for="fsertifikat">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fskperpanjang" class="col-sm-5 col-form-label">SK Perpanjangan <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-7">
                                                <div class="custom-file ">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fskperpanjang" name="fskperpanjang">
                                                    <label class="custom-file-label" for="fskperpanjang">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a type="button" class="btn btn-danger" href="/login/">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- /.container-fluid -->
            </section>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="http://www.arsyscaturangga.co.id">Arsyscaturangga</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>