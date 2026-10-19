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

        .qr {
            position: absolute;
            top: 8mm;
            left: 182mm;
            width: 30mm;
            height: 30mm;
        }

        .sertifikat {
            position: absolute;
            top: 50mm;
            width: 330mm;
            text-align: center;
            color: #009620;
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
            color: gray;
        }

        .kata2 {
            position: absolute;
            top: 105mm;
            width: 330mm;
            text-align: center;
            font-size: 24px;
            font-family: 'Times New Roman';
        }

        .kata3 {
            position: absolute;
            top: 115mm;
            width: 330mm;
            text-align: center;
            color: red;
            font-size: 25px;
            font-family: 'Times New Roman';
        }

        .kata4 {
            position: absolute;
            top: 125mm;
            width: 330mm;
            text-align: center;
            color: green;
            font-size: 20px;
            font-family: 'Times New Roman';
        }

        .kata5 {
            position: absolute;
            top: 132mm;
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
            top: 187mm;
            left: 10mm;
            text-align: center;
            font-size: 15px;
            font-family: 'Segoe UI';
        }

        .oh {
            position: absolute;
            top: 187mm;
            left: 100mm;
            text-align: center;
            font-size: 15px;
            font-family: 'Segoe UI';
        }

        .if {
            position: absolute;
            top: 187mm;
            left: 200mm;
            text-align: center;
            font-size: 15px;
            font-family: 'Segoe UI';
        }

        .pm {
            position: absolute;
            top: 187mm;
            left: 270mm;
            text-align: center;
            font-size: 15px;
            font-family: 'Segoe UI';
        }

        .ttdHH {
            position: absolute;
            top: 157mm;
            left: 30mm;
            width: 40mm;
            height: 40mm;
        }

        .ttdOH {
            position: absolute;
            top: 157mm;
            left: 120mm;
            width: 40mm;
            height: 40mm;
        }

        .ttdIF {
            position: absolute;
            top: 157mm;
            left: 200mm;
            width: 40mm;
            height: 40mm;
        }

        .ttdPM {
            position: absolute;
            top: 157mm;
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
    <img src="/img/BGRakernas.png" class="imgbg">
    <img src="/img/qr/<?= $qr; ?>" width="120" class="qr">
    <span class="sertifikat">
        SERTIFIKAT
    </span>
    <span class="kata">
        Diberikan kepada :
    </span>
    <span class="kata1">
        <?= $detail['nama']; ?>
    </span>
    <span class="kata2">
        Sebagai PESERTA pada pelaksanaan
    </span>
    <span class="kata3">
        RAPAT KERJA NASIONAL
    </span>
    <span class="kata4">
        IKATAN PEJABAT PEMBUAT AKTA TANAH (IPPAT)
    </span>
    <span class="kata5">
        Pekanbaru, 23-24 Maret 2022
    </span>
    <span class="pusat">
        Pengurus Pusat <br>
        Ikatan Pejabat Pembuat Akta Tanah <br>
        (PP-IPPAT)
    </span>
    <span class="panitia">
        Panitia Pelaksana <br>
        Rakernas & Up-grading IPPAT 2022 <br>
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
        Ivo Fidriyani, S.H.. <br>
        Ketua
    </span>
    <span class="pm">
        Pupung Mulyantini, S.H., M.H. <br>
        Sekretaris
    </span>
    <img src="/img/ttdHH.png" class="ttdHH">
    <img src="/img/ttdOH.png" class="ttdOH">
    <img src="/img/ttdIF.png" class="ttdIF">
    <img src="/img/ttdPM.png" class="ttdPM">
    <img src="/img/stampelIPPAT.png" class="stpIPPAT">
    <img src="/img/stampelRakernas.png" class="stpRakernas">
</body>

</html>