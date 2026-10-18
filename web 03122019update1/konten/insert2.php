<body>
<h2>Register</h2><br />
<style type="text/css">
<!--
.style1{
	color: #000099;
	font-weight: bold;
}
-->
</style>
<form action="tambah.php" method="post">
	
	<table width="496" border="0" >
		<tr>
			<td width="163">Nama :</td>
			<td width="317"><input type="text" name="name" required="required"/></td>
		</tr>
		<tr>
			<td>Email :</td>
			<td><input type="text" name="email" required="required"/></td>
		</tr>
		<tr>
			<td>Nomor Telepon :</td>
			<td><input type="text" name="notel" required="required"/></td>
		</tr>
		<tr>
			<td>Pekerjaan:</td>
			<td>
				<select name="level">
					<option value="dosen">Dosen</option>
					<option value="mahasiswa">Mahasiswa</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Username :</td>
			<td><input type="text" name="username" required="required"/></td>
		</tr>
		<tr>
			<td>Password :</td>
			<td><input type="password" name="password" required="required"/></td>
		</tr>
		
			<td height="68" align="right"><input type="reset" value="reset" /></td>
			<td><input type="submit" value="submit" /></td>
		</tr>
	</table>
</form>
<a href="halmin.php?module=view#pos">Lihat Daftar Pengguna</a>
</body>
