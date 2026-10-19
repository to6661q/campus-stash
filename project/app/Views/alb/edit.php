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
                            <h1 class="m-0 text-dark">Edit Data</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">
                    <form action="/alb/edit_proc" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="tbid" name="tbid" value="<?= $detailuser['id_user']; ?>">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-6">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="alert alert-warning alert-dismissible text-center">
                                            Data anda masih dalam process validasi.<br>
                                            Untuk keterangan lebih lanjut dapat menghubungi admin@ppippat.org
                                        </div>
                                        <div class="alert <?= $displayc; ?> alert-dismissible" <?= $displayw; ?>>
                                            <?= $warning; ?>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fphoto" class="col-sm-4 col-form-label">Pas photo (3x4) <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-8">
                                                <div class="custom-file">
                                                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="custom-file-input" id="fphoto" name="fphoto">
                                                    <label class="custom-file-label" for="fphoto"><?= $foto; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbnama" class="col-sm-4 col-form-label">Nama <font style="color:red">*</font></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control text-center" id="tbnama" name="tbnama" placeholder="Nama Anggota" value="<?= $detailuser['nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbtgllahir" class="col-sm-4 col-form-label">Tmpt / Tgl Lahir <font style="color:red">*</font></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control text-center" id="tbtempatlahir" name="tbtempatlahir" placeholder="Tempat" value="<?= $detailuser['tempat_lahir']; ?>">
                                            </div>
                                            <div class="input-group date col-sm-5" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" id="tbtgllahir" name="tbtgllahir" data-target="#reservationdate" value="<?= $detailuser['tgl_lahir']; ?>" />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbtlp" class="col-sm-4 col-form-label">No Tlp <font style="color:red">*</font></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control text-center" id="tbtlp" name="tbtlp" placeholder="No Tlp" value="<?= $detailuser['no_tlp']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbnoktp" class="col-sm-4 col-form-label">KTP <font style="color:red">*</font></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control text-center" id="tbnoktp" name="tbnoktp" placeholder="Nomor Ktp" value="<?= $detailuser['no_ktp']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbalamat" class="col-sm-4 col-form-label">Alamat Tinggal <font style="color:red">*</font></label>
                                            <div class="col-sm-8">
                                                <textarea rows="5" class="form-control text-center" id="tbalamat" name="tbalamat" placeholder="Alamat Tinggal"><?= $detailuser['alamat_tinggal']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tblokasimagang" class="col-sm-4 col-form-label">Lokasi Magang <font style="color:red">*</font></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control text-center" id="tblokasimagang" name="tblokasimagang" placeholder="Lokasi Magang" value="<?= $detailuser['lokasi_magang']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tblokasisarjanah" class="col-sm-4 col-form-label">Pendidikan Kenotariatan </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control text-center" id="tblokasisarjanah" name="tblokasisarjanah" placeholder="Pendidikan Kenotariatan" value="<?= $detailuser['lokasi_sarjana']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="tbemail" class="col-sm-4 col-form-label">Email <font style="color:red">*</font></label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control text-center" id="tbemail" name="tbemail" placeholder="Email" value="<?= $detailuser['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbpass" class="col-sm-4 col-form-label">Password <font style="color:red">*</font></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control text-center" id="tbpass" name="tbpass" placeholder="Password" value="<?= $password; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="fijazahs1" class="col-sm-6 col-form-label">fc Ijazah SH (Legalisir) <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file ">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fijazahs1" name="fijazahs1">
                                                    <label class="custom-file-label" for="fijazahs1"><?= $ijazah_s1; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fijazahs2" class="col-sm-6 col-form-label">fc Ijazah MKn (Legalisir) <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file ">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fijazahs2" name="fijazahs2">
                                                    <label class="custom-file-label" for="fijazahs2"><?= $ijazah_s2; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ftranskript" class="col-sm-6 col-form-label">fc Transkrip nilai MKn (Legalisir) <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="ftranskript" name="ftranskript">
                                                    <label class="custom-file-label" for="ftranskript"><?= $transkrip; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ffotoktp" class="col-sm-6 col-form-label">fc KTP (Legalisir) <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="ffotoktp" name="ffotoktp">
                                                    <label class="custom-file-label" for="ffotoktp"><?= $foto_ktp; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fuangpangkal" class="col-sm-6 col-form-label">Kwitansi Uang Pangkal <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-6">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fuangpangkal" name="fuangpangkal">
                                                    <label class="custom-file-label" for="fuangpangkal"><?= $uang_pangkal; ?></label>
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