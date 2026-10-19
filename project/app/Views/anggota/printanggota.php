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
                <th>Pengwil</th>
                <th>Pengda</th>
                <th>Ijazah</th>
                <th>SK</th>
                <th>BAS</th>
                <th>Rek Pengda</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listanggota as $frlistanggota) : ?>
                <tr>
                    <td><img src="/img/foto/<?= $frlistanggota['foto']; ?>" width="100"></td>
                    <td><?= $frlistanggota['nama']; ?></td>
                    <td><?= $frlistanggota['pengwil']; ?></td>
                    <td><?= $frlistanggota['pengda']; ?></td>
                    <td align="center">
                        <?php if ($frlistanggota['ijasah'] != '') { ?>
                            <img src="/img/check.png" width="20">
                        <?php } else { ?>
                            <img src="/img/cross.png" width="20">
                        <?php } ?>
                    </td>
                    <td align="center">
                        <?php if ($frlistanggota['sk_jabatan'] != '') { ?>
                            <img src="/img/check.png" width="20">
                        <?php } else { ?>
                            <img src="/img/cross.png" width="20">
                        <?php } ?>
                    </td>
                    <td align="center">
                        <?php if ($frlistanggota['bas_jabatan'] != '') { ?>
                            <img src="/img/check.png" width="20">
                        <?php } else { ?>
                            <img src="/img/cross.png" width="20">
                        <?php } ?>
                    </td>
                    <td align="center">
                        <?php if ($frlistanggota['rek_pengda'] != '') { ?>
                            <img src="/img/check.png" width="20">
                        <?php } else { ?>
                            <img src="/img/cross.png" width="20">
                        <?php } ?>
                    </td>
                    <td align="center">
                        <?php if ($frlistanggota['status'] != 0) { ?>
                            <img src="/img/check.png" width="20">
                        <?php } else { ?>
                            <img src="/img/cross.png" width="20">
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>