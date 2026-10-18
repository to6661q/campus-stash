<?php
include"koneksi.php";
$id=$_GET['id'];
$hapus="delete from register where id='$id'";
$hasil=mysqli_query($koneksi,$hapus);
if($hasil){
	$drop="ALTER TABLE register DROP id";
	$hasil1=mysqli_query($koneksi,$drop);
	if($hasil1){
		$add="ALTER TABLE register ADD id INT(100) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (id)";
		$hasil2=mysqli_query($koneksi,$add);
		if($hasil2){
			echo"<script>alert('data berhasil dihapus');window.location.href='index.php?module=lihat#pos';</script>";
		}
	}
	else{
		echo"<script>alert('data gagal dihapus');window.location.href='index.php?module=lihat#pos';</script>";
	}	
}
else{
	echo"<script>alert('data tidak dihapus');window.location.href='index.php?module=lihat#pos';</script>";
}
?>