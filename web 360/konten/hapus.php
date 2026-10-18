<?php
	include"koneksi/koneksi.php";
	$id=$_GET['id'];
	$hapus="delete from user where id='$id'";
	$hasil=mysqli_query($conn, $hapus);
	if($hapus){
			echo"<script>alert('data berhasil dihapus');window.location.href='halmin.php?module=view#pos';</script>";
		}
?>