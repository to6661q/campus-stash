<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <form action="/anggota/index" method="post">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">List Peserta</h1>
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
                                    <label for="tbnoktp" class="col-sm-2 col-form-label">KTP</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="tbnoktp" name="tbnoktp">
                                    </div>
                                    <label for="tbnama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="tbnama" name="tbnama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cbstatus" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="cbstatus" name="cbstatus">
                                            <option value="2">Please Select</option>
                                            <option value="1">Berpartisipasi</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <label for="cbsertifikat" class="col-sm-2 col-form-label">Nama Pelatihan</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="cbsertifikat" name="cbsertifikat">
                                            <option value="0">Please Select</option>
                                            <?php foreach ($cbsertifikat as $sertifikat) : ?>
                                                <option value="<?= $sertifikat['id_pelatihan']; ?>"><?= $sertifikat['nama_pelatihan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cbjenis" class="col-sm-2 col-form-label">Jenis</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="cbjenis" name="cbjenis">
                                            <option value="0">Please Select</option>
                                            <option value="senior">Anggota Perpanjang</option>
                                            <option value="anggota">Anggota</option>
                                            <option value="alb">Alb</option>
                                            <option value="wreda">Wreda</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <a class="btn btn-success" href="/anggota/add">Tambah</a>
                                        <button type="submit" class="btn btn-success">Browse</button>
                                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-download"></i> Export
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" target="_blank" href="/anggota/printanggota/<?= $sktp; ?>/<?= $snama; ?>/<?= $spengda; ?>/<?= $sstatus; ?>">Print</a></li>
                                            <li><a class="dropdown-item" href="/anggota/exportexcel/<?= $sktp; ?>/<?= $snama; ?>/<?= $spengda; ?>/<?= $sstatus; ?>">Excel</a></li>
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
                            <div class="card-body" id="divTableDataHolder" style="font-size:10px;">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Jenis</th>
                                            <th>Pengwil</th>
                                            <th>Pengda</th>
                                            <th>Pelatihan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listanggota as $langgota) : ?>
                                            <tr>
                                                <td><a href="/anggota/detail/<?= $langgota['id_user']; ?>">
                                                        <?php if ($langgota['foto'] != '') { ?>
                                                            <img src="<?= '/img/foto/' . $langgota['id_user'] . '.jpg'; ?>" width="100">
                                                        <?php } else { ?>
                                                            <img src="/img/nopicture.png" width="100">
                                                        <?php } ?>
                                                    </a>
                                                </td>
                                                <td><?= $langgota['nama']; ?></td>
                                                <td><?= $langgota['jenis']; ?></td>
                                                <td><?= $langgota['pengwil']; ?></td>
                                                <td><?= $langgota['pengda']; ?></td>
                                                <td><?= $langgota['nama_pelatihan']; ?></td>
                                                <td align="center">
                                                    <?php if ($langgota['status'] == 2) { ?>
                                                        Pending
                                                    <?php } else if ($langgota['status'] == 0) { ?>
                                                        Terdaftar
                                                    <?php } else { ?>
                                                        Hadir
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