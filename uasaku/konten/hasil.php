<?php
include "../koneksi/koneksi.php";
?>
<h2>Hasil kuesioner keseluruhan</h2>

<div class="view">
	<table width="100%" border="2">
		<tr align="center">
			<td rowspan="2">Jenis Pertanyaan</td>
			<td colspan="5">Tanggapan</td>
			<td rowspan="2">Rata-rata</td>
		</tr>
		<tr align="center">
			<td width="50">1</td>
			<td width="50">2</td>
			<td width="50">3</td>
			<td width="50">4</td>
			<td width="50">5</td>
		</tr>

		<?php
		$id_dosen = $_GET['id_dosen'];
		if ($_SESSION['level'] == 'dosen') {
			$select = "SELECT bank_soal.pertanyaan , bank_jawaban.nilai FROM ((bank_jawaban INNER JOIN akun ON bank_jawaban.id=akun.id)
			INNER JOIN bank_soal ON bank_jawaban.id_soal=bank_soal.id_soal) WHERE akun.id='$id'";
			$hasil = mysqli_query($conn, $select);
			$rowcount = mysqli_num_rows($hasil);
			if ($rowcount != 0) {
				?>
				<tr>
					<?php
							$select1 = "SELECT bank_soal.jenis , bank_jawaban.nilai FROM ((bank_jawaban INNER JOIN akun ON bank_jawaban.id=akun.id)INNER JOIN bank_soal ON bank_jawaban.id_soal=bank_soal.id_soal) WHERE akun.id='$id' AND bank_soal.jenis='mengajar'";
							$hasil1 = mysqli_query($conn, $select1);
							$total = 0;
							$total1 = 0;
							$total2 = 0;
							$total3 = 0;
							$total4 = 0;
							$total5 = 0;
							while ($buff1 = mysqli_fetch_array($hasil1)) {
								switch ($buff1['nilai']) {
									case 1: {
											$total1++;
											break;
										}

									case 2: {
											$total2++;
											break;
										}

									case 3: {
											$total3++;
											break;
										}

									case 4: {
											$total4++;
											break;
										}

									case 5: {
											$total5++;
											break;
										}

									default:
										break;
								}
								$total = ($total1 * 1 + $total2 * 2 + $total3 * 3 + $total4 * 4 + $total5 * 5) / ($total1 + $total2 + $total3 + $total4 + $total5);
							}
							?>
						<td>Cara Mengajar</td>
						<td align="center"><?php echo $total1; ?></td>
						<td align="center"><?php echo $total2; ?></td>
						<td align="center"><?php echo $total3; ?></td>
						<td align="center"><?php echo $total4; ?></td>
						<td align="center"><?php echo $total5; ?></td>
						<td align="center"><?php echo $total; ?></td>
				</tr>
				<tr>
					<?php
							$select1 = "SELECT bank_soal.jenis , bank_jawaban.nilai FROM ((bank_jawaban INNER JOIN akun ON bank_jawaban.id=akun.id)INNER JOIN bank_soal ON bank_jawaban.id_soal=bank_soal.id_soal) WHERE akun.id='$id' AND bank_soal.jenis='menguasai'";
							$hasil1 = mysqli_query($conn, $select1);
							$total1 = 0;
							$total2 = 0;
							$total3 = 0;
							$total4 = 0;
							$total5 = 0;
							while ($buff1 = mysqli_fetch_array($hasil1)) {
								switch ($buff1['nilai']) {
									case 1: {
											$total1++;
											break;
										}

									case 2: {
											$total2++;
											break;
										}

									case 3: {
											$total3++;
											break;
										}

									case 4: {
											$total4++;
											break;
										}

									case 5: {
											$total5++;
											break;
										}

									default:
										break;
								}
							}
							$total = ($total1 * 1 + $total2 * 2 + $total3 * 3 + $total4 * 4 + $total5 * 5) / ($total1 + $total2 + $total3 + $total4 + $total5);
							?>
						<td>Penguasaan Materi</td>
						<td align="center"><?php echo $total1; ?></td>
						<td align="center"><?php echo $total2; ?></td>
						<td align="center"><?php echo $total3; ?></td>
						<td align="center"><?php echo $total4; ?></td>
						<td align="center"><?php echo $total5; ?></td>
						<td align="center"><?php echo $total; ?></td>
				</tr>
				<tr>
					<?php
							$select1 = "SELECT bank_soal.jenis , bank_jawaban.nilai FROM ((bank_jawaban INNER JOIN akun ON bank_jawaban.id=akun.id)INNER JOIN bank_soal ON bank_jawaban.id_soal=bank_soal.id_soal) WHERE akun.id='$id' AND bank_soal.jenis='tingkah_laku'";
							$hasil1 = mysqli_query($conn, $select1);
							$total1 = 0;
							$total2 = 0;
							$total3 = 0;
							$total4 = 0;
							$total5 = 0;
							while ($buff1 = mysqli_fetch_array($hasil1)) {
								switch ($buff1['nilai']) {
									case 1: {
											$total1++;
											break;
										}

									case 2: {
											$total2++;
											break;
										}

									case 3: {
											$total3++;
											break;
										}

									case 4: {
											$total4++;
											break;
										}

									case 5: {
											$total5++;
											break;
										}

									default:
										break;
								}
								$total = ($total1 * 1 + $total2 * 2 + $total3 * 3 + $total4 * 4 + $total5 * 5) / ($total1 + $total2 + $total3 + $total4 + $total5);
							}
							?>
						<td>Tingkah Laku</td>
						<td align="center"><?php echo $total1; ?></td>
						<td align="center"><?php echo $total2; ?></td>
						<td align="center"><?php echo $total3; ?></td>
						<td align="center"><?php echo $total4; ?></td>
						<td align="center"><?php echo $total5; ?></td>
						<td align="center"><?php echo $total; ?></td>
				</tr>
			<?php } ?>


			<!–– kolom admin ––>


				<?php
				} elseif ($_SESSION['level'] == 'admin') {
					$select = "SELECT bank_soal.jenis , bank_jawaban.nilai FROM ((bank_jawaban INNER JOIN akun ON bank_jawaban.id=akun.id)INNER JOIN bank_soal ON bank_jawaban.id_soal=bank_soal.id_soal)";
					$hasil = mysqli_query($conn, $select);
					$rowcount = mysql_num_rows($hasil);
					if ($rowcount != 0) {
						?>
					<tr>
						<?php
								$select1 = "SELECT bank_soal.jenis , bank_jawaban.nilai FROM ((bank_jawaban INNER JOIN akun ON bank_jawaban.id=akun.id)INNER JOIN bank_soal ON bank_jawaban.id_soal=bank_soal.id_soal) WHERE bank_soal.jenis='mengajar'";
								$hasil1 = mysqli_query($conn, $select1);
								$total = 0;
								$total1 = 0;
								$total2 = 0;
								$total3 = 0;
								$total4 = 0;
								$total5 = 0;
								while ($buff1 = mysqli_fetch_array($hasil1)) {
									switch ($buff1['nilai']) {
										case 1: {
												$total1++;
												break;
											}

										case 2: {
												$total2++;
												break;
											}

										case 3: {
												$total3++;
												break;
											}

										case 4: {
												$total4++;
												break;
											}

										case 5: {
												$total5++;
												break;
											}

										default:
											break;
									}
									$total = ($total1 * 1 + $total2 * 2 + $total3 * 3 + $total4 * 4 + $total5 * 5) / ($total1 + $total2 + $total3 + $total4 + $total5);
								}
								?>
							<td>Cara Mengajar</td>
							<td align="center"><?php echo $total1; ?></td>
							<td align="center"><?php echo $total2; ?></td>
							<td align="center"><?php echo $total3; ?></td>
							<td align="center"><?php echo $total4; ?></td>
							<td align="center"><?php echo $total5; ?></td>
							<td align="center"><?php echo $total; ?></td>
					</tr>
					<tr>
						<?php
								$select1 = "SELECT bank_soal.jenis , bank_jawaban.nilai FROM ((bank_jawaban INNER JOIN akun ON bank_jawaban.id=akun.id)INNER JOIN bank_soal ON bank_jawaban.id_soal=bank_soal.id_soal) WHERE bank_soal.jenis='menguasai'";
								$hasil1 = mysqli_query($conn, $select1);
								$total1 = 0;
								$total2 = 0;
								$total3 = 0;
								$total4 = 0;
								$total5 = 0;
								while ($buff1 = mysqli_fetch_array($hasil1)) {
									switch ($buff1['nilai']) {
										case 1: {
												$total1++;
												break;
											}

										case 2: {
												$total2++;
												break;
											}

										case 3: {
												$total3++;
												break;
											}

										case 4: {
												$total4++;
												break;
											}

										case 5: {
												$total5++;
												break;
											}

										default:
											break;
									}
									$total = ($total1 * 1 + $total2 * 2 + $total3 * 3 + $total4 * 4 + $total5 * 5) / ($total1 + $total2 + $total3 + $total4 + $total5);
								}
								?>
							<td>Penguasaan Materi</td>
							<td align="center"><?php echo $total1; ?></td>
							<td align="center"><?php echo $total2; ?></td>
							<td align="center"><?php echo $total3; ?></td>
							<td align="center"><?php echo $total4; ?></td>
							<td align="center"><?php echo $total5; ?></td>
							<td align="center"><?php echo $total; ?></td>
					</tr>
					<tr>
						<?php
								$select1 = "SELECT bank_soal.jenis , bank_jawaban.nilai FROM ((bank_jawaban INNER JOIN akun ON bank_jawaban.id=akun.id)INNER JOIN bank_soal ON bank_jawaban.id_soal=bank_soal.id_soal) WHERE bank_soal.jenis='tingkah_laku'";
								$hasil1 = mysqli_query($conn, $select1);
								$total1 = 0;
								$total2 = 0;
								$total3 = 0;
								$total4 = 0;
								$total5 = 0;
								while ($buff1 = mysqli_fetch_array($hasil1)) {
									switch ($buff1['nilai']) {
										case 1: {
												$total1++;
												break;
											}

										case 2: {
												$total2++;
												break;
											}

										case 3: {
												$total3++;
												break;
											}

										case 4: {
												$total4++;
												break;
											}

										case 5: {
												$total5++;
												break;
											}

										default:
											break;
									}
									$total = ($total1 * 1 + $total2 * 2 + $total3 * 3 + $total4 * 4 + $total5 * 5) / ($total1 + $total2 + $total3 + $total4 + $total5);
								}
								?>
							<td>Tingkah Laku</td>
							<td align="center"><?php echo $total1; ?></td>
							<td align="center"><?php echo $total2; ?></td>
							<td align="center"><?php echo $total3; ?></td>
							<td align="center"><?php echo $total4; ?></td>
							<td align="center"><?php echo $total5; ?></td>
							<td align="center"><?php echo $total; ?></td>
					</tr>
			<?php
				}
			}
			?>
	</table> <br> <br>

	<?php
	$mengajar = 0;
	$menguasai = 0;
	$tingkah_laku = 0;
	$select1 = "SELECT bank_soal.jenis , bank_jawaban.nilai FROM ((bank_jawaban INNER JOIN akun ON bank_jawaban.id=akun.id)INNER JOIN bank_soal ON bank_jawaban.id_soal=bank_soal.id_soal) WHERE bank_soal.jenis='mengajar'";
	$hasil1 = mysqli_query($conn, $select1);
	$count = 0;
	while ($buff1 = mysqli_fetch_array($hasil1)) {
		$count++;
		$mengajar += $buff1['nilai'];
	}
	$mengajar = $mengajar / $count;

	$select1 = "SELECT bank_soal.jenis , bank_jawaban.nilai FROM ((bank_jawaban INNER JOIN akun ON bank_jawaban.id=akun.id)INNER JOIN bank_soal ON bank_jawaban.id_soal=bank_soal.id_soal) WHERE bank_soal.jenis='menguasai'";
	$hasil1 = mysqli_query($conn, $select1);
	$count = 0;
	while ($buff1 = mysqli_fetch_array($hasil1)) {
		$count++;
		$menguasai += $buff1['nilai'];
	}
	$menguasai = $menguasai / $count;

	$select1 = "SELECT bank_soal.jenis , bank_jawaban.nilai FROM ((bank_jawaban INNER JOIN akun ON bank_jawaban.id=akun.id)INNER JOIN bank_soal ON bank_jawaban.id_soal=bank_soal.id_soal) WHERE bank_soal.jenis='tingkah_laku'";
	$hasil1 = mysqli_query($conn, $select1);
	$count = 0;
	while ($buff1 = mysqli_fetch_array($hasil1)) {
		$count++;
		$tingkah_laku += $buff1['nilai'];
	}
	$tingkah_laku = $tingkah_laku / $count;
	?>

	<h2>Grafik hasil kuesioner keseluruhan</h2>
	<div>
		<canvas id="myChart" width="600" height="300"></canvas>
	</div>
	<script>
		var mengajar = <?php echo $mengajar; ?>;
		var menguasai = <?php echo $menguasai; ?>;
		var tingkah_laku = <?php echo $tingkah_laku; ?>;
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['Cara Mengajar', 'Penguasaan Materi', 'Tingkah Laku'],
				datasets: [{
					label: 'Tampilkan grafik',
					data: [
						mengajar, menguasai, tingkah_laku
					],
					backgroundColor: [
						'#ff8c69', '#87cefa', '#98FB98'
					],
					borderWidth: 1,
					borderColor: '#777',
					hoverBorderWidth: 3,
					hoverBorderColor: '#000'
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							min: 0,
							max: 5
						}
					}]
				}
			}
		});
	</script>
	<script>
		window.print();
	</script>
</div>