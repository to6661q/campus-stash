    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Detail Wreda</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                <?php if ($detail['foto'] != '') { ?>
                                                    <img src="<?= '/img/foto/' . $detail['id_user'] . '.jpg'; ?>" width="200">
                                                <?php } else { ?>
                                                    <img src="/img/nopicture.png" width="200">
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td><?= $detail['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat / Tgl Lahir</td>
                                            <td><?= $detail['tempat_lahir']; ?> / <?= $detail['tgl_lahir']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Tinggal</td>
                                            <td><?= $detail['alamat_tinggal']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Kantor</td>
                                            <td><?= $detail['alamat_kantor']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No Tlp</td>
                                            <td><?= $detail['no_tlp']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No KTP</td>
                                            <td><?= $detail['no_ktp']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?= $detail['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pengwil</td>
                                            <td><?= $detail['pengwil']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pengda</td>
                                            <td><?= $detail['pengda']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-success">
                            <div class="card-header center">
                                Dokumen
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="<?= '/img/sertifikatprotokol/' . $detail['id_user'] . '.pdf'; ?>" target="_blank">
                                                    Sertifikat Protokol Serah Terima
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="<?= '/img/sk/' . $detail['id_user'] . '.pdf'; ?>" target="_blank">
                                                    SK pengangkatan
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="<?= '/img/bas/' . $detail['id_user'] . '.pdf'; ?>" target="_blank">
                                                    BA sumpah
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="<?= '/img/skalb/' . $detail['id_user'] . '.pdf'; ?>" target="_blank">
                                                    Surat keterangan ALB
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="<?= '/img/pengda/' . $detail['id_user'] . '.pdf'; ?>" target="_blank">
                                                    Rekomendasi Pengda
                                                </a>
                                            </td>
                                        </tr>
                                        <?php foreach ($dokumen as $ldokumen) { ?>
                                            <tr>
                                                <td>
                                                    <a href="<?= '/img/dokumen/' . $ldokumen['id_user'] . '_' . $ldokumen['id_dokumen'] . '.pdf'; ?>" target="_blank">
                                                        <?= $ldokumen['nama_dokumen']; ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card card-success">
                            <div class="card-header center">
                                Sertifikat
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <?php foreach ($sertifikat as $sertifikat1) { ?>
                                            <tr>
                                                <td>
                                                    <?php if ($sertifikat1['status'] == 1) { ?>
                                                        <a href="<?= '/anggota/sertifikat/' . $detail['id_user'] . '/' . strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $sertifikat1['nama_pelatihan'])); ?>" target="_blank">
                                                            <?= $sertifikat1['nama_pelatihan']; ?>
                                                        </a>
                                                    <?php } else { ?>
                                                        <?= $sertifikat1['nama_pelatihan']; ?>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($sertifikat1['status'] == 0) { ?>
                                                        <a class="btn btn-warning" href="/anggota/approvesertifikat/<?= $sertifikat1['id_peserta']; ?>" onclick="return confirm('Apakah anda yakin menyetujui?');">Approve</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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