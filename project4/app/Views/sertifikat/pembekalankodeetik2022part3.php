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

        .sertifikat {
            position: absolute;
            top: 35mm;
            width: 330mm;
            text-align: center;
            color: #009929;
            font-size: 70px;
            font-family: 'Times New Roman';
        }

        .kata {
            position: absolute;
            top: 65mm;
            width: 330mm;
            text-align: center;
            color: #000000;
            font-size: 25px;
            font-family: 'Segoe UI';
        }

        .kata1 {
            position: absolute;
            top: 90mm;
            width: 330mm;
            text-align: center;
            font-family: 'Calibri';
            font-size: 20px;
            color: gray;
        }

        .nama {
            position: absolute;
            top: 105mm;
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
            top: 45mm;
            left: 13mm;
            width: 60mm;
            height: 60mm;
            border-radius: 50%;
        }

        .qr {
            position: absolute;
            top: 20mm;
            left: 270mm;
            width: 30mm;
            height: 30mm;
        }

        .tanggal {
            position: absolute;
            top: 130mm;
            width: 330mm;
            height: 20mm;
            text-align: center;
            font-size: 20px;
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
            z-index: 1;
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
            z-index: 1;
        }

        .pm {
            position: absolute;
            top: 187mm;
            left: 270mm;
            text-align: center;
            font-size: 15px;
            font-family: 'Segoe UI';
            z-index: 1;
        }

        .ttdHH {
            position: absolute;
            top: 157mm;
            left: 30mm;
            width: 30mm;
            height: 30mm;
        }

        .ttdOH {
            position: absolute;
            top: 157mm;
            left: 120mm;
            width: 30mm;
            height: 30mm;
        }

        .ttdTF {
            position: absolute;
            top: 147mm;
            left: 200mm;
            width: 50mm;
            height: 50mm;
            z-index: 1;
        }

        .ttdFA {
            position: absolute;
            top: 147mm;
            left: 270mm;
            width: 50mm;
            height: 50mm;
        }

        .stpIPPAT {
            position: absolute;
            top: 157mm;
            left: 70mm;
            width: 30mm;
            height: 30mm;
        }

        .stpPanitia {
            position: absolute;
            top: 147mm;
            left: 230mm;
            width: 45mm;
            height: 45mm;
            z-index: 0;
        }
    </style>

</head>

<body onload="window.print();">
    <img src="/img/KodeEtik2022.jpg" class="imgbg">
    <span class="sertifikat">
        SERTIFIKAT
    </span>
    <span class="kata">
        Telah Mengikuti Pembekalan Kode Etik<br>
        Gelombang 3 Tanggal 8 Oktober 2022
    </span>
    <span class="kata1">
        diberikan kepada
    </span>
    <span class="nama">
        <?= $detail['nama']; ?>
    </span>
    <span class="nomor">
        No. ALB <?= date("Y.m.", strtotime($detail['created_at'])) . $detail['no_anggota']; ?>
    </span>
    <img src="/img/foto/<?= $detail['id_user']; ?>.jpg" class="foto">
    <img src="/img/qr/<?= $qr; ?>" width="120" class="qr">
    <span class="tanggal">
        <?= 'Jakarta, ' . $tanggal; ?>
    </span>
    <span class="pusat">
        Pengurus Pusat <br>
        Ikatan Pejabat Pembuat Akta Tanah <br>
        (PP-IPPAT)
    </span>
    <span class="panitia">
        Panitia Pendidikan dan Pelatihan Dasar I, II dan<br>
        Pembekalan Kode Etik IPPAT Gel 3 2022<br>
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
        Dr. Taufan Fajar Riyanto. S.H., M.Kn. <br>
        Ketua
    </span>
    <span class="pm">
        Widatul Millah, S.H. <br>
        Sekretaris
    </span>
    <img src="/img/ttdHH.png" class="ttdHH">
    <img src="/img/ttdOH.png" class="ttdOH">
    <img src="/img/ttdTF.png" class="ttdTF">
    <img src="/img/ttdWM.png" class="ttdFA">
    <img src="/img/stampelIPPAT.png" class="stpIPPAT">
    <img src="/img/StempelDiklasar3.png" class="stpPanitia">
</body>

</html>