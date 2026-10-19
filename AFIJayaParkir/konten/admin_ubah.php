<h2>Ubah Data Admin</h2>
<hr>

<?php  
if(isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = $_SESSION['username'];
}
$admin = $proses->tampil_admin_id($id);
foreach ($admin as $data): 
?>

	<form action="?page=proses" method="post" class="form">
		<input type="hidden" name="id_proses" value="ubah_admin">
		<input type="hidden" name="id" value="<?= $data['id_akun'] ?>">
		<div class="grup">
			<label>Nama</label>
			<input type="text" name="nama" value="<?= $data['nama'] ?>" required><br>
		</div>

		<div class="grup">
			<label>Username</label>
			<input type="text" name="username" value="<?= $data['username'] ?>" required><br>
		</div>

		<div class="grup">
			<label>Password</label>
			<input type="password" name="password" value="<?= $data['password'] ?>" required><br>
		</div>

		<div class="grup">
			<label>Tanggal Lahir</label>
			<input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" required><br>
		</div>

		<div class="grup">
			<a href="javascript:history.back()">Batal</a>
			<input type="submit" value="Ubah">
		</div>
	</form>	

<?php endforeach; ?>