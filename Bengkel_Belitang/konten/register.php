<?php
    include "../koneksi/koneksi.php";

    $mysql = "INSERT INTO register
    (onderdil, nama, fungsi, harga, stok, tanggal, keterangan) VALUES
    ('$_POST[onderdil]','$_POST[nama]','$_POST[fungsi]','$_POST[harga]','$_POST[stok]','$_POST[tanggal]','$_POST[keterangan]')";

    if(!mysqli_query($conn, $mysql)){
		die(mysqli_error());
	}

	echo"<script>alert('Selamat, data onderdil sudah terdaftar');window.location.href='../index.php';</script>";

	mysqli_close($conn);
?>