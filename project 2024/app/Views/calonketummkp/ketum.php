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
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="text-center">
                    <div class="image mt-3">
                        <img src="/img/LogoIPPAT.png" class="brand-image img-circle elevation-3" width="80%">
                    </div>
                </div>
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
                            <h1 class="m-0 text-dark">Pendaftaran Calon Ketua Umum</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">
                    <form action="/calonketummkp/addketum_proc" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="alert <?= $displayc; ?> alert-dismissible" <?= $displayw; ?>>
                                            <?= $warning; ?>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbnomorktp" class="col-sm-6 col-form-label">Nomor KTP <font style="color:red">*</font></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control text-center" id="tbnomorktp" name="tbnomorktp" placeholder="No KTP">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbnomorkta" class="col-sm-6 col-form-label">Nomor KTA (xx.xx.xxxxx) <font style="color:red">*</font></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control text-center" id="tbnomorkta" name="tbnomorkta" placeholder="No Anggota">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fktp" class="col-sm-6 col-form-label">KTP (PDF)<font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fktp" name="fktp">
                                                    <label class="custom-file-label" for="fktp">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fcv" class="col-sm-6 col-form-label">Biodata (PDF)<font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fcv" name="fcv">
                                                    <label class="custom-file-label" for="fcv">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fsk" class="col-sm-6 col-form-label">SK Pengangkatan (PDF)<font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fsk" name="fsk">
                                                    <label class="custom-file-label" for="fsk">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fbas" class="col-sm-6 col-form-label">BAS Jabatan (PDF)<font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fbas" name="fbas">
                                                    <label class="custom-file-label" for="fbas">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fspkes" class="col-sm-6 col-form-label">Surat Pernyataan Kesediaan untuk dicalonkan sebagai Ketua Umum PP IPPAT<font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fspkes" name="fspkes">
                                                    <label class="custom-file-label" for="fspkes">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fsppidana" class="col-sm-6 col-form-label">Surat Pernyataan tidak pernah di pidana <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fsppidana" name="fsppidana">
                                                    <label class="custom-file-label" for="fsppidana">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fskketuapengda" class="col-sm-6 col-form-label">Surat Keterangan yang menerangkan bahwa yang bersangkutan pernah menjadi Ketua Pengda dan Anggota Pengwil dan/atau Anggota PP IPPAT <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fskketuapengda" name="fskketuapengda">
                                                    <label class="custom-file-label" for="fskketuapengda">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fpi" class="col-sm-6 col-form-label">Pakta Integritas <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fpi" name="fpi">
                                                    <label class="custom-file-label" for="fpi">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fnarkoba" class="col-sm-6 col-form-label">Surat Keterangan bebas penyalahgunaan narkoba dari RS <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fnarkoba" name="fnarkoba">
                                                    <label class="custom-file-label" for="fnarkoba">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fsehat" class="col-sm-6 col-form-label">Surat Keterangan sehat jasmani dan rohani dari RS atau Puskesmas <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fsehat" name="fsehat">
                                                    <label class="custom-file-label" for="fsehat">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a type="button" class="btn btn-danger" href="/calonketummkp/index">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
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