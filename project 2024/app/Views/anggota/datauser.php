<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Anggota</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/plugin/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/plugin/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/plugin/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/plugin/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/plugin/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/plugin/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/plugin/summernote/summernote-bs4.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugin/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugin/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugin/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Profile Anggota</h1>
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
                                                    <?php if ($detailuser['foto'] != '') { ?>
                                                        <img src="<?= '/img/foto/' . $detailuser['id_user'] . '.jpg'; ?>" width="200">
                                                    <?php } else { ?>
                                                        <img src="/img/nopicture.png" width="200">
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td><?= $detailuser['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat / Tgl Lahir</td>
                                                <td><?= $detailuser['tempat_lahir']; ?> / <?= $detailuser['tgl_lahir']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat Tinggal</td>
                                                <td><?= $detailuser['alamat_tinggal']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat Kantor</td>
                                                <td><?= $detailuser['alamat_kantor']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Lokasi Magang</td>
                                                <td><?= $detailuser['lokasi_magang']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>No Tlp</td>
                                                <td><?= $detailuser['no_tlp']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>No KTP</td>
                                                <td><?= $detailuser['no_ktp']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?= $detailuser['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pengda</td>
                                                <td><?= $detailuser['pengda']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pengwil</td>
                                                <td><?= $detailuser['pengwil']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>No SK</td>
                                                <td><?= $detailuser['no_sk']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tgl SK</td>
                                                <td><?= $detailuser['tanggal_sk']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>No BAS</td>
                                                <td><?= $detailuser['no_bas']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tgl BAS</td>
                                                <td><?= $detailuser['tanggal_bas']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-warning">
                                <div class="card-header text-center" style="font-size:12px;">
                                    <table width="100%">
                                        <tr>
                                            <td colspan="2">Surat ini sudah di tandatangani secara elektronik oleh.</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <font style="font-size: 14px;"><u>Dr. HAPENDI HARAHAP, S.H., Sp.N., M.H</u></font>
                                            </td>
                                            <td>
                                                <font style="font-size: 14px;"><u>OTTY HC UBAYANI, S.H., Sp.N., M.H</u></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <font style="font-size: 14px;">Ketua Umum</font>
                                            </td>
                                            <td>
                                                <font style="font-size: 14px;">Sekretaris Umum</font>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!--
                            <?php
                            if ($detailuser['jenis'] == 'alb') {
                                if ($pelatihan3 != 0 || $pelatihan4 != 0 || $pelatihan5 != 0) { ?>
                                    <div class="card card-success">
                                        <div class="card-header text-center" style="font-size:16px;">
                                            <b>Terimakasih Telah Mandaftar Diklasar I,II
                                                <br>dan Pembekalan Kode Etik </b>
                                        </div>
                                        <div class="card-body">
                                            Kepada Yth,
                                            <br>Seluruh Peserta Diklatsar I&II Tahun 2023
                                            <br>Dimohon kehadirannya pada
                                            <br>Hari : Jumat dan Sabtu
                                            <br>Tanggal : 21 Juli 2023 dan 22 Juli 2023
                                            <br>Pukul : 06.30 WIB s/d Selesai
                                            <br>Agenda : DIKLATSAR I&II TAHUN 2023
                                            <br>Passcode : 21072023
                                        </div>
                                        <div class="card-body">
                                            <a class="btn btn-success" href="/pendaftaranpelatihan/absenEvent/<?= $detailuser['id_user']; ?>"> Link Zoom </a>
                                            <a class="btn btn-success" href="/dokumen/Tatatertib_Diklasar1_2023.pdf"> Tata Tertib</a>
                                            <a class="btn btn-success" href="/img/BGDiklasar2023.png"> Background</a>
                                        </div>
                                    </div>
                            <?php }
                            }  ?>
                            !-->
                            <?php if ($pelatihan == 0 && $pelatihan1 == 0 && $pelatihan2 == 0) { ?>
                                <div class="card card-success">
                                    <div class="card-header text-justify" style="font-size:16px;">
                                        <b>Pendaftaran Rakernas 2023 Labuan Bajo</b>
                                    </div>
                                    <div class="card-body">
                                        Selamat datang di link pendaftaran Rakernas 2023.
                                        <br>Click Link di bawah untuk mendaftar !!
                                    </div>
                                    <div class="card-body">
                                        <?php if ($detailuser['jenis'] == 'alb') { ?>
                                            <a class="btn btn-success" href="<?= '/rakernasbajo2023/alb/' . $detailuser['id_user']; ?>"> Mendaftar Rakernas Labuan Bajo 2023</a>
                                        <?php } else { ?>
                                            <a class="btn btn-success" href="<?= '/rakernasbajo2023/anggota/' . $detailuser['id_user']; ?>"> Mendaftar Rakernas Labuan Bajo 2023</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } else {
                                if ($pelatihanConfirm2 != 0) { ?>
                                    <div class="card card-success">
                                        <div class="card-header text-justify" style="font-size:16px;">
                                            <b>Rakernas Labuan Bajo 2023</b>
                                        </div>
                                        <div class="card-body">
                                            <a class="btn btn-success" href="<?= '/rakernasbajo2023/kartuimage/' . $detailuser['id_user'] . '/org'; ?>">Kartu Peserta</a>
                                        </div>
                                    </div>
                                <?php }
                                if ($pelatihanConfirm1 != 0) { ?>
                                    <div class="card card-success">
                                        <div class="card-header text-justify" style="font-size:16px;">
                                            <b>Rakernas Labuan Bajo 2023</b>
                                        </div>
                                        <div class="card-body">
                                            <a class="btn btn-success" href="<?= '/rakernasbajo2023/kartuimage/' . $detailuser['id_user'] . '/str'; ?>">Kartu Peserta</a>
                                        </div>
                                    </div>
                                <?php }
                                if ($pelatihanConfirm != 0) { ?>
                                    <div class="card card-success">
                                        <div class="card-header text-justify" style="font-size:16px;">
                                            <b>Rakernas Labuan Bajo 2023</b>
                                        </div>
                                        <div class="card-body">
                                            <a class="btn btn-success" href="<?= '/rakernasbajo2023/kartuimage/' . $detailuser['id_user'] . '/anggota'; ?>">Kartu Peserta</a>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                            <!--Button untuk Pemesanan Buku-->
                            <div class="card card-primary">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <!-- ... Tabel profil anggota ... -->
                                    </table>
                                </div>
                            </div>

                            <!-- Tombol Menu Penjualan -->
                            <div class="text-center">
                                <a href="<?= base_url('shop') ?>" class="btn btn-primary">Menu Penjualan</a>
                            </div>


                            <!--
                            <div class="card card-success">
                                <div class="card-header center">
                                    Sertifikat
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <?php foreach ($sertifikat as $sertifikat1) {
                                                if ($sertifikat1['status'] == 1) { ?>
                                                    <tr>
                                                        <td>
                                                            <a href="<?= '/alb/sertifikat/' . $detailuser['id_user'] . '/' . strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $sertifikat1['nama_pelatihan'])); ?>" target="_blank">
                                                                <?= $sertifikat1['nama_pelatihan']; ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            !-->
                            <?php if ($detailuser['jenis'] == 'alb' && $detailuser['status'] == 1) { ?>
                                <a class="btn btn-success" href="<?= '/alb/skalb/' . $detailuser['id_user']; ?>">SK ALB</a>
                            <?php } ?>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>