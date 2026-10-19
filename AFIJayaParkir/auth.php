<?php  
session_start();
include 'koneksi.php';
include 'modul.php';
$proses = new Modul($host);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style_login.css">
	<title>AFI Jaya Parkir | Login</title>
</head>
<body>
	<div class="konten">
		<div class="kepala">	
			<h2 class="judul">Login</h2>
		</div>

		<div class="artikel">
			<?php
			if(isset($_GET['page'])) {
				$page = $_GET['page'];
				include "konten/$page.php";
			} else {
				include 'konten/login.php';
			}
			?>	
		</div>		
	</div>
	
</body>
</html>