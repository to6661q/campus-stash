<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Tambahkan CSS kustom Anda di sini jika diperlukan -->
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Pendaftaran Anggota Luar Biasa</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        // Dapatkan informasi pembayaran dari sesi atau database
                        $virtualAccountNumber = "1234567890"; // Nomor Virtual Account
                        $amount = 500000; // Jumlah Pembayaran
                        $registrationDate = strtotime($detail['created_at']); // Waktu pendaftaran
                        $expirationDate = date("Y-m-d", strtotime("+2 days", $registrationDate)); // Batas Pembayaran

                        // Tampilkan informasi pembayaran
                        ?>
                        <p class="text-center">Silakan transfer ke Virtual Account berikut:</p>
                        <div class="text-center mb-4">
                            <img src="image/BNI_logo.png" alt="BNI Logo" style="max-width: 100px;">
                        </div>
                        <p class="text-center">Nomor Virtual Account: <?= $virtualAccountNumber ?></p>
                        <p class="text-center">Jumlah Pembayaran: Rp <?= number_format($amount, 0, ',', '.') ?></p>
                        <p class="text-center">Batas Pembayaran: <?= $expirationDate ?></p>
                        <p class="text-center">Silakan melakukan pembayaran sebelum batas waktu di atas.</p>

                        <!-- Tambahkan tombol atau tautan untuk melanjutkan ke portal pembayaran -->
                        <a href="/login/index" class="btn btn-primary btn-block">OK</a>
                    </div>
                    <div class="card-footer text-muted text-center">
                        &copy; 2024 <a href="#">PP-IPPAT</a>. All rights reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tambahkan script JavaScript Anda di sini jika diperlukan -->
</body>

</html>