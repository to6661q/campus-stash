<html>
	<table width="1105" border="1">
		<tr>
			<td align="center" width="3%">Id</td>
			<td align="center" width="8.3%">NaDep</td>
			<td align="center" width="8.3%">NaBel</td>
			<td align="center" width="8.3%">Username</td>
			<td align="center" width="8.3%">JK</td>
			<td align="center" width="15.1%">Email</td>
			<td align="center" width="12.1">NoTel</td>
			<td align="center" colspan="2" width="10%">Aksi</td>
		</tr>
	<?php
	while($buff=mysqli_fetch_array($hasil)){
	?>
		<tr>
			<td width="3%" align="center"><?php echo $no;?></td>
			<td width="8.3%" align="center"><?php echo $buff['namadep'];?></td>
			<td width="8.3%" align="center"><?php echo $buff['namabel'];?></td>
			<td width="8.3%" align="center"><?php echo $buff['username'];?></td>
			<td width="8.3%" align="center"><?php echo $buff['jk'];?></td>
			<td width="15.1%" align="center"><?php echo $buff['email'];?></td>
			<td width="12.1%" align="center"><?php echo $buff['notel'];?></td>
			<td width="5%" align="center"><a href="?module=edit&pos&id=<?php echo $buff['id'];?>">edit</a></td>
			<td width="5%" align="center"><a href="hapus.php?id=<?php echo $buff['id'];?>">hapus</a></td>
		</tr>
	<?php
	$no++;
	};
	mysqli_close($koneksi);
	?>
	</table><br/>
	<a href="index.php"<---- kembali ke Insert </a>
</html>