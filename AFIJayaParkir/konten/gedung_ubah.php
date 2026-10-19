<h2>Ubah Data Gedung</h2>
<hr>
<?php  
$id = $_GET['id'];
$gedung = $proses->tampil_gedung_id($id);
foreach ($gedung as $data):
?>

	<form action="?page=proses" method="post" class="form">
		<input type="hidden" name="id_proses" value="ubah_gedung">
		<input type="hidden" name="id" value="<?= $data['id_gedung'] ?>">

		<div class="grup">
			<label>Nama Gedung</label>
			<input type="text" name="nama_gedung" value="<?= $data['nama_gedung'] ?>" required><br>
		</div>

		<div class="grup">
			<label>Kuota</label>
			<input type="text" name="kuota" value="<?= $data['kuota'] ?>" required><br>
		</div>

		<div class="grup">
			<a href="javascript:history.back()">Batal</a>
			<input type="submit" value="Ubah">
		</div>

	</form>	

<?php endforeach; ?>