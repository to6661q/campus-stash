<!DOCTYPE html>
<html xmlns="www.w3.com/1999/xhtml">
<head>
	<link href="images/telkomsel.png" rel="shortcut icon" />
	<title>Pertemuan 10</title>
	<link href="style/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>PERTEMUAN I -- SISTEM PAKAR</h1>
		</div>
		<div id="sidebar">
			<h3>Navigasi</h3>
			<ul id="navmenu">
				<li><a href="?module=insert#pos">INSERT</a></li>
				<li><a href="index.php" class="selected">VIEW</a></li>
				<li><a href="?module=search#pos">SEARCH</a></li><br><br>
				<form action="?module=loginproc#pos" method="post">
					<li style="padding-left: 5px;">
						Username
						<input type="text" name="username">
					</li>
					<li style="padding-left: 5px;">
						Password
						<input type="password" name="password">
						<input type="submit" value="Login">
					</li>
				</form>
			</ul>
		</div>
		<div id="page">
			<?php if(isset($_GET['module'])) 
				include "konten/$_GET[module].php";
			else
				include "konten/view.php" ;?>
		</div>
		<div id="clear"></div>
		<div id="footer">
			<p>&copy; 2019</p>
		</div>
	</div>
</body>
</html>