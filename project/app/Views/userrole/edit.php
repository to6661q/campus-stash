<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $judul; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="/UserRole/edit_proc" method="post" enctype="multipart/form-data">
                <input type="hidden" id="tbid" name="tbid" value="<?= $datauser['id_user']; ?>">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="tbnama" class="col-sm-4 col-form-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control text-center" id="tbnama" name="tbnama" placeholder="Nama Anggota" value="<?= $datauser['nama']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cbrole" class="col-sm-4 col-form-label">Role</label>
                                    <div class="col-sm-8">
                                        <select class="form-control text-center" id="cbrole" name="cbrole">
                                            <?php foreach ($cbrole as $role) :
                                                if ($role['id_role'] == $datauser['id_role']) { ?>
                                                    <option value="<?= $role['id_role']; ?>" selected><?= $role['nama_role']; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $role['id_role']; ?>"><?= $role['nama_role']; ?></option>
                                            <?php }
                                            endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a type="button" class="btn btn-danger" href="/UserRole/index">Cancel</a>
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