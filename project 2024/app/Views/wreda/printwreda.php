<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/plugin/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/plugin/summernote/summernote-bs4.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugin/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugin/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugin/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed" onload="window.print();">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat Tinggal</th>
                <th>Alamat Kantor</th>
                <th>Nomor Telp</th>
                <th>Nomor KTP</th>
                <th>Email</th>
                <th>Pengda</th>
                <th>Pengwil</th>
                <th>Sertifikat Protokol Serah Terima</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listanggota as $frlistanggota) : ?>
                <tr>
                    <?php if ($frlistanggota['foto'] != '') { ?>
                        <td><img src="<?= '/img/foto/' . $frlistanggota['foto']; ?>" width="100"></td>
                    <?php } else { ?>
                        <td><img src="/img/nopicture.png" width="100"></td>
                    <?php } ?>
                    <td><?= $frlistanggota['nama']; ?></td>
                    <td><?= $frlistanggota['tempat_lahir']; ?></td>
                    <td><?= $frlistanggota['tgl_lahir']; ?></td>
                    <td><?= $frlistanggota['alamat_tinggal']; ?></td>
                    <td><?= $frlistanggota['alamat_kantor']; ?></td>
                    <td><?= $frlistanggota['no_tlp']; ?></td>
                    <td><?= $frlistanggota['no_ktp']; ?></td>
                    <td><?= $frlistanggota['email']; ?></td>
                    <td><?= $frlistanggota['pengda']; ?></td>
                    <td><?= $frlistanggota['pengwil']; ?></td>
                    <td align="center">
                        <?php if ($frlistanggota['sertifikat_protokol'] != '') { ?>
                            <img src="/img/check.png" width="20">
                        <?php } else { ?>
                            <img src="/img/cross.png" width="20">
                        <?php } ?>
                    </td>
                    <td align="center">
                        <?php if ($frlistanggota['status'] != 1) { ?>
                            <img src="/img/cross.png" width="20">
                        <?php } else { ?>
                            <img src="/img/check.png" width="20">
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>