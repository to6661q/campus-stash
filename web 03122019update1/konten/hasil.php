<?php
include "../koneksi/koneksi.php";
?>
<h2>Hasil kuesioner keseluruhan</h2>

<div class="view">
	<table width="750">
        <tr align="center">
            <td rowspan="2">tipe pertanyaan</td>
            <td colspan="5">skor</td>
            <td rowspan="2" width="180">skor rata-rata</td>
        </tr>
        <tr align="center">
        	<td width="50">1</td>
        	<td width="50">2</td>
        	<td width="50">3</td>
        	<td width="50">4</td>
        	<td width="50">5</td>
        </tr>

        <?php
        	if ($_SESSION['tipe']=='mhs' || $_SESSION['tipe']=='admin') {
            $select = "SELECT * FROM nilai INNER JOIN akun ON nilai.id=akun.id INNER JOIN pertanyaan ON nilai.id_pertanyaan=pertanyaan.id_pertanyaan WHERE akun.tipe='mhs'";
            $hasil = mysqli_query($conn, $select);
            $rowcount = mysqli_num_rows($hasil);
            if ($rowcount!=0) {
        ?>
        <tr>
        	<td colspan="7" style="background: #EAEAEA">Mahasiswa</td>
        </tr>
        <tr>
        	<?php
        	$select1 = "SELECT * FROM nilai INNER JOIN akun ON nilai.id=akun.id INNER JOIN pertanyaan ON nilai.id_pertanyaan=pertanyaan.id_pertanyaan WHERE akun.tipe='mhs' AND pertanyaan.tipe_pertanyaan='akademik'";
            $hasil1 = mysqli_query($conn, $select1);
        	$total=0; $total1=0; $total2=0; $total3=0; $total4=0; $total5=0;
	            while($buff1=mysqli_fetch_array($hasil1)){
	            	switch ($buff1['skor']) {
	            		case 1:{
	            			$total1++;
	            			break;}
	            		
	            		case 2:{
	            			$total2++;
	            			break;}

	            		case 3:{
	            			$total3++;
	            			break;}

	            		case 4:{
	            			$total4++;
	            			break;}

	            		case 5:{
	            			$total5++;
	            			break;}

	            		default:
	            			break;
	            	}
	            	$total = ($total1*1 + $total2*2 + $total3*3 + $total4*4 + $total5*5)/
	            			 ($total1 + $total2 + $total3 + $total4 + $total5);
	            }
        	?>
        	<td>Akademik</td>
        	<td align="center"><?php echo $total1; ?></td>
        	<td align="center"><?php echo $total2; ?></td>
        	<td align="center"><?php echo $total3; ?></td>
        	<td align="center"><?php echo $total4; ?></td>
        	<td align="center"><?php echo $total5; ?></td>
        	<td align="center"><?php echo $total; ?></td>
        </tr>
        <tr>
        	<?php
        	$select1 = "SELECT * FROM nilai INNER JOIN akun ON nilai.id=akun.id INNER JOIN pertanyaan ON nilai.id_pertanyaan=pertanyaan.id_pertanyaan WHERE akun.tipe='mhs' AND pertanyaan.tipe_pertanyaan='umum'";
            $hasil1 = mysqli_query($conn, $select1);
        	$total1=0; $total2=0; $total3=0; $total4=0; $total5=0;
	            while($buff1=mysqli_fetch_array($hasil1)){
	            	switch ($buff1['skor']) {
	            		case 1:{
	            			$total1++;
	            			break;}
	            		
	            		case 2:{
	            			$total2++;
	            			break;}

	            		case 3:{
	            			$total3++;
	            			break;}

	            		case 4:{
	            			$total4++;
	            			break;}

	            		case 5:{
	            			$total5++;
	            			break;}

	            		default:
	            			break;
	            	}
	            }
	            $total = ($total1*1 + $total2*2 + $total3*3 + $total4*4 + $total5*5)/
						 ($total1 + $total2 + $total3 + $total4 + $total5);
        	?>
        	<td>Umum</td>
        	<td align="center"><?php echo $total1; ?></td>
        	<td align="center"><?php echo $total2; ?></td>
        	<td align="center"><?php echo $total3; ?></td>
        	<td align="center"><?php echo $total4; ?></td>
        	<td align="center"><?php echo $total5; ?></td>
        	<td align="center"><?php echo $total; ?></td>
        </tr>
        <tr>
        	<?php
        	$select1 = "SELECT * FROM nilai INNER JOIN akun ON nilai.id=akun.id INNER JOIN pertanyaan ON nilai.id_pertanyaan=pertanyaan.id_pertanyaan WHERE akun.tipe='mhs' AND pertanyaan.tipe_pertanyaan='keuangan'";
            $hasil1 = mysqli_query($conn, $select1);
        	$total1=0; $total2=0; $total3=0; $total4=0; $total5=0;
	            while($buff1=mysqli_fetch_array($hasil1)){
	            	switch ($buff1['skor']) {
	            		case 1:{
	            			$total1++;
	            			break;}
	            		
	            		case 2:{
	            			$total2++;
	            			break;}

	            		case 3:{
	            			$total3++;
	            			break;}

	            		case 4:{
	            			$total4++;
	            			break;}

	            		case 5:{
	            			$total5++;
	            			break;}

	            		default:
	            			break;
	            	}
	            	$total = ($total1*1 + $total2*2 + $total3*3 + $total4*4 + $total5*5)/
	            			 ($total1 + $total2 + $total3 + $total4 + $total5);
	            }
        	?>
        	<td>Keuangan</td>
        	<td align="center"><?php echo $total1; ?></td>
        	<td align="center"><?php echo $total2; ?></td>
        	<td align="center"><?php echo $total3; ?></td>
        	<td align="center"><?php echo $total4; ?></td>
        	<td align="center"><?php echo $total5; ?></td>
        	<td align="center"><?php echo $total; ?></td>
        </tr>
    	<?php } ?>


        <!–– kolom dosen ––>


        <?php
    		} elseif ($_SESSION['tipe']=='dosen' || $_SESSION['tipe']=='admin') {
            $select = "SELECT * FROM nilai INNER JOIN akun ON nilai.id=akun.id INNER JOIN pertanyaan ON nilai.id_pertanyaan=pertanyaan.id_pertanyaan WHERE akun.tipe='dosen'";
            $hasil = mysqli_query($conn, $select);
            $rowcount = mysqli_num_rows($hasil);
            if ($rowcount!=0) {
        ?>
        <tr>
        	<td colspan="7" style="background: #EAEAEA">Dosen</td>
        </tr>
        <tr>
        	<?php
        	$select1 = "SELECT * FROM nilai INNER JOIN akun ON nilai.id=akun.id INNER JOIN pertanyaan ON nilai.id_pertanyaan=pertanyaan.id_pertanyaan WHERE akun.tipe='dosen' AND pertanyaan.tipe_pertanyaan='akademik'";
            $hasil1 = mysqli_query($conn, $select1);
        	$total=0; $total1=0; $total2=0; $total3=0; $total4=0; $total5=0;
	            while($buff1=mysqli_fetch_array($hasil1)){
	            	switch ($buff1['skor']) {
	            		case 1:{
	            			$total1++;
	            			break;}
	            		
	            		case 2:{
	            			$total2++;
	            			break;}

	            		case 3:{
	            			$total3++;
	            			break;}

	            		case 4:{
	            			$total4++;
	            			break;}

	            		case 5:{
	            			$total5++;
	            			break;}

	            		default:
	            			break;
	            	}
	            	$total = ($total1*1 + $total2*2 + $total3*3 + $total4*4 + $total5*5)/
	            			 ($total1 + $total2 + $total3 + $total4 + $total5);
	            }
        	?>
        	<td>Akademik</td>
        	<td align="center"><?php echo $total1; ?></td>
        	<td align="center"><?php echo $total2; ?></td>
        	<td align="center"><?php echo $total3; ?></td>
        	<td align="center"><?php echo $total4; ?></td>
        	<td align="center"><?php echo $total5; ?></td>
        	<td align="center"><?php echo $total; ?></td>
        </tr>
        <tr>
        	<?php
        	$select1 = "SELECT * FROM nilai INNER JOIN akun ON nilai.id=akun.id INNER JOIN pertanyaan ON nilai.id_pertanyaan=pertanyaan.id_pertanyaan WHERE akun.tipe='dosen' AND pertanyaan.tipe_pertanyaan='umum'";
            $hasil1 = mysqli_query($conn, $select1);
        	$total1=0; $total2=0; $total3=0; $total4=0; $total5=0;
	            while($buff1=mysqli_fetch_array($hasil1)){
	            	switch ($buff1['skor']) {
	            		case 1:{
	            			$total1++;
	            			break;}
	            		
	            		case 2:{
	            			$total2++;
	            			break;}

	            		case 3:{
	            			$total3++;
	            			break;}

	            		case 4:{
	            			$total4++;
	            			break;}

	            		case 5:{
	            			$total5++;
	            			break;}

	            		default:
	            			break;
	            	}
	            	$total = ($total1*1 + $total2*2 + $total3*3 + $total4*4 + $total5*5)/
	            			 ($total1 + $total2 + $total3 + $total4 + $total5);
	            }
        	?>
        	<td>Umum</td>
        	<td align="center"><?php echo $total1; ?></td>
        	<td align="center"><?php echo $total2; ?></td>
        	<td align="center"><?php echo $total3; ?></td>
        	<td align="center"><?php echo $total4; ?></td>
        	<td align="center"><?php echo $total5; ?></td>
        	<td align="center"><?php echo $total; ?></td>
        </tr>
        <tr>
        	<?php
        	$select1 = "SELECT * FROM nilai INNER JOIN akun ON nilai.id=akun.id INNER JOIN pertanyaan ON nilai.id_pertanyaan=pertanyaan.id_pertanyaan WHERE akun.tipe='dosen' AND pertanyaan.tipe_pertanyaan='keuangan'";
            $hasil1 = mysqli_query($conn, $select1);
        	$total1=0; $total2=0; $total3=0; $total4=0; $total5=0;
	            while($buff1=mysqli_fetch_array($hasil1)){
	            	switch ($buff1['skor']) {
	            		case 1:{
	            			$total1++;
	            			break;}
	            		
	            		case 2:{
	            			$total2++;
	            			break;}

	            		case 3:{
	            			$total3++;
	            			break;}

	            		case 4:{
	            			$total4++;
	            			break;}

	            		case 5:{
	            			$total5++;
	            			break;}

	            		default:
	            			break;
	            	}
	            	$total = ($total1*1 + $total2*2 + $total3*3 + $total4*4 + $total5*5)/
	            			 ($total1 + $total2 + $total3 + $total4 + $total5);
	            }
        	?>
        	<td>Keuangan</td>
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
	$akademik = 0; $umum = 0; $keuangan = 0;
	$select1 = "SELECT * FROM nilai INNER JOIN akun ON nilai.id=akun.id INNER JOIN pertanyaan ON nilai.id_pertanyaan=pertanyaan.id_pertanyaan WHERE pertanyaan.tipe_pertanyaan='akademik'";
    $hasil1 = mysqli_query($conn, $select1);
    $count=0;
    while ($buff1=mysqli_fetch_array($hasil1)) {
    	$count++;
    	$akademik+=$buff1['skor'];
    }
    $akademik=$akademik/$count;

    $select1 = "SELECT * FROM nilai INNER JOIN akun ON nilai.id=akun.id INNER JOIN pertanyaan ON nilai.id_pertanyaan=pertanyaan.id_pertanyaan WHERE pertanyaan.tipe_pertanyaan='umum'";
    $hasil1 = mysqli_query($conn, $select1);
    $count=0;
    while ($buff1=mysqli_fetch_array($hasil1)) {
    	$count++;
    	$umum+=$buff1['skor'];
    }
    $umum=$umum/$count;

    $select1 = "SELECT * FROM nilai INNER JOIN akun ON nilai.id=akun.id INNER JOIN pertanyaan ON nilai.id_pertanyaan=pertanyaan.id_pertanyaan WHERE pertanyaan.tipe_pertanyaan='keuangan'";
    $hasil1 = mysqli_query($conn, $select1);
    $count=0;
    while ($buff1=mysqli_fetch_array($hasil1)) {
    	$count++;
    	$keuangan+=$buff1['skor'];
    }
    $keuangan=$keuangan/$count;
	?>

	<h2>Grafik hasil kuesioner keseluruhan</h2>
	<div>
		<canvas id="myChart" width="600" height="300"></canvas>
	</div>
	<script>
		var akademik = <?php echo $akademik; ?>;
		var umum = <?php echo $umum; ?>;
		var keuangan = <?php echo $keuangan; ?>;
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['Akademik', 'Umum', 'Keuangan'],
				datasets: [{
					label: 'Akademik',
					data: [
						akademik, umum, keuangan
					],
					backgroundColor:[
						'#ff8c69', '#87cefa', '#98FB98'
					],
					borderWidth: 1,
					borderColor:'#777',
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
</div>