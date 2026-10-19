<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <form action="/alb/index" method="post">
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
                                    <label for="tbfrom" class="col-sm-1 col-form-label">From </label>
                                    <div class="input-group date col-sm-5" id="fromdt" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="tbfrom" name="tbfrom" data-target="#fromdt" />
                                        <div class="input-group-append" data-target="#fromdt" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <label for="cbstatus" class="col-sm-1 col-form-label">Status</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="cbstatus" name="cbstatus">
                                            <option value="2">Please Select</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tbto" class="col-sm-1 col-form-label">To </label>
                                    <div class="input-group date col-sm-5" id="todt" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="tbto" name="tbto" data-target="#todt" />
                                        <div class="input-group-append" data-target="#todt" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success">Cari</button>
                                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-download"></i> Export
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" target="_blank" href="/alb/printalb/<?= $sktp; ?>/<?= $snama; ?>/<?= $sstatus; ?>/<?= $sfrom; ?>/<?= $sto; ?>">Print</a></li>
                                            <li><a class="dropdown-item" href="/alb/exportexcel/<?= $sktp; ?>/<?= $snama; ?>/<?= $sstatus; ?>/<?= $sfrom; ?>/<?= $sto; ?>">Excel</a></li>
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
                                            <th>#</th>
                                            <th>Foto</th>
                                            <th>No ALB</th>
                                            <th>Nama</th>
                                            <th>Ijazah</th>
                                            <th>Transkrip</th>
                                            <th>Foto KTP</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listanggota as $anggota) : ?>
                                            <tr>
                                                <td>
                                                    <a href="/alb/editbyid/<?= $anggota['id_user']; ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="/alb/delete/<?= $anggota['id_user']; ?>" onclick="return confirm('Apakah anda yakin mengapus data ini?');">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="/alb/detail/<?= $anggota['id_user']; ?>" title='detil'>
                                                        <?php if ($anggota['foto'] != '') { ?>
                                                            <img src="<?= '/img/foto/' . $anggota['id_user'] . '.jpg'; ?>" width="60" height="80">
                                                        <?php } else { ?>
                                                            <img src="/img/nopicture.png" width="60" height="80">
                                                        <?php } ?>
                                                    </a>
                                                </td>
                                                <td><?= date("Y.m.", strtotime($anggota['created_at'])) . $anggota['no_alb']; ?></td>
                                                <td><?= $anggota['nama']; ?></td>
                                                <td align="center">
                                                    <?php if ($anggota['ijazah_s1'] != '') { ?>
                                                        <a href="<?= '/img/ijazahs1/' . $anggota['id_user'] . '.pdf'; ?>" target="_blank">
                                                            <img src="/img/check.png" width="20">
                                                        </a>
                                                    <?php } else { ?>
                                                        <img src="/img/cross.png" width="20">
                                                    <?php } ?>
                                                </td>
                                                <td align="center">
                                                    <?php if ($anggota['transkrip'] != '') { ?>
                                                        <a href="<?= '/img/transkript/' . $anggota['id_user'] . '.pdf'; ?>" target="_blank">
                                                            <img src="/img/check.png" width="20">
                                                        </a>
                                                    <?php } else { ?>
                                                        <img src="/img/cross.png" width="20">
                                                    <?php } ?>
                                                </td>
                                                <td align="center">
                                                    <?php if ($anggota['foto_ktp'] != '') { ?>
                                                        <a href="<?= '/img/ktp/' . $anggota['id_user'] . '.pdf'; ?>" target="_blank">
                                                            <img src="/img/check.png" width="20">
                                                        </a>
                                                    <?php } else { ?>
                                                        <img src="/img/cross.png" width="20">
                                                    <?php } ?>
                                                </td>
                                                <td align="center">
                                                    <?php if ($anggota['status'] != 1) { ?>
                                                        <a class="btn btn-warning" href="/alb/approve/<?= $anggota['id_user']; ?>" onclick="return confirm('Apakah anda yakin menyetujui?');">Pending</a>
                                                    <?php } else { ?>
                                                        <a class="btn btn-success" href="/alb/reject/<?= $anggota['id_user']; ?>" onclick="return confirm('Apakah anda yakin menonaktifkan?');">Active</a>
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