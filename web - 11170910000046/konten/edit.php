<?php 
    include "koneksi.php";
    $query = "select * from register where id='".$_GET['id']."'";
    $hasil = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($hasil);
?>
<form action="edit.php?t=edit&id=<?php echo $_GET['id']?>" method="post">
	<p>&nbsp;</p>
	<div align="center" class="style1">
		<p>Edit</p>
	</div>
	<table width="496" border="0" align="center">
		<tr>       
			<td width="163">Nama Depan :</td>
			<td width="317"><input type="text" name="namadep" value='<?php echo $row['namadep']; ?>'></td>
		</tr>
		<tr>
			<td>Nama Belakang :</td>
			<td><input type="text" name="namabel" value='<?php echo $row['namabel']; ?>'></td>
		</tr>
		<tr>
			<td>Username :</td>
			<td><input type="text" name="username" value='<?php echo $row['username']; ?>'></td>
		</tr> 
		<tr>
			<td>Password :</td>
			<td><input type="password" name="password" value='<?php echo $row['password']; ?>'></td>
		</tr>
		<tr>
			<td>Usia :</td>
			<td><input type="text" name="usia" value='<?php echo $row['usia']; ?>'></td>
		</tr>    
		<tr>
			<td>Jenis Kelamin :</td>
			<td><input type="text" name="jk" value='<?php echo $row['jk']; ?>'></td>
		</tr>    
		<tr>
			<td>Tempat Tanggal Lahir :</td>
			<td><input type="text" name="ttl" value='<?php echo $row['ttl']; ?>'></td>
		</tr>    
		<tr>
			<td>Email :</td>
			<td><input type="text" name="email" value='<?php echo $row['email']; ?>'></td>
		</tr>  
		<tr>
			<td>Nomer Telepon :</td>
			<td><input type="text" name="notel" value='<?php echo $row['notel']; ?>'></td>
		</tr> 
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="input"></td>
		</tr>  
	</table>
			</div>