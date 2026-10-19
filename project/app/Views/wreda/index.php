<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <form action="/wreda/index" method="post">
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
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="tbnoktp" name="tbnoktp">
                                    </div>
                                    <label for="tbnama" class="col-sm-1 col-form-label">Nama</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="tbnama" name="tbnama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cbstatus" class="col-sm-1 col-form-label">Status</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="cbstatus" name="cbstatus">
                                            <option value="2">Please Select</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Pending</option>
                                        </select>
                                    </div>
                                    <label for="cbpengda" class="col-sm-1 col-form-label">Pengda</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="cbpengda" name="cbpengda">
                                            <option value="0">Please Select</option>
                                            <?php foreach ($cbpengda as $pengda) : ?>
                                                <option value="<?= sprintf("%02d", $pengda['id_pengwil']) . sprintf("%02d", $pengda['id_pengda']); ?>"><?= $pengda['pengda']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success">Browse</button>
                                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-download"></i> Export
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" target="_blank" href="/wreda/printwreda/<?= $sktp; ?>/<?= $snama; ?>/<?= $spengda; ?>/<?= $sstatus; ?>">Print</a></li>
                                            <li><a class="dropdown-item" href="/wreda/exportexcel/<?= $sktp; ?>/<?= $snama; ?>/<?= $spengda; ?>/<?= $sstatus; ?>">Excel</a></li>
                                        </ul>
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
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Pengwil</th>
                                            <th>Pengda</th>
                                            <th>SPST</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listanggota as $langgota) : ?>
                                            <tr>
                                                <td>
                                                    <a href="/wreda/detail/<?= $langgota['id_user']; ?>">
                                                        <?php if ($langgota['foto'] != '') { ?>
                                                            <img src="<?= '/img/foto/' . $langgota['id_user'] . '.jpg'; ?>" width="100">
                                                        <?php } else { ?>
                                                            <img src="/img/nopicture.png" width="100">
                                                        <?php } ?>
                                                    </a>
                                                </td>
                                                <td><?= $langgota['nama']; ?></td>
                                                <td><?= $langgota['pengwil']; ?></td>
                                                <td><?= $langgota['pengda']; ?></td>
                                                <td align="center">
                                                    <?php if ($langgota['sertifikat_protokol'] != '') { ?>
                                                        <a href="<?= '/img/sertifikatprotokol/' . $langgota['id_user'] . '.pdf'; ?>" target="_blank">
                                                            <img src="/img/check.png" width="20">
                                                        </a>
                                                    <?php } else { ?>
                                                        <img src="/img/cross.png" width="20">
                                                    <?php } ?>
                                                </td>
                                                <td align="center">
                                                    <?php if ($langgota['status'] != 1) { ?>
                                                        <a class="btn btn-warning" href="/wreda/approve/<?= $langgota['id_user']; ?>" onclick="return confirm('Apakah anda yakin menyetujui?');"> Pending </a>
                                                    <?php } else { ?>
                                                        <a class="btn btn-success"> Active </a>
                                                    <?php } ?>
                                                </td>
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