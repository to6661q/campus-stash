
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>My Website</title>
	<link href="style/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="container">
		<div id="header"></div>
		<?php 
		session_start();
		
		// cek apakah yang mengakses halaman ini sudah login
		if($_SESSION['level']==""){
			header("location:index.php?pesan=gagal");
		}
	 
		?>
	 
		<div id="sidebar">
			<ul id="navmenu">
				<li><a href="?module=home_admin#pos">Home </a></li>
				<li><a href="?module=view#pos">Daftar Akun</a></li>
				<li><a href="?module=insert2#pos">Tambah Akun</a></li>
				<li><a href="?module=question#pos">Tambah Kuisioner</a></li>
				<li><a href="?module=hasil#pos">Hasil Kuisioner</a></li>
			</ul>
			<h4><a href="konten/logout.php">Keluar</a></h4>
		</div>
		<div id="page">
			<?php if(isset($_GET['module']))
				include "konten/$_GET[module].php";
			else
				include "konten/home_admin.php";
			?>
		</div>
		<a href="?module=home_admin#pos"></a>
		<div id="clear"></div>
		
		<div id="footer">
			<p>&copy; 2019</p>			
		</div>
	</div>
</body>
</html>