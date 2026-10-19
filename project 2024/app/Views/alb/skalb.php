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

<body onload="window.print();">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div>
            <table class="table table-borderless">
                <tr>
                    <td width="20%">
                        <img class="float-right" src="/img/LogoIPPAT.png" width="120">
                    </td>
                    <td colspan="2" class="align-middle">
                        <p class="lh-1">
                            <font style="color:green;font-size: 24px;">PENGURUS PUSAT</font><br>
                            <font style="color:green;font-size: 24px;">IKATAN PEJABAT PEMBUAT AKTA TANAH (PP – IPPAT)</font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">
                        <p>
                            <?= 'Jakarta, ' . date('d F Y'); ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">
                        <p class="lh-1">
                            <font style="font-size: 16px;font-weight: bold;">SURAT KETERANGAN TERDAFTAR ANGGOTA LUAR BIASA</font><br><br>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td rowspan="10" class="align-top">
                        <img class="float-right" src="/img/<?= $picture; ?>" width="120" height="180">
                    </td>
                    <td colspan="2">Pengurus Pusat Ikatan Pejabat Pembuat Akta Tanah (PP-IPPAT), dengan ini menerangkan bahwa:</td>
                </tr>
                <tr>
                    <td width="30%">Nomor ALB</td>
                    <td width="50%"><?= $nomoralb; ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td> : <?= $detailuser['nama']; ?></td>
                </tr>
                <tr>
                    <td>Tempat Tgl Lahir</td>
                    <td> : <?= $detailuser['tempat_lahir'] . ', ' . $detailuser['tgl_lahir']; ?></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td> : <?= $detailuser['no_ktp']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> : <?= $detailuser['alamat_tinggal']; ?></td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td> : <?= $detailuser['no_tlp']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td> : <?= $detailuser['email']; ?></td>
                </tr>
                <tr>
                    <td>Lokasi Magang</td>
                    <td> : <?= $detailuser['lokasi_magang']; ?></td>
                </tr>
                <tr>
                    <td colspan="2">Telah terdaftar sebagai Anggota Luar Biasa (ALB) Ikatan Pejabat Pembuat Akta Tanah (IPPAT).</td>
                </tr>
                <tr>
                    <td colspan="3" class="align-middle text-center">
                        <p class="lh-1">
                            <font style="font-size: 16px;font-weight: bold;">PENGURUS PUSAT</font><br>
                            <font style="font-size: 16px;font-weight: bold;">IKATAN PEJABAT PEMBUAT AKTA TANAH</font><br>
                            <font style="font-size: 16px;font-weight: bold;">(PP-IPPAT)</font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class='text-center'>
                        <img src="/img/qr/<?= $qr; ?>" width="120">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class='text-center'>
                        <table width="100%">
                            <tr>
                                <td width="18%"></td>
                                <td class='text-center'>
                                    <font style="font-size: 14px;"><u>Dr. HAPENDI HARAHAP, S.H., Sp.N., M.H</u></font>
                                </td>
                                <td class='text-center'>
                                    <font style="font-size: 14px;"><u>OTTY HC UBAYANI, S.H., Sp.N., M.H</u></font>
                                </td>
                                <td width="22%"></td>
                            </tr>
                            <tr>
                                <td width="18%"></td>
                                <td class='text-center'>
                                    <font style="font-size: 14px;">Ketua Umum</font>
                                </td>
                                <td class='text-center'>
                                    <font style="font-size: 14px;">Sekretaris Umum</font>
                                </td>
                                <td width="22%"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        Dokumen ini dicetak pada tanggal <?= date("Y-m-d") . ' pukul' . date("H:i:s"); ?> WIB melalui laman www.ppippat.org, berisi tentang:<br>
                        1. Data diri Anggota Luar Biasa (ALB) Ikatan Pejabat Pembuat Akta Tanah (IPPAT).<br>
                        2. Hasil cetak ini sebagai keterangan terdaftar sebagai ALB IPPAT dan yang bersangkutan memiliki hak mengikuti Diklasar I, Diklasar II dan Pembekalan Kode Etik PPAT (tidak dipungut biaya).<br>
                        3. Surat ini juga sebagai rekomendasi bagi yang bersangkutan untuk mengajukan permohonan magang serta lain untuk kepentingan sebagai ALB
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class='text-center'>
                        Sekretariat :<br>
                        Ruko Mediterania Gajah Mada Residence, Blok TUC 02<br>
                        Jl. Gajah Mada No. 174 Jakarta Barat 11130<br>
                        Telp. (021) 22066368<br>
                        www.ppippat.org
                    </td>
                </tr>
            </table>
        </div>
    </div>