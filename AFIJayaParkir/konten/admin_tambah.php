<h2>Tambah Data Admin</h2>
<hr>
<form action="?page=proses" method="post" class="form">
	<input type="hidden" name="id_proses" value="tambah_admin">
	<div class="grup">
		<label>Nama</label>
	 	<input type="text" name="nama" required>
	</div>

	<div class="grup">
		<label>Username</label>
		<input type="text" name="username" required><br>
	</div>

	<div class="grup">
		<label>Password</label>
		<input type="password" name="password" required><br>
	</div>

	<div class="grup">
		<label>Tanggal Lahir</label>
		<input type="date" name="tgl_lahir" required><br>
	</div>

	<div class="grup">
		<a href="javascript:history.back()">Batal</a>
		<input type="submit" value="Tambah">
	</div>
</form>	