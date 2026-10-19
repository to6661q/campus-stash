    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Pendaftaran Upgrading</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <form action="/rakernasippat2022/addalb_proc" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-body">
                                    ALB hanya mengikuti Upgrading
                                </div>
                            </div>
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="alert <?= $displayc; ?> alert-dismissible" <?= $displayw; ?>>
                                        <?= $warning; ?>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tbnomoralb" class="col-sm-6 col-form-label">Nomor ALB (xxxx.xx.xxxxx) <font style="color:red">*</font></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control text-center" id="tbnomoralb" name="tbnomoralb" placeholder="No Anggota">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fphoto" class="col-sm-4 col-form-label">Pas photo 3x4 (.jpg) <font style="color:red">*</font></label>
                                        <div class="input-group col-sm-8">
                                            <div class="custom-file">
                                                <input type="file" accept="image/jpg" class="custom-file-input" id="fphoto" name="fphoto">
                                                <label class="custom-file-label" for="fphoto">Choose file</label>
                                            </div>
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
                                            <input type="email" class="form-control text-center" id="tbemail" name="tbemail" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a type="button" class="btn btn-danger" href="/rakernasippat2022/index">Cancel</a>
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