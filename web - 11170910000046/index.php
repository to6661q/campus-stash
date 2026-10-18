<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>mywebsite</title>

	<link href="style/style.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<div id="container">
		<div id="header">
			<h1>PERTEMUAN I -- SISTEM PAKAR</h1>
		</div>
		
		<div id="sidebar">
			<h3>navigasi</h3>
			<ul id="navmenu">
				<li><a href="?p=insert">insert</a></li>
				<li><a href="?p=galeri">galeri</a></li>
				<li><a href="?p=jadwal">jadwal kuliah</a></li>
				<li><a href="?p=view">view</a></li>
			</ul>
		</div>
		
	<div id="page">
		<?php
			if(isset($_GET['p'])) {
				if(isset($_GET['id'])){
					include('konten/'.$_GET['p'].'.php');
					echo 'konten/'.$_GET['p'].'.php?id='.$_GET['id'];
				} else{
					include('konten/'.$_GET['p'].'.php');
				}
			} else {
				echo 'test';
			}
		?>
	</div>
</body>
</html>
		