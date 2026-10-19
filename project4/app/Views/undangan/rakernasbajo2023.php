<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kartu Rakernas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style type="text/css">
        @page {
            size: portrait;
            margin: 0mm;
            width: 103mm;
            height: 134mm;
        }

        .imgbg {
            position: absolute;
            left: 10mm;
            top: 10mm;
            width: 93mm;
            height: 124mm;
        }

        .logoippat {
            position: absolute;
            top: 10.2mm;
            left: 11mm;
            width: 15mm;
            height: 15mm;
        }

        .logorakernas {
            position: absolute;
            top: 12.2mm;
            left: 75mm;
            height: 15mm;
        }

        .qr {
            position: absolute;
            top: 100mm;
            left: 46mm;
            width: 20mm;
            height: 20mm;
        }

        .kata {
            position: absolute;
            top: 30mm;
            left: 10mm;
            width: 93mm;
            text-align: center;
            color: #009929;
            font-size: 12px;
            font-family: 'Times New Roman';
            font-weight: bold;
        }

        .kata1 {
            position: absolute;
            top: 44mm;
            left: 10mm;
            width: 93mm;
            text-align: center;
            font-size: 12px;
            font-family: 'Times New Roman';
            font-weight: bold;
        }

        .foto {
            position: absolute;
            top: 50mm;
            left: 45mm;
            width: 21mm;
            height: 28mm;
        }

        .nama {
            position: absolute;
            top: 79mm;
            left: 10mm;
            width: 93mm;
            text-align: center;
            color: red;
            font-size: 12px;
            font-family: 'Times New Roman';
            font-weight: bold;
        }

        .nomor {
            position: absolute;
            top: 130mm;
            width: 340mm;
            text-align: center;
            color: black;
            font-size: 28px;
            font-family: 'Times New Roman';
            font-weight: bold;
        }
    </style>

</head>

<body onload="window.print();">
    <img src="/img/BG_KartuRakernas2023.png" class="imgbg">
    <img src="/img/LogoIPPAT.png" class="logoippat">
    <img src="/img/LogoRakernasBajo2023.png" class="logorakernas">
    <span class="kata">
        RAKERNAS III (Pra Kongres) &<br>
        UP - GRADING IPPAT 2023
    </span>
    <span class="kata1">
        Labuan Bajo - NTT, 14-15 September 2023
    </span>
    <img src="/img/foto/<?= $detail['id_user']; ?>.jpg" class="foto">
    <span class="nama">
        <?= $detail['nama']; ?><br>
        <?= $detail['pengda']; ?><br>
        <? if ($detail['jenis'] == "alb") { ?>
            ALB. <?= date("Y.m.", strtotime($detail['created_at'])) . $detail['no_anggota']; ?>
        <? } else { ?>
            <?= $detail['id_pengwil'] . "." . $detail['id_pengda'] . "." . $detail['no_anggota']; ?>
        <? } ?>
    </span>
    <img src="/img/qr/<?= $qr; ?>" class="qr">
</body>

</html>