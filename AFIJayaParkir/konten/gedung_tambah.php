<h2>Ubah Data Gedung</h2>
<hr>
<form action="?page=proses" method="post" class="form">
	<input type="hidden" name="id_proses" value="tambah_gedung">
	<div class="grup">
		<label>Nama Gedung</label>
		<input type="text" name="nama_gedung" required><br>
	</div>

	<div class="grup">
		<label>Kuota</label>
		<input type="text" name="kuota" required><br>
	</div>

	<div class="grup">
		<a href="javascript:history.back()">Batal</a>
		<input type="submit" value="Tambah">
	</div>
</form>	