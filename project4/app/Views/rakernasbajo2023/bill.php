<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bill</title>
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
            width: 350mm;
            height: 210mm;
        }

        .logorakernas {
            position: absolute;
            top: 5mm;
            left: 5mm;
            width: 80mm;
        }

        .logoippat {
            position: absolute;
            top: 5mm;
            left: 140mm;
            width: 40mm;
        }

        .sertifikat {
            position: absolute;
            top: 40mm;
            width: 330mm;
            text-align: center;
            color: #000000;
            font-size: 50px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }

        .nama {
            position: absolute;
            top: 55mm;
            width: 330mm;
            text-align: center;
            color: black;
            font-size: 60px;
            font-family: 'Times New Roman';
        }

        .nomor {
            position: absolute;
            top: 75mm;
            width: 330mm;
            text-align: center;
            color: black;
            font-size: 40px;
            font-family: 'Times New Roman';
        }

        .kata {
            position: absolute;
            top: 90mm;
            width: 330mm;
            text-align: center;
            color: #000000;
            font-size: 17px;
            font-family: 'Segoe UI';
        }

        .kata2 {
            position: absolute;
            top: 105mm;
            left: 105mm;
            border-radius: 25px;
            width: 120mm;
            text-align: center;
            font-family: 'Times New Roman';
            font-weight: bold;
            font-size: 40px;
            background-color: white;
        }

        .kata3 {
            position: absolute;
            top: 122mm;
            width: 330mm;
            text-align: center;
            color: #000000;
            font-size: 17px;
            font-family: 'Segoe UI';
        }

        .kata5 {
            position: absolute;
            top: 135mm;
            left: 10mm;
            width: 330mm;
            text-align: left;
            color: #000000;
            font-size: 17px;
            font-family: 'Segoe UI';
        }
    </style>
</head>

<body>
    <img src="/img/BGRakernasBajo2023.png" class="imgbg">
    <img src="/img/LogoRakernasBajo2023.png" class="logorakernas">
    <img src="/img/LogoIPPAT.png" class="logoippat">
    <span class="sertifikat">
        Terima Kasih Kepada
    </span>
    <span class="nama">
        <?= $detail['nama']; ?>
    </span>
    <span class="nomor">
        <?= $nomor ?>
    </span>
    <span class="kata">
        Telah Mendaftar Sebagai PESERTA <?= $kegiatan ?> Pada Rakernas III <br>
        (Pra Kongres) dan Upgrading IPPAT Tahun 2023. Segera lakukan pembayaran sebesar.
    </span>
    <span class="kata2">
        Rp. <?= $bill ?>,-
    </span>
    <span class="kata3">
        Ke Rekening Bank PANIN Nomor 8152080777 atas nama PANITIA RAKERNAS III DAN UP GRADING IPPAT
    </span>
    <span class="kata5">
        * Pembayaran harus sesuai nominal tersebut di atas paling lambat tanggal <?= $tglakhir ?> </br>
        * Setelah melakukan pembayaran anda dapat mendownload KARTU PESERTA dengan cara </br>
        menscan QR code yang ada di Surat Keterangan ALB IPPAT Anda setelah </br>
        pembayaran di verifikasi oleh admin.
    </span>
</body>

</html>