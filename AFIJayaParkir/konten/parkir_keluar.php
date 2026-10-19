<h2>Keluar Parkir Kendaraan</h2>
<hr>
<form action="?page=proses" method="post" class="form">
	<input type="hidden" name="id_proses" value="parkir_keluar">
	<div class="grup">
		<label>Nomor Kendaraan</label>
		<input type="text" name="plat_nomor" required><br>
	</div>

	<div class="grup">
		<input type="submit" value="Keluar">
	</div>
	
</form>

<?php 
if(isset($_GET['id'])):
$plat = $_GET['id']; 
$data = $proses->cek_biaya($plat);
?>
<br>
<br>
<h3>Terakhir Keluar</h3>
<table>
	<tr>
		<td>Nomor Kendaraan</td>
		<td>:</td>
		<td><?= $data['plat_nomor'] ?></td>
	</tr>
	<tr>
		<td>Waktu Masuk</td>
		<td>:</td>
		<td><?= $data['waktu_masuk'] ?></td>
	</tr>
	<tr>
		<td>Waktu Keluar</td>
		<td>:</td>
		<td><?= $data['waktu_keluar'] ?></td>
	</tr>
	<tr>
		<td>Biaya</td>
		<td>:</td>
		<td>Rp <?= $data['biaya'] ?></td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td>:</td>
		<td><?= $data['keterangan'] ?></td>
	</tr>
</table>
<?php endif; ?>