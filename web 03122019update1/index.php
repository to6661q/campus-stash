<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>My Website</title>
	<link href="style/style.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<div id="container">
		<div id="header">
		</div>
		<div id="sidebar">
			<p class="tulisan_login">MASUKAN USERNAME PENGGUNA</p>
	 
			<form action="?module=loginproc#pos" method="post">
				<label>USERNAME</label>
				<input type="text" name="username" class="form_login" placeholder="username" required="required">
	 
				<label>PASSWORD</label>
				<input type="password" name="password" class="form_login" placeholder="password" required="required">
	 
				<input type="submit" class="tombol_login" value="LOGIN">
	 
				<br/>
				<br/>
				<p>belum punya akun?</p>
				<a href="?module=insert#pos" class="tombol_register">register</a>
			</form>
		</div>
		<div id="page">
					<?php if(isset($_GET['module']))
				include "konten/$_GET[module].php";
			else
				include "konten/home.php";?>
		</div>
		
		<div id="clear"></div>
		
		<div id="footer">
			<p>&copy; 2019</p>
		</div>
		
	</div>
</body>
</html>
