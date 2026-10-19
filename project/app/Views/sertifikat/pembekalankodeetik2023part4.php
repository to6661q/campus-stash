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
            top: 115mm;
            width: 330mm;
            text-align: center;
            color: black;
            font-size: 40px;
            font-family: 'Times New Roman';
            font-weight: bold;
        }

        .nomor {
            position: absolute;
            top: 5mm;
            left: 120mm;
            width: 330mm;
            text-align: center;
            color: red;
            font-size: 30px;
            font-family: 'Times New Roman';
            font-weight: bold;
        }

        .foto {
            position: absolute;
            top: 5mm;
            left: 5mm;
            width: 50mm;
            height: 60mm;
            border-top-right-radius: 25%;
        }

        .qr {
            position: absolute;
            top: 20mm;
            left: 270mm;
            width: 30mm;
            height: 30mm;
        }
    </style>

</head>

<body onload="window.print();">
    <img src="/img/BGSertifikatKodeEtik2023.png" class="imgbg">
    <span class="nama">
        <?= $detail['nama']; ?>
    </span>
    <span class="nomor">
        No. ALB <?= date("Y.m.", strtotime($detail['created_at'])) . $detail['no_anggota']; ?>
    </span>
    <img src="/img/foto/<?= $detail['id_user']; ?>.jpg" class="foto">
    <img src="/img/qr/<?= $qr; ?>" width="120" class="qr">
</body>

</html>