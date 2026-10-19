<h2>Cek Parkiran</h2>
<hr>

<table>
	<tr>
		<td><b>Nomor Kendaraan</b></td>
		<td>:</td>
		<td><?= $_SESSION['id_akun'] ?></td>
	</tr>
	<tr>
		<td><b>Tempat Parkir</b></td>
		<td>:</td>
		<td>
			<?php  
			$parkir = $proses->cek_lokasi_parkir($_SESSION['id_akun']);
			if ($parkir) {
				echo $parkir['nama_gedung']." Nomor ".$parkir['nomor_tempat'];
			} else {
				echo "Anda tidak sedang parkir";
			}
			?>
		</td>
	</tr>
</table>