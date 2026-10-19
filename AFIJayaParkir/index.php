<?php
session_start();
include 'koneksi.php';
include 'modul.php';
$proses = new Modul($host);

if (isset($_SESSION['username'])):
?>


<!DOCTYPE html>
<html>
<head> 
	<title>AFI Jaya Parkir</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="Templete">
		
		<div id="header">
			<img src="img/text(3).gif" style="width:1348px;height:129px;" >
		</div>

		<div class="navbar">
			<a href="">PT. AFI Jaya Parkir</a>	
			
			<div class="dropdown">
    			<button class="dropbtn">
    				Hi, <?php if($_SESSION['akses']==1) echo $_SESSION['nama']; else echo $_SESSION['username'] ?> 
    			</button>
   				
   				<div class="dropdown-content">
					<?php if ($_SESSION['akses']==1): ?>
					<a href="?page=admin_ubah">Ubah Akun</a>
					<?php endif; ?>
      				<a href="?page=proses&status=logout">Logout</a>
    			</div>
 			</div>
 		</div>	 

		<div id="artikel">
			<div class="sidebar">
				<?php if ($_SESSION['akses']==1): ?>
				<a href="?page=parkir_masuk">Parkir Masuk</a>
				<a href="?page=parkir_keluar">Parkir Keluar</a>
				<a href="?page=user">Kelola Akun User</a>
				<a href="?page=admin">Kelola Akun Admin</a>
				<a href="?page=gedung">Kelola Gedung</a>
				<a href="?page=tarif">Kelola Tarif</a>
				<a href="?page=laporan">Laporan</a>
				<a href="?page=grafik">Grafik</a>
				<?php else: ?>
				<a href="?page=cek_parkiran">Cek Parkir</a>
				<a href="?page=user_ubah">Ubah Akun</a>
				<?php endif; ?>
			</div>
			
			<div id="conten">
				<?php
				if(isset($_GET['page'])) {
					$page = $_GET['page'];
					include "konten/$page.php";
				} else {
					include 'konten/home.php';
				}
				?>
			</div>
		</div>

		<div id="clear"></div>
		
		<div id="footer">
			<p> &copy; PT. AFI Jaya Parkir</p>
		</div>	

	</div>

</body>
</html>

<?php 
else:
	header('location: auth.php');
endif;
?>