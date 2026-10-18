<?php
session_start();
include "../koneksi/koneksi.php";
$login = mysqli_query($conn, "SELECT * FROM akun WHERE id ='$_POST[id]' AND password = '$_POST[password]'");
$rowcount = mysqli_num_rows($login);
if ($rowcount > 0) {
	$buff = mysqli_fetch_array($login);
	if ($buff['level'] == 'admin') {
		$_SESSION['id'] = $buff['id'];
		$_SESSION['namadep'] = $buff['namadep'];
		$_SESSION['namabel'] = $buff['namabel'];
		$_SESSION['mk'] = $buff['mk'];
				$_SESSION['semester'] = $buff['semester'];
		$_SESSION['username'] = $buff['username'];
		$_SESSION['password'] = $buff['password'];
		$_SESSION['level'] = $buff['level'];
		echo "<script>alert('Anda berhasil masuk'); window.location.href='main.php';</script>";
	} else if ($buff['level'] == 'dosen') {
		$_SESSION['id'] = $buff['id'];
		$_SESSION['namadep'] = $buff['namadep'];
		$_SESSION['namabel'] = $buff['namabel'];
		$_SESSION['mk'] = $buff['mk'];
						$_SESSION['semester'] = $buff['semester'];
		$_SESSION['username'] = $buff['username'];
		$_SESSION['password'] = $buff['password'];
		$_SESSION['level'] = $buff['level'];
		echo "<script>alert('Anda berhasil masuk'); window.location.href='main.php';</script>";
	} else {
		$_SESSION['id'] = $buff['id'];
		$_SESSION['namadep'] = $buff['namadep'];
		$_SESSION['namabel'] = $buff['namabel'];
		$_SESSION['mk'] = $buff['mk'];
						$_SESSION['semester'] = $buff['semester'];
		$_SESSION['username'] = $buff['username'];
		$_SESSION['password'] = $buff['password'];
		$_SESSION['level'] = $buff['level'];
		echo "<script>alert('Anda berhasil masuk'); window.location.href='main.php';</script>";
	}
} else {
	echo "<script>alert('Anda gagal masuk'); window.location.href='../index.php';</script>";
}
mysqli_close($conn);
