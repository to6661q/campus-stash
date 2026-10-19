<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <form action="/UserRole/index" method="post">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">List Anggota</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content-header -->
        <!-- Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary ">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="tbnoktp" class="col-sm-1 col-form-label">KTP</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="tbnoktp" name="tbnoktp">
                                    </div>
                                    <label for="tbnama" class="col-sm-1 col-form-label">Nama</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="tbnama" name="tbnama">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-success">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!--/.card-header -->
                            <div class="card-body" id="divTableDataHolder" style="font-size:12px;">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Nomor Anggota</th>
                                            <th>Role</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listanggota as $langgota) : ?>
                                            <tr>
                                                <td><?= $langgota['nama']; ?></td>
                                                <td><?= $langgota['no_ktp']; ?></td>
                                                <td><?= $langgota['no_anggota']; ?></td>
                                                <td><?= $langgota['nama_role']; ?></td>
                                                <td><a type="button" class="btn btn-warning" href="/userrole/edit/<?= $langgota['id_user']; ?>">Edit</a></td>
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