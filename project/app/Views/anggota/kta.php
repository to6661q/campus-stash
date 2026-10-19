<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kartu Tanda Anggota</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style type="text/css">
        @page {
            size: portrait;
            margin: 0mm;
            width: 57mm;
            height: 88mm;
        }

        .imgbg {
            display: block;
            width: 57mm;
            height: 88mm;
        }

        .logoippat {
            position: absolute;
            top: 1.8mm;
            left: 23.5mm;
            width: 9.7mm;
            height: 9.7mm;
        }

        .kata {
            position: absolute;
            top: 10.7mm;
            left: 1mm;
            width: 55mm;
            height: 88mm;
            text-align: center;
            color: #FFFFFF;
            font-size: 14px;
            font-family: 'Calibri';
            font-weight: bold;
        }

        .kata1 {
            position: absolute;
            top: 16mm;
            left: 1mm;
            width: 55mm;
            height: 88mm;
            text-align: center;
            color: #FFFFFF;
            font-size: 7px;
            font-family: 'Calibri';
        }

        .foto {
            position: absolute;
            top: 22mm;
            left: 20.8mm;
            width: 15mm;
            height: 22.5mm;
        }

        .nomor {
            position: absolute;
            top: 45.3mm;
            left: 1mm;
            width: 55mm;
            height: 7.7mm;
            text-align: center;
            color: #FFFFFF;
            font-size: 15px;
            font-family: 'Calibri';
            font-weight: bold;
        }

        .nama {
            position: absolute;
            top: 50.1mm;
            left: 1mm;
            width: 55mm;
            text-align: center;
            color: white;
            font-size: 10px;
            font-family: 'Calibri';
            font-weight: bold;
        }

        .pengwil {
            position: absolute;
            top: 53.6mm;
            left: 1mm;
            width: 55mm;
            text-align: center;
            color: white;
            font-size: 10px;
            font-family: 'Calibri';
            font-weight: bold;
        }

        .disclamer {
            position: absolute;
            top: 59mm;
            left: 1mm;
            width: 55mm;
            height: 4.7mm;
            text-align: center;
            color: white;
            font-size: 7px;
            font-family: 'Calibri';
            font-weight: bold;
        }

        .qr {
            position: absolute;
            top: 62.6mm;
            left: 21.6mm;
            width: 13.4mm;
            height: 13.4mm;
        }

        .periode {
            position: absolute;
            top: 75.6mm;
            left: 1mm;
            width: 55mm;
            height: 5.1mm;
            text-align: center;
            color: white;
            font-size: 8px;
            font-family: 'Calibri';
            font-weight: bold;
        }

        .ketua {
            position: absolute;
            top: 78mm;
            left: 1mm;
            width: 28.5mm;
            text-align: center;
            color: white;
            font-size: 8px;
            font-family: 'Agency FB';
            font-weight: bold;
        }

        .sekertaris {
            position: absolute;
            top: 78mm;
            left: 27.5mm;
            width: 28.5mm;
            text-align: center;
            color: white;
            font-size: 8px;
            font-family: 'Agency FB';
            font-weight: bold;
        }
    </style>

</head>

<body>
    <img src="/img/BGKTA.png" class="imgbg">
    <img src="/img/LogoIPPAT.png" class="logoippat">
    <span class="kata">
        KARTU TANDA ANGGOTA
    </span>
    <span class="kata1">
        IKATAN PEJABAT PEMBUAT AKTA TANAH<br>
        (IPPAT)
    </span>
    <img src="/img/foto/<?= $detail['id_user']; ?>.jpg" class="foto">
    <span class="nomor">
        <?= implode(' ', str_split($nomor)); ?>
    </span>
    <span class="nama">
        <?= $detail['nama']; ?>
    </span>
    <span class="pengwil">
        <?= $detail['pengwil']; ?> - <?= $detail['pengda']; ?>
    </span>
    <span class="disclamer">
        KTA ini sudah ditandatangani secara elektronik
    </span>
    <img src="/img/qr/<?= $qr; ?>" class="qr">
    <span class="periode">
        2021 - 2024
    </span>
    <span class="ketua">
        Dr.HAPENDI HARAHAP SH.,Sp.N.,MH<br>
        Ketua Umum
    </span>
    <span class="sekertaris">
        OTTY H.C UBAYANI SH.,Sp.N.,MH<br>
        Sekretaris Umum
    </span>

</body>

</html>