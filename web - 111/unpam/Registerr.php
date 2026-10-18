<?php
include "koneksi.php";

$mysql = "INSERT INTO Registerr
(NamaDep, NamaBel, Username, Password, Usia, JK, TTL, Notel) VALUES
('$_POST[NamaDep], $_POST[NamaBel], $_POST[Username], $_POST[Password], $_POST[Usia], $_POST[JK], $_POST[TTL], $_POST[Notel]')";

if(!mysql_query($mysql))
	die (mysql_error());

echo"<script>alert('Selamat, Andah telah terdaftar');window.location.href='index.php';</script>";

mysql_close();
?>