<script>
	function update(id_gedung, nama_gedung, nomor_tempat) {
		document.getElementById('tempat_parkir').value = nama_gedung+' Nomor '+nomor_tempat
		document.getElementById('id_gedung').value = id_gedung
		document.getElementById('nomor_tempat').value = nomor_tempat
	}
</script>

<?php  
$tersedia = $proses->parkir_tersedia();
if ($tersedia['id_gedung']==0) {
	$tempat_parkir = '';
	$id_gedung = '';
	$nomor_tempat = '';
} else {
	$id_gedung = $tersedia['id_gedung'];
	$nomor_tempat = $tersedia['nomor_tempat'];
	$tempat_parkir = $tersedia['nama_gedung'].' Nomor '.$nomor_tempat;
}

?>

<h2>Masuk Parkir Kendaraan</h2>
<hr>
<form action="?page=proses" method="post" class="form">
	<input type="hidden" name="id_proses" value="parkir_masuk">
	<div class="grup">	
		<label>Nomor Kendaraan</label>
		<input type="text" name="plat_nomor" required><br>
	</div>

	<div class="grup">
		<label>Tempat Parkir</label>
		<input type="text" name="tempat_parkir" id="tempat_parkir" value="<?= $tempat_parkir ?>" disabled>
	</div>

	<input type="hidden" name="id_gedung" id="id_gedung" value="<?= $id_gedung ?>">
	<input type="hidden" name="nomor_tempat" id="nomor_tempat" value="<?= $nomor_tempat ?>">
	
	<div class="grup">	
		<input type="submit" value="Masuk" name="masuk">
	</div>

</form>
<br>
<br>
<br>
<div class="content-right">	
<table border="1">
	<tr>
		<th>No</th>
		<th>Lokasi</th>
		<th>Nomor Tempat</th>
		<th>Status</th>
	</tr>

	<?php
	$no = 1;
	$gedung = $proses->tampil_gedung();
	foreach ($gedung as $gdg):
		$nama_gedung = $gdg['nama_gedung'];
		for ($i=1; $i <= $gdg['kuota']; $i++):
			
	?>

	<tr>
		<td><?= $no++ ?></td>
		<td><?= $nama_gedung ?></td>
		<td><?= $i ?></td>
		<td>
			<?php if ($proses->cek_parkir($gdg['id_gedung'], $i)==false): ?>
				<button onclick="update(<?= $gdg['id_gedung'] ?>, '<?= $nama_gedung ?>', <?= $i ?>)">Pilih</button>
			<?php else: ?>	
				Tidak Tersedia
			<?php endif; ?>
		</td>
	</tr>

	<?php 
		endfor;
	endforeach;
	?>
	
</table>
</div>