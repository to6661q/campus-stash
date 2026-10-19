<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



    <form action="/anggota/index" method="post">

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

                                            <?php

                                            if ($detailuser['id_role'] == '1' || $detailuser['id_role'] == '2' || $detailuser['id_role'] == '9') {

                                            ?>

                                                <option value="0">Please Select</option>

                                            <?php

                                            }

                                            ?>



                                            <?php

                                            foreach ($cbpengda as $pengda) :

                                                if (($detailuser['id_pengwil'] == $pengda['id_pengwil'] && $detailuser['id_pengda'] == $pengda['id_pengda']) || $detailuser['id_role'] == '1' || $detailuser['id_role'] == '2' || $detailuser['id_role'] == '9') {

                                            ?>

                                                    <option value="<?= sprintf("%02d", $pengda['id_pengwil']) . sprintf("%02d", $pengda['id_pengda']); ?>"><?= $pengda['pengda']; ?></option>

                                            <?php

                                                }

                                            endforeach; ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6">

                                        <?php if (array_column($akses, 'add')[0] == '1') { ?>

                                            <a class="btn btn-success" href="/anggota/add">Tambah</a>

                                        <?php } ?>

                                        <button type="submit" class="btn btn-success">Browse</button>

                                        <?php if (array_column($akses, 'download')[0] == '1') { ?>

                                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                                                <i class="fa fa-download"></i> Export

                                            </button>

                                        <?php } ?>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" target="_blank" href="/anggota/printanggota/<?= $sktp; ?>/<?= $snama; ?>/<?= $spengda; ?>/<?= $sstatus; ?>">Print</a></li>

                                            <li><a class="dropdown-item" target="_blank" href="/anggota/exportexcel/<?= $sktp; ?>/<?= $snama; ?>/<?= $spengda; ?>/<?= $sstatus; ?>">Excel</a></li>

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

                                            <th>Nama</th>

                                            <th>No Anggota</th>

                                            <th>Pengwil</th>

                                            <th>Pengda</th>

                                            <th>SK</th>

                                            <th>BAS</th>

                                            <th>SK ALB</th>

                                            <th>Rek Pengda</th>

                                            <th>Sertifikat PK</th>

                                            <th>SK Perpanjangan</th>

                                            <th>Status</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php foreach ($listanggota as $langgota) : ?>

                                            <tr>

                                                <td>

                                                    <a href="/anggota/editbyid/<?= $langgota['id_user']; ?>">

                                                        <i class="fas fa-edit"></i>

                                                    </a>

                                                    <a href="/anggota/delete/<?= $langgota['id_user']; ?>" onclick="return confirm('Apakah anda yakin mengapus data ini?');">

                                                        <i class="fas fa-trash"></i>

                                                    </a>

                                                    <?php if ($langgota['status'] == 1) { ?>

                                                        <a href="/anggota/ktaimage/<?= $langgota['id_user']; ?>" target="_blank">KTA</a>

                                                    <?php } ?>

                                                </td>

                                                <td><a href="/anggota/detail/<?= $langgota['id_user']; ?>">

                                                        <?php if ($langgota['foto'] != '') { ?>

                                                            <img src="<?= '/img/foto/' . $langgota['id_user'] . '.jpg'; ?>" width="50">

                                                        <?php } else { ?>

                                                            <img src="/img/nopicture.png" width="50">

                                                        <?php } ?>

                                                    </a>

                                                </td>

                                                <td><?= $langgota['nama']; ?></td>

                                                <td><?= $langgota['id_pengwil'] . '.' . $langgota['id_pengda'] . '.' . $langgota['no_anggota']; ?></td>

                                                <td><?= $langgota['pengwil']; ?></td>

                                                <td><?= $langgota['pengda']; ?></td>

                                                <td align="center">

                                                    <?php if ($langgota['sk_jabatan'] != '') { ?>

                                                        <a href="<?= '/img/sk/' . $langgota['id_user'] . '.pdf'; ?>" target="_blank">

                                                            <img src="/img/check.png" width="20">

                                                        </a>

                                                    <?php } else { ?>

                                                        <img src="/img/cross.png" width="20">

                                                    <?php } ?>

                                                </td>

                                                <td align="center">

                                                    <?php if ($langgota['bas_jabatan'] != '') { ?>

                                                        <a href="<?= '/img/bas/' . $langgota['id_user'] . '.pdf'; ?>" target="_blank">

                                                            <img src="/img/check.png" width="20">

                                                        </a>

                                                    <?php } else { ?>

                                                        <img src="/img/cross.png" width="20">

                                                    <?php } ?>

                                                </td>

                                                <td align="center">

                                                    <?php if ($langgota['ket_alb'] != '') { ?>

                                                        <a href="<?= '/img/skalb/' . $langgota['id_user'] . '.pdf'; ?>" target="_blank">

                                                            <img src="/img/check.png" width="20">

                                                        </a>

                                                    <?php } else { ?>

                                                        <img src="/img/cross.png" width="20">

                                                    <?php } ?>

                                                </td>

                                                <td align="center">

                                                    <?php if ($langgota['rek_pengda'] != '') { ?>

                                                        <a href="<?= '/img/pengda/' . $langgota['id_user'] . '.pdf'; ?>" target="_blank">

                                                            <img src="/img/check.png" width="20">

                                                        </a>

                                                    <?php } else { ?>

                                                        <img src="/img/cross.png" width="20">

                                                    <?php } ?>

                                                </td>

                                                <td align="center">

                                                    <?php if ($langgota['sertifikat_peningkatan'] != '') { ?>

                                                        <a href="<?= '/img/sertifikatkualitas/' . $langgota['id_user'] . '.pdf'; ?>" target="_blank">

                                                            <img src="/img/check.png" width="20">

                                                        </a>

                                                    <?php } else { ?>

                                                        <img src="/img/cross.png" width="20">

                                                    <?php } ?>

                                                </td>

                                                <td align="center">

                                                    <?php if ($langgota['sk_perpanjangan'] != '') { ?>

                                                        <a href="<?= '/img/skperpanjang/' . $langgota['id_user'] . '.pdf'; ?>" target="_blank">

                                                            <img src="/img/check.png" width="20">

                                                        </a>

                                                    <?php } else { ?>

                                                        <img src="/img/cross.png" width="20">

                                                    <?php } ?>

                                                </td>

                                                <td align="center">

                                                    <?php

                                                    if (array_column($akses, 'approve')[0] == '1') {

                                                        if ($langgota['status'] != 1) { ?>

                                                            <a class="btn btn-warning" href="/anggota/approve/<?= $langgota['id_user']; ?>" onclick="return confirm('Apakah anda yakin menyetujui?');"> Pending </a>

                                                        <?php } else { ?>

                                                            <a class="btn btn-success" href="/anggota/reject/<?= $langgota['id_user']; ?>" onclick="return confirm('Apakah anda yakin menonaktifkan?');">Active</a>

                                                        <?php }
                                                    } else {

                                                        if ($langgota['status'] != 1) { ?>

                                                            Pending

                                                        <?php } else { ?>

                                                            Active

                                                    <?php }
                                                    } ?>

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