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
            top: 100mm;
            width: 330mm;
            text-align: center;
            color: #000000;
            font-size: 20px;
            font-family: 'Segoe UI';
        }

        .kata1 {
            position: absolute;
            top: 110mm;
            width: 330mm;
            text-align: center;
            color: #000000;
            font-size: 20px;
            font-family: 'Segoe UI';
        }

        .kata2 {
            position: absolute;
            top: 115mm;
            width: 330mm;
            text-align: center;
            font-family: 'Times New Roman';
            font-weight: bold;
            font-size: 60px;
        }

        .kata3 {
            position: absolute;
            top: 140mm;
            width: 330mm;
            text-align: center;
            color: #000000;
            font-size: 20px;
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
            top: 165mm;
            width: 330mm;
            text-align: center;
            color: #000000;
            font-size: 20px;
            font-family: 'Segoe UI';
        }

        .nama {
            position: absolute;
            top: 80mm;
            width: 330mm;
            text-align: center;
            color: black;
            font-size: 30px;
            font-family: 'Times New Roman';
            font-weight: bold;
        }

        .nomor {
            position: absolute;
            top: 90mm;
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
    <img src="/img/KodeEtik.jpg" class="imgbg">
    <span class="sertifikat">
        Terima Kasih calon ALB
    </span>
    <span class="nama">
        <?= $detail['nama']; ?>
    </span>
    <span class="nomor">
        No ALB : <?= $nomor ?>
    </span>
    <span class="kata">
        Telah terdaftar sementara sebagai Anggota Luar Biasa IPPAT (ALB-IPPAT) tahun 2023
    </span>
    <span class="kata1">
        Silahkan membayar uang pangkal sebesar
    </span>
    <span class="kata2">
        Rp. <?= $bill ?>,-
    </span>
    <span class="kata3">
        ke Rekening Bank BCA KCP Gatot Subroto Nomor 1451376654 atas nama IPPAT paling lambat tanggal <?= $tglakhir ?> </br>
        setelah data anda di verifikasi oleh admi, anda dapat mendownload Surat Keterangan Terdaftar sebagai ALB dengan cara login di akun masing-masing.
    </span>
    <span class="kata4">

    </span>
    <!--span class="kata5">
        * pembayaran harus sesuai nominal tersebut di atas paling lambat tanggal <?= $tglakhir ?> </br>
        * Surat Keterangan Terdaftar ALB dapat di download pada akun calon ALB setelah pembayaran uang pangkal di verifikasi oleh admin.
    </span !-->
    <span class="kata5">
        Jadwal Diklasar I, Diklasar II dan Pembekalan Kode Etik akan dilaksanakan secara online tanggal 21-22 Juli 2023, </br>
        link zoom kegiatan akan diberikan H-1 sebelum acara dengan cara menscan QR code yang ada di </br>
        Surat Keterangan Terdaftar Anggota Luar Biasa.
    </span>
</body>

</html>