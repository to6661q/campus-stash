<?php
	include"koneksi/koneksi.php";
	if(isset($_POST['id'])){
		$edit="update user set name='$_POST[name]',
		email='$_POST[email]', notel='$_POST[notel]', username='$_POST[username]',
		password='$_POST[password]' where id='$_POST[id]'";
		$hasil=mysql_query($edit);
		if($hasil){
			echo"<script>alert('data berhasil diedit');window.location.href='halmin.php?module=view#pos';</script>";
		}
	}
?>