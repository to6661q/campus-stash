<?php
include "koneksi/koneksi.php";
$data = mysqli_fetch_assoc($conn, $login);

$mysql = "INSERT INTO user
(id, name, email, notel, level, username, password) VALUES
('$_POST[id]', '$_POST[name]', '$_POST[email]', '$_POST[notel]', '$_POST[level]', '$_POST[username]','$_POST[password]')";

if(!mysqli_query($conn, $mysql))
die (mysql_error());

echo"<script>alert('Selamat, pengguna berhasil didaftarkan');window.location.href='halmin.php?module=view#pos';</script>";

mysql_close();
			 
?>
