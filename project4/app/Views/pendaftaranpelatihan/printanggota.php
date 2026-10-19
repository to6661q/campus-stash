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
                <th>No Anggota</th>
                <th>Nama</th>
                <th>Pengwil</th>
                <th>Pengda</th>
                <th>Jenis</th>
                <th>Pelatihan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listanggota as $frlistanggota) : ?>
                <tr>
                    <td><img src="/img/foto/<?= $frlistanggota['id_user']; ?>.jpg" width="100"></td>
                    <td><?= $frlistanggota['no_anggota']; ?></td>
                    <td><?= $frlistanggota['nama']; ?></td>
                    <td><?= $frlistanggota['pengwil']; ?></td>
                    <td><?= $frlistanggota['pengda']; ?></td>
                    <td><?= $frlistanggota['jenis']; ?></td>
                    <td><?= $frlistanggota['nama_pelatihan']; ?></td>
                    <td align="center">
                        <?php if ($frlistanggota['status'] == 2) { ?>
                            Pending
                        <?php } else if ($frlistanggota['status'] == 0) { ?>
                            Terdaftar
                        <?php } else { ?>
                            Hadir
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>