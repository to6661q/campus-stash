<h2>Tarif Parkir</h2>
<hr>

<?php  
$data = $proses->tampil_tarif();
?>

<form action="?page=proses" method="post" class="form">
	<input type="hidden" name="id_proses" value="ubah_tarif">
	<div class="grup">
		<label>Tarif 1 Jam Pertama</label>
		<input type="number" name="tarif_awal" value="<?= $data[0] ?>" required><br>
	</div>

	<div class="grup">
		<label>Tarif Per Jam Berikutnya</label>
		<input type="number" name="tarif_perjam" value="<?= $data[1] ?>" required><br>
	</div>

	<div class="grup">
		<label>Tarif Maksimal</label>
		<input type="number" name="tarif_maks" value="<?= $data[2] ?>" required><br>
	</div>

	<div class="grup">
		<input type="reset" value="Reset">
		<input type="submit" value="Simpan">
	</div>
</form>	