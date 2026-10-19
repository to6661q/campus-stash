<h2>Data Admin</h2>
<hr>
<a href="?page=admin_tambah">Tambah</a>
<br>
<br>
<table border="1">
	<tr>
		<th>No</th>
		<th>Username</th>
		<th>Nama</th>
		<th>Tanggal Lahir</th>
		<th>Aksi</th>
	</tr>
	<?php
	$no = 1;
	$admin = $proses->tampil_admin($_SESSION['username']);
	foreach ($admin as $data):
	?>
	<tr>
		<td><?= $no++; ?></td>
		<td><?= $data['username'] ?></td>
		<td><?= $data['nama'] ?></td>
		<td><?= $data['tgl_lahir'] ?></td>
		<td>
			<a href="?page=admin_ubah&id=<?= $data['username'] ?>">Ubah</a> |
			<a href="?page=proses&status=hapus_admin&id=<?= $data['id_akun'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $data['nama'] ?>?')">Hapus</a>
		</td>
	</tr>
	<?php endforeach;	?>
</table>