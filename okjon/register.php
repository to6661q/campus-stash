<?php
include "koneksi/koneksi.php";
$data = mysql_fetch_assoc($login);

$mysql = "INSERT INTO user
(id, name, email, notel, level, username, password) VALUES
('$_POST[id]', '$_POST[name]', '$_POST[email]', '$_POST[notel]', '$_POST[level]', '$_POST[username]','$_POST[password]')";

if(!mysql_query($mysql))
die (mysql_error());

echo"<script>alert('Selamat, anda telah terdaftar');window.location.href='index.php';</script>";

mysql_close();
			 
?>
