<h2>Ubah Data User</h2>
<hr>

<?php  
if(isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = $_SESSION['id_akun'];
}

$admin = $proses->tampil_user_id($id);

foreach ($admin as $data):
?>

	<form action="?page=proses" method="post" class="form">
		<input type="hidden" name="id_proses" value="ubah_user">
		<input type="hidden" name="plat_nomor" value="<?= $data['id_akun'] ?>">

		<div class="grup">
			<label>Nomor Kendaraan</label>
			<input type="text" value="<?= $data['id_akun'] ?>" disabled><br>
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
			<a href="javascript:history.back()">Batal</a>
			<input type="submit" value="Ubah">
		</div>
	</form>

<?php endforeach; ?>