<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Untitled Document</title>
</head>

<body>
	<?php
	$id=$_GET['id'];
	include"koneksi.php";
	$select="select*from register where id='$id'";
	$hasil=mysqli_query($koneksi,$select);
	while($buff=mysqli_fetch_array($hasil)){
	?>
	<h2>Edit data</h2><br/>
	<form action="edit2.php" method="post">
	<form width="487" border="0">
	<input type="hidden" name="id" value="<?php echo $buff['id'];?>"/>
	<table>
	<tr>
		<td width="150">nama depan</td>
		<td width="327"><input type="text" name="namadep" value="<?php echo $buff['namadep'];?>"/></td>
	</tr>
	<tr>
		<td>nama belakang</td>
		<td><input type="text" name="namabel" value="<?php echo $buff['namabel'];?>"/></td>
	</tr>
	<tr>
		<td>username</td>
		<td><input type="text" name="username" value="<?php echo $buff['username'];?>"/></td>
	</tr>
	<tr>
		<td>password</td>
		<td><input type="password" name="password" value="<?php echo $buff['password'];?>"/></td>
	</tr>
	<tr>
		<td>usia</td>
		<td><input type="text" name="usia" value="<?php echo $buff['usia'];?>"/></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td><input type="text" name="jk" value="<?php echo $buff['jk'];?>"/></td>
	</tr>
	<tr>
		<td>tempat tanggal lahir</td>
		<td><input type="text" name="ttl" value="<?php echo $buff['ttl'];?>"/></td>
	</tr>
	<tr>
		<td>email</td>
		<td><input type="text" name="email" value="<?php echo $buff['email'];?>"/></td>
	</tr>
	<tr>
		<td>notel</td>
		<td><input type="text" name="notel" value="<?php echo $buff['notel'];?>"/></td>
	</tr>
	<tr>
		<td height="68" align="right"><input type="reset" value="reset"/></td>
		<td><input type="submit" value="Submit"/></td>
	</tr>
</table>
</form>
<?php
};
mysqli_close($koneksi);
?>	
</body>
</html>
