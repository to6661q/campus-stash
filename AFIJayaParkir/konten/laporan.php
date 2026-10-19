<h2>Laporan</h2>
<hr>
<form action="" method="post" class="form">
	<div class="grup">
		<input type="text" name="cari" placeholder="Masukkan Plat Nomor">
	</div>
	<div class="grup">
		<input type="submit" value="Cari">
	</div>
</form>
<br>
<br>
<a href="cetak.php" target="_blank">Cetak</a>
<br>
<table border="1">
	<tr>
		<th>No</th>
		<th>Nomor Kendaraan</th>
		<th>Keterangan</th>
		<th>Waktu Masuk</th>
		<th>Waktu Keluar</th>
		<th>Biaya</th>
	</tr>

	<?php  
	$no = 1;
	if (isset($_POST['cari'])) {
		$laporan = $proses->tampil_history_parkir_2($_POST['cari']);
	} else {
		$laporan = $proses->tampil_history_parkir();
	}
	
	foreach ($laporan as $data) :
	?>

	<tr>
		<td><?= $no++ ?></td>
		<td><?= $data['plat_nomor'] ?></td>
		<td><?= $data['keterangan'] ?></td>
		<td><?= $data['waktu_masuk'] ?></td>
		<td><?= $data['waktu_keluar'] ?></td>
		<td><?php if(!is_null($data['biaya'])) echo "Rp ".$data['biaya'] ?></td>
	</tr>

<?php
endforeach;
?>

</table>