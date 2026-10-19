<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <form action="/admin/upload" method="post" enctype="multipart/form-data">
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
                                            <?php if ($delete == true) { ?>
                                                <th></th>
                                            <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listdokumen as $dokumen) : ?>
                                            <tr>
                                                <td>
                                                    <?php if ($download == true) { ?>
                                                        <a href="/dokumen/<?= $dokumen['dokumen']; ?>" download><?= $dokumen['dokumen']; ?></a>
                                                    <?php } else { ?>
                                                        <?= $dokumen['dokumen']; ?>
                                                    <?php } ?>
                                                </td>
                                                <td><?= $dokumen['created_at']; ?></td>
                                                <?php if ($delete == true) { ?>
                                                    <td>
                                                        <a href="/admin/deleteDokumen/<?= $dokumen['id_dokumen']; ?>" onclick="return confirm('Are you sure you want to delete?');">
                                                            <img src="/img/trash.png" width="20">
                                                        </a>

                                                    </td>
                                                <?php } ?>
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