<?php
$no = 1;
?>

<h2>Data User</h2>
<hr>
<a href="?page=user_tambah">Tambah</a>
<br>
<br>
<table border="1">
	<tr>
		<th>No</th>
		<th>Nomor Polisi</th>
		<th>Username</th>
		<th>Aksi</th>
	</tr>
	<?php
	$user = $proses->tampil_user();
	foreach ($user as $data):
	?>
	<tr>
		<td><?= $no++; ?></td>
		<td><?= $data['id_akun'] ?></td>
		<td><?= $data['username'] ?></td>
		<td>
			<a href="?page=user_ubah&id=<?= $data['id_akun'] ?>">Ubah</a> |
			<a href="?page=proses&status=hapus_user&id=<?= $data['id_akun'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $data['id_akun'] ?>?')">Hapus</a>
		</td>
	</tr>
	<?php endforeach;	?>
</table>