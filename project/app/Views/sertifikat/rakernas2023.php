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

        .logoRekernas {
            position: absolute;
            top: 5mm;
            left: 265mm;
            width: 60mm;
            height: 60mm;
        }

        .logoippatPP {
            position: absolute;
            top: 5mm;
            left: 10mm;
            width: 160mm;
            height: 30mm;
        }

        .qr {
            position: absolute;
            top: 75mm;
            left: 275mm;
            width: 40mm;
            height: 40mm;
        }

        .foto {
            position: absolute;
            top: 250px;
            left: 70px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }

        .gcyrcle {
            position: absolute;
            top: 225px;
            left: 45px;
            width: 250px;
            height: 250px;
        }

        .sertifikat {
            position: absolute;
            top: 50mm;
            width: 330mm;
            text-align: center;
            color: #000000;
            font-size: 70px;
            font-family: 'Times New Roman';
        }

        .kata {
            position: absolute;
            top: 75mm;
            width: 330mm;
            text-align: center;
            color: #000000;
            font-size: 30px;
            font-family: 'Segoe UI';
        }

        .kata1 {
            position: absolute;
            top: 85mm;
            width: 330mm;
            text-align: center;
            font-family: 'Times New Roman';
            font-size: 40px;
            color: #000000;
        }

        .kata6 {
            position: absolute;
            top: 98mm;
            width: 330mm;
            text-align: center;
            font-size: 20px;
            font-family: 'Times New Roman';
            color: #000000;
        }

        .kata2 {
            position: absolute;
            top: 105mm;
            width: 330mm;
            text-align: center;
            font-size: 24px;
            font-family: 'Times New Roman';
            color: #000000;
        }

        .kata3 {
            position: absolute;
            top: 115mm;
            width: 330mm;
            text-align: center;
            color: #000000;
            font-size: 25px;
            font-family: 'Times New Roman';
        }

        .kata4 {
            position: absolute;
            top: 125mm;
            width: 330mm;
            text-align: center;
            color: #000000;
            font-size: 25px;
            font-family: 'Times New Roman';
        }

        .kata5 {
            position: absolute;
            top: 136mm;
            width: 330mm;
            text-align: center;
            font-size: 20px;
            font-family: 'Times New Roman';
        }

        .pusat {
            position: absolute;
            top: 142mm;
            left: 50mm;
            text-align: center;
            font-size: 15px;
            font-family: 'Segoe UI';
        }

        .panitia {
            position: absolute;
            top: 142mm;
            left: 230mm;
            text-align: center;
            font-size: 15px;
            font-family: 'Segoe UI';
        }

        .hh {
            position: absolute;
            top: 182mm;
            left: 10mm;
            text-align: center;
            font-size: 15px;
            font-family: 'Segoe UI';
            color: #000000;
            font-weight: bold;
        }

        .oh {
            position: absolute;
            top: 182mm;
            left: 100mm;
            text-align: center;
            font-size: 15px;
            font-family: 'Segoe UI';
            color: #000000;
            font-weight: bold;
        }

        .if {
            position: absolute;
            top: 182mm;
            left: 180mm;
            text-align: center;
            font-size: 15px;
            font-family: 'Segoe UI';
            color: #000000;
            font-weight: bold;
        }

        .pm {
            position: absolute;
            top: 182mm;
            left: 260mm;
            text-align: center;
            font-size: 15px;
            font-family: 'Segoe UI';
            color: #000000;
            font-weight: bold;
        }

        .ttdHH {
            position: absolute;
            top: 152mm;
            left: 30mm;
            width: 40mm;
            height: 40mm;
        }

        .ttdOH {
            position: absolute;
            top: 152mm;
            left: 120mm;
            width: 40mm;
            height: 40mm;
        }

        .ttdIF {
            position: absolute;
            top: 152mm;
            left: 180mm;
            width: 70mm;
            height: 40mm;
        }

        .ttdPM {
            position: absolute;
            top: 152mm;
            left: 280mm;
            width: 40mm;
            height: 40mm;
        }

        .stpIPPAT {
            position: absolute;
            top: 157mm;
            left: 70mm;
            width: 40mm;
            height: 40mm;
        }

        .stpRakernas {
            position: absolute;
            top: 147mm;
            left: 230mm;
            width: 55mm;
            height: 55mm;
        }
    </style>

</head>

<body onload="window.print();">
    <img src="/img/BGSertifikatRakernas2023.png" class="imgbg">
    <img src="/img/qr/<?= $qr; ?>" width="120" class="qr">
    <img src="/img/LogoRakernas2023.png" class="logoRekernas">
    <img src="/img/logoIppatPP.png" class="logoippatPP">
    <img src="/img/GreenCyrcle.png" class="gcyrcle">
    <img src="/img/foto/<?= $detail['id_user'] ?>.jpg" class="foto">
    <span class="sertifikat">
        SERTIFIKAT
    </span>
    <span class="kata">
        Diberikan kepada :
    </span>
    <span class="kata1">
        <?= $detail['nama']; ?>
    </span>
    <span class="kata6">
        KTA No. <?= implode(' ', str_split($detail['id_pengwil'] . "." . $detail['id_pengda'] . "." . $detail['no_anggota'])); ?>
    </span>
    <span class="kata2">
        Sebagai PESERTA pada pelaksanaan
    </span>
    <span class="kata3">
        KONGRES LUAR BIASA, RAPAT KERJA NASIONAL &
    </span>
    <span class="kata4">
        UP-GRADING IPPAT 2023
    </span>
    <span class="kata5">
        Depok - Jawa Barat, 23-24 Pebruari 2023
    </span>
    <span class="pusat">
        Pengurus Pusat <br>
        Ikatan Pejabat Pembuat Akta Tanah <br>
        (PP-IPPAT)
    </span>
    <span class="panitia">
        Panitia Pelaksana <br>
        KLB, Rakernas & Up-grading IPPAT 2023 <br>
    </span>
    <span class="hh">
        Dr. Hapendi Harahap, S.H., Sp.N., M.H. <br>
        Ketua Umum
    </span>
    <span class="oh">
        Otty HC Ubayani, S.H., Sp.N., M.H. <br>
        Sekretaris Umum
    </span>
    <span class="if">
        Oscar Fedyan Idbal Utama, S.H., M.Kn. <br>
        Ketua
    </span>
    <span class="pm">
        Zulfahmi Yanuar Adam, S.H., M.Kn. <br>
        Sekretaris
    </span>
    <img src="/img/ttdHH.png" class="ttdHH">
    <img src="/img/ttdOH.png" class="ttdOH">
    <img src="/img/ttdOscar.png" class="ttdIF">
    <img src="/img/ttdZulfahmi.png" class="ttdPM">
    <img src="/img/stampelIPPAT.png" class="stpIPPAT">
    <img src="/img/stempelKLB.png" class="stpRakernas">
</body>

</html>