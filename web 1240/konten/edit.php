<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>My Website</title>
</head>
<body>
	<?php
		$id=$_GET['id'];
		include"koneksi/koneksi.php";
		$select="Select * from user where id='$id'";
		$hasil=mysql_query($select);
		while($buff=mysql_fetch_array($hasil)){
	?>
	<h2>Edit Data</h2><br />
	<form action="halmin.php?module=edit2" method="post">
	<table width="487" border="0">
		<input type="hidden" name="id" value="<?php echo $buff['id'];?>" />
		<tr>
			<td width="150">nama</td>
			<td width="327"><input type="text" name="name" value="<?php echo $buff['name'];?>" /></td>
		</tr>
		<tr>
			<td>email</td>
			<td><input type="text" name="email" value="<?php echo $buff['email'];?>" /></td>
		</tr>
		<tr>
			<td>no tlp</td>
			<td><input type="text" name="notel" value="<?php echo $buff['notel'];?>" /></td>
		</tr>
		<tr>
			<td>username</td>
			<td><input type="text" name="username" value="<?php echo $buff['username'];?>" /></td>
		</tr>
		<tr>
			<td>password</td>
			<td><input type="text" name="password" value="<?php echo $buff['password'];?>" /></td>
		</tr>
		<tr>
			<td height="68" align="right"><input type="reset" value="reset" /></td>
			<td><input type="submit" value="submit" /></td>
		</tr>
	</table>
	<a href="?module=view#pos">kembali</a>
	</form>
	<?php
	};
	mysql_close();
	?>
</body>
</html>