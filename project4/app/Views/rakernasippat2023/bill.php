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

            width: 330mm;

            height: 210mm;

        }



        .sertifikat {

            position: absolute;

            top: 60mm;

            width: 330mm;

            text-align: center;

            color: #009929;

            font-size: 50px;

            font-family: 'Times New Roman';

        }



        .kata {

            position: absolute;

            top: 115mm;

            width: 330mm;

            text-align: center;

            color: #000000;

            font-size: 20px;

            font-family: 'Segoe UI';

        }



        .kata1 {

            position: absolute;

            top: 123mm;

            width: 330mm;

            text-align: center;

            color: #000000;

            font-size: 20px;

            font-family: 'Segoe UI';

        }



        .kata2 {

            position: absolute;

            top: 130mm;

            width: 330mm;

            text-align: center;

            font-family: 'Times New Roman';

            font-weight: bold;

            font-size: 60px;

        }



        .kata3 {

            position: absolute;

            top: 153mm;

            width: 330mm;

            text-align: center;

            color: #000000;

            font-size: 30px;

            font-family: 'Segoe UI';

        }



        .kata4 {

            position: absolute;

            top: 163mm;

            width: 330mm;

            text-align: center;

            color: #000000;

            font-size: 30px;

            font-family: 'Segoe UI';

        }



        .kata5 {

            position: absolute;

            top: 175mm;

            width: 330mm;

            text-align: center;

            color: #000000;

            font-size: 20px;

            font-family: 'Segoe UI';

        }



        .nama {

            position: absolute;

            top: 90mm;

            width: 330mm;

            text-align: center;

            color: black;

            font-size: 30px;

            font-family: 'Times New Roman';

            font-weight: bold;

        }



        .nomor {

            position: absolute;

            top: 100mm;

            width: 330mm;

            text-align: center;

            color: black;

            font-size: 28px;

            font-family: 'Times New Roman';

            font-weight: bold;

        }
    </style>



</head>



<body>

    <img src="/img/BGRakernas2023.jpg" class="imgbg">

    <span class="sertifikat">

        Terima Kasih kepada

    </span>

    <span class="nama">

        <?= $detail['nama']; ?>

    </span>

    <span class="nomor">

        <?= $nomor ?>

    </span>

    <span class="kata">

        Telah mendaftar sebagai peserta <?= $kegiatan ?> di RAKERNAS IPPAT 2023

    </span>

    <span class="kata1">

        Segera lakukan pembayaran sebesar

    </span>

    <span class="kata2">

        Rp. <?= $bill ?>,-

    </span>

    <span class="kata3">

        ke Rekening Bank BCA Nomor 1451380911

    </span>

    <span class="kata4">

        atas nama IPPAT

    </span>

    <span class="kata5">

        * pembayaran harus sesuai nominal tersebut di atas paling lambat tanggal <?= $tglakhir ?> </br>

        * anda dapat mendownload kartu peserta dengan menscan QR code yang ada di Surat Keterangan ALB </br>
        setelah pembayaran di verifikasi oleh admin.

    </span>



</body>



</html>