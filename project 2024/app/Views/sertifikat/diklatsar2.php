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

        .logo {
            position: absolute;
            top: 3mm;
            left: 10mm;
            width: 180mm;
            height: 30mm;
        }

        .sertifikat {
            position: absolute;
            top: 45mm;
            width: 330mm;
            text-align: center;
            color: #009929;
            font-size: 100px;
            font-family: 'Times New Roman';
        }

        .kata {
            position: absolute;
            top: 80mm;
            width: 330mm;
            text-align: center;
            color: #000000;
            font-size: 20px;
            font-family: 'Segoe UI';
        }

        .kata1 {
            position: absolute;
            top: 100mm;
            width: 330mm;
            text-align: center;
            font-family: 'Calibri';
            font-size: 20px;
            color: gray;
        }

        .nama {
            position: absolute;
            top: 110mm;
            width: 330mm;
            text-align: center;
            color: black;
            font-size: 30px;
            font-family: 'Times New Roman';
            font-weight: bold;
        }

        .nomor {
            position: absolute;
            top: 120mm;
            width: 330mm;
            text-align: center;
            color: black;
            font-size: 28px;
            font-family: 'Times New Roman';
            font-weight: bold;
        }

        .foto {
            position: absolute;
            top: 110mm;
            left: 25mm;
            width: 60mm;
            height: 80mm;
        }

        .qr {
            position: absolute;
            top: 160mm;
            left: 242mm;
            width: 30mm;
            height: 30mm;
        }

        .pengurus {
            position: absolute;
            top: 130mm;
            left: 182mm;
            width: 150mm;
            height: 20mm;
            text-align: center;
            font-size: 18px;
        }

        .pimpinan {
            position: absolute;
            top: 190mm;
            left: 180mm;
            width: 150mm;
            height: 20mm;
            text-align: center;
        }
    </style>

</head>

<body onload="window.print();">
    <img src="/img/LatihanDasar2.jpg" class="imgbg">
    <img src="/img/LogoIPPATText.png" class="logo">
    <span class="sertifikat">
        Sertifikat
    </span>
    <span class="kata">
        Telah Mengikuti Pendidikan dan Pelatihan Dasar Ke PPAT an II<br>
        Tanggal 6 Nopember 2021
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
    <span class="pengurus">
        <?= 'Jakarta, ' . date("d M Y"); ?><br>
        Pengurus Pusat<br>
        Ikatan Pejabat Pembuat Akta Tanah<br>
        (PP-IPPAT)
    </span>
    <div class="pimpinan">
        <table width="100%">
            <tr>
                <td width="50%">
                    <font style="font-size: 14px; font-weight: bold;">Dr. HAPENDI HARAHAP, S.H., Sp.N., M.H</font>
                </td>
                <td width="50%">
                    <font style="font-size: 14px; font-weight: bold;">OTTY HC UBAYANI, S.H., Sp.N., M.H</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font style="font-size: 14px;">Ketua Umum</font>
                </td>
                <td>
                    <font style="font-size: 14px;">Sekretaris Umum</font>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>