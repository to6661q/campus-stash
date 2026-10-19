<h2>Grafik</h2>
<hr>

<table>
	<tr>
		<td valign=bottom align=center>
			<div style="height:50px;">40</div>
			<div style="height:50px;">30</div>
			<div style="height:50px;">20</div>
			<div style="height:60px;">10</div>
		</td>
		
		<?php for ($i=1; $i <= 12; $i++): ?>
		<td valign=bottom align=center width="70px;">
			<div style="width:30px; height:<?= $proses->banyak_parkir($i)*5 ?>px; background:green;" title="<?= $proses->banyak_parkir($i) ?>"></div>
		</td>
		<?php endfor; ?>

	</tr>
	<tr>
		<th></th>
		<th>Januari</th>
		<th>Februari</th>
		<th>Maret</th>
		<th>April</th>
		<th>Mei</th>
		<th>Juni</th>
		<th>Juli</th>
		<th>Agustus</th>
		<th>September</th>
		<th>Oktober</th>
		<th>November</th>
		<th>Desember</th>
	</tr>
</table>
<br>
<table>
	<tr>
		<td>
			<div style="width:20px; height:20px; background:green;">
		</td>
		<th align="left">Banyak Kendaraan yang Parkir</th>
	</tr>
</table>