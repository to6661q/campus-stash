<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>My Website</title>
</head>
<body>
	<h2>Daftar Pengguna</h2><br />
	<?php
		include"koneksi/koneksi.php";
		$select="select * from user";
		$hasil=mysqli_query($conn, $select);
	?>
	<table width="780" border="1">
		<tr>
			<td width="20">ID</td>
			<td width="100">Nama</td>
			<td width="150">Email</td>
			<td width="100">Telepon</td>
			<td width="70">Pengguna</td>
			<td width="90">Username</td>
			<td width="90">Password</td>
			<td colspan="2">Aksi</td>
		</tr>
	</table>
	<?php
		$count=0;
		while($buff=mysqli_fetch_array($hasil)){
		$count++;
	?>
	<table width="780" border="1">
		<tr>
			<td width="20"><?php echo $count;?></td>
			<td width="100"><?php echo $buff['name'];?></td>
			<td width="150"><?php echo $buff['email'];?></td>
			<td width="100"><?php echo $buff['notel'];?></td>
			<td width="70"><?php echo $buff['level'];?></td>
			<td width="90"><?php echo $buff['username'];?></td>
			<td width="90"><?php echo $buff['password'];?></td>
			<td width="55"><a href="?module=edit&id=<?php echo $buff['id']; ?>">Edit</a></td>
			<td><a href="index.php?module=hapus&id=<?php echo $buff['id']; ?>">Hapus</a></td>
		</tr>
	</table>
	<?php
	};
	mysqli_close($conn);
	?><br />
	<a href="?module=insert2#pos">(+) Tambah Pengguna</a>

</body>
</html>