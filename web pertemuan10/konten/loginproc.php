<?php
session_start();
include "koneksi/koneksi.php";

$login = mysqli_query($conn, "SELECT * FROM register WHERE username='$_POST[username]' AND password = '$_POST[password]'");
$rowcount = mysqli_num_rows($login);
if($rowcount==1){
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
	echo "<script>alert('Anda berhasil masuk'); window.location.href='?module=indexuser#pos';</script>";
} else {
	echo "<script>alert('Anda gagal masuk'); window.location.href='index.php';</script>";
}
?>