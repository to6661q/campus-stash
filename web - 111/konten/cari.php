<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8"/>
<title>Untitled Document</title>
</head>

<body>
cari member
<form action="index.php?module=cari&pos" method="post">
<input type="text" name="username" placeholder="ketikan username"/>
<input type="submit" value="cari"/>
</form><br/>
<h2>Hasil Pencarian</h2><br/>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$username=$_POST['username'];
	$select="select *from register where username like '$username'";
}
else{
	$select="select *from register";
}
$no=1;
include"koneksi.php";
$hasil=mysqli_query($koneksi,$select);
?>
<table width="1105" border="1">
		<tr>
			<th align="center" width="3%">Id</th>
			<th align="center" width="8.3%">Nama Depan</th>
			<th align="center" width="8.3%">Nama Belakang</th>
			<th align="center" width="8.3%">Username</th>
			<th align="center" width="8.3%">Password</th>
			<th align="center" width="8.3%">Usia</th>
			<th align="center" width="8.3%">JK</th>
			<th align="center" width="8.3%">TTL</th>
			<th align="center" width="15.1%">Email</th>
			<th align="center" width="12.1">Notel</th>
			<th align="center" colspan="2" width="10%">Aksi</th>
		</tr>
<?php
while($buff=mysqli_fetch_array($hasil)){
?>
	<tr>
				<td width="3%" align="center"><?php echo $no; ?></td>
				<td width="8.3%" align="center"><?php echo $buff['namadep']; ?></td>
				<td width="8.3%" align="center"><?php echo $buff['namabel']; ?></td>
				<td width="8.3%" align="center"><?php echo $buff['username']; ?></td>
				<td width="8.3%" align="center"><?php echo $buff['password']; ?></td>
				<td width="8.3%" align="center"><?php echo $buff['usia']; ?></td>
				<td width="8.3%" align="center"><?php echo $buff['jk']; ?></td>
				<td width="8.3%" align="center"><?php echo $buff['ttl']; ?></td>
				<td width="15.1%" align="center"><?php echo $buff['email']; ?></td>
				<td width="12.1%" align="center"><?php echo $buff['notel']; ?></td>
				<td width="5%" align="center"><a href="?module=edit&id=<?php echo $buff['id']; ?>">edit</a></td>
				<td width="5%" align="center"><a href="hapus.php?id=<?php echo $buff['id']; ?>">hapus</a></td>
			</tr>

<?php
$no++;
};
mysqli_close($koneksi);
?>
</table><br/>
<a href="index.php"><---- kembali ke index </a>