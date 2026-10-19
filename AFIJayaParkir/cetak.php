<?php  
include 'koneksi.php';
include 'modul.php';
$proses = new Modul($host);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cetak Laporan</title>
</head>
<body>
	<center>
		<h2>DATA LAPORAN PARKIR</h2>
		<h4>AFI Jaya Parkir</h4>
	</center>

	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Nomor Kendaraan</th>
			<th>Keterangan</th>
			<th>Waktu Masuk</th>
			<th>Waktu Keluar</th>
			<th>Biaya</th>
		</tr>

		<?php  
		$no = 1;
		$history = $proses->tampil_history_parkir();
		foreach ($history as $data):
		?>

		<tr>
			<td><?= $no++; ?></td>
			<td><?= $data['plat_nomor'] ?></td>
			<td><?= $data['keterangan'] ?></td>
			<td><?= $data['waktu_masuk'] ?></td>
			<td><?= $data['waktu_keluar'] ?></td>
			<td><?php if(!is_null($data['biaya'])) echo "Rp ".$data['biaya'] ?></td>
		</tr>
		<?php endforeach; ?>

	</table>

	<script>
		window.print();
	</script>

</body>
</html>