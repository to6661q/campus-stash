<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sertifikat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style type="text/css">
        @page {
            size: landscape;
            size: F4;
            margin: 0mm;
            width: 330mm;
            height: 210mm;
        }

        .imgbg {
            display: block;
            width: 330mm;
            height: 210mm;
        }

        .nama {
            position: absolute;
            top: 75mm;
            width: 330mm;
            text-align: center;
            color: black;
            font-size: 40px;
            font-family: 'Times New Roman';
            font-weight: bold;
        }

        .nomor {
            position: absolute;
            top: 87mm;
            width: 330mm;
            text-align: center;
            color: black;
            font-size: 30px;
            font-family: 'Times New Roman';
            font-weight: bold;
        }

        .qr {
            position: absolute;
            top: 14mm;
            left: 150mm;
            width: 30mm;
            height: 30mm;
        }
    </style>

</head>

<body onload="window.print();">
    <img src="/img/Pusdatin2022.png" class="imgbg">
    <span class="nama">
        <?= $detail['nama']; ?>
    </span>
    <span class="nomor">
        <?= $detail['id_pengwil'] . '.' . $detail['id_pengda'] . '.' . $detail['no_anggota']; ?>
    </span>
    <img src="/img/qr/<?= $qr; ?>" width="120" class="qr">
</body>

</html>