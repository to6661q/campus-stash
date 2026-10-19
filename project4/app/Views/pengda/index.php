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
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <form action="/pengda/upload" method="post" enctype="multipart/form-data">
            <!-- Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary ">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="fphoto" class="col-sm-3 col-form-label">Dokumen</label>
                                        <div class="input-group col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" accept=".xls, .xlsx, .zip" class="custom-file-input" id="fphoto" name="fphoto">
                                                <label class="custom-file-label" for="fphoto">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-success">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!--/.card-header -->
                                <div class="card-body" id="divTableDataHolder">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Dokumen</th>
                                                <th>Create Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($listdokumen as $dokumen) : ?>
                                                <tr>
                                                    <td><?= $dokumen['dokumen']; ?></td>
                                                    <td><?= $dokumen['created_at']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </form>
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