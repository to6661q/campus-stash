<?php
$no = 1;
?>

<h2>Data Gedung</h2>
<hr>
<a href="?page=gedung_tambah">Tambah</a>
<br>
<br>
<table border="1">
	<tr>
		<th>No</th>
		<th>Nama Gedung</th>
		<th>Kuota</th>
		<th>Tersedia</th>
		<th>Aksi</th>
	</tr>
	<?php
	$gedung = $proses->tampil_gedung();
	foreach ($gedung as $data):
	?>
	<tr>
		<td><?= $no++; ?></td>
		<td><?= $data['nama_gedung'] ?></td>
		<td><?= $data['kuota'] ?></td>
		<td><?= $data['sisa'] ?></td>
		<td>
			<a href="?page=gedung_ubah&id=<?= $data['id_gedung'] ?>">Ubah</a> |
			<a href="?page=proses&status=hapus_gedung&id=<?= $data['id_gedung'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $data['nama_gedung'] ?>?')">Hapus</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>