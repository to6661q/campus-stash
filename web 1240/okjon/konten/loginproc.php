<?php
session_start();
include "koneksi/koneksi.php";

$login = mysql_query("select * from user where (username='".$_POST['username']."') and (password='".$_POST['password']."')");

$cek=mysql_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$username=$_POST['username'];
	$password=$_POST['password'];
	$data = mysql_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = "rusdi";
		$_SESSION['password'] = "admin";
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		echo"<script>alert('Anda berhasil masuk sebagai admin');window.location.href='halmin.php';</script>";
 
	// cek jika user login sebagai dosen
	}else if($data['level']=="dosen"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['level'] = "dosen";
		// alihkan ke halaman dashboard dosen
		echo"<script>alert('Anda berhasil masuk sebagai dosen');window.location.href='haldos.php';</script>";
 
	// cek jika user login sebagai mahasiswa
	}else if($data['level']=="mahasiswa"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['level'] = "mahasiswa";
		// alihkan ke halaman dashboard mahasiswa
		echo"<script>alert('Anda berhasil masuk sebagai mahasiswa');window.location.href='halmhs.php';</script>";
 
	}else{
 
		// alihkan ke halaman login kembali
		echo"<script>alert('username atau password salah');window.location.href='index.php';</script>";
	}	
}else{
	echo"<script>alert('username atau password salah');window.location.href='index.php';</script>";
}
?>