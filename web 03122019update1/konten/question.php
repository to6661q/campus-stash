<?php
	include "../koneksi/koneksi.php";
    $select = "SELECT * FROM pertanyaan";
    $hasil = mysqli_query($conn, $select);
    $rowcount = mysqli_num_rows($hasil);
    if ($rowcount==0){
        ?> <p>Pertanyaan kosong.</p>
        <form action="?module=tambahpertanyaan" method="get">
        	<input type="hidden" name='module' value="tambahpertanyaan"/>
        	<button type="submit">Tambah</button>
        </form><?php
    } else {
    	?>
    	<div class="view">
        <h2>List pertanyaan</h2>
        <table width="750">
            <tr>
                <td width="20">No</td>
                <td width="580">Kuisioner</td>
                <td colspan="2">Aksi</td>
            </tr>

        <?php
            $count=0;
            $select = "SELECT * FROM pertanyaan WHERE tipe_pertanyaan='akademik'";
            $hasil = mysqli_query($conn, $select);
            $rowcount = mysqli_num_rows($hasil);
            if ($rowcount!=0){
            	?>
            	<tr>
            		<td colspan="4" style="background: #EAEAEA">Akademik</td>
            	</tr>
            	<?php
            	while($buff=mysqli_fetch_array($hasil)){
                	$count++;
            
        		?>
            	<tr>
                	<td><?php echo $count; ?></td>
                	<td><?php echo $buff['judul_pertanyaan']; ?></td>
                	<td width="55"><a href="?module=editpertanyaan&id_pertanyaan=<?php echo $buff['id_pertanyaan']; ?>">Edit</a></td>
                	<td><a href="hapuspertanyaan.php?id_pertanyaan=<?php echo $buff['id_pertanyaan']; ?>">Hapus</a></td>
            	</tr>
            	<?php };
        	}
        	$select = "SELECT * FROM pertanyaan WHERE tipe_pertanyaan='umum'";
            $hasil = mysqli_query($conn, $select);
            $rowcount = mysqli_num_rows($hasil);
            if ($rowcount!=0){
            	?>
            	<tr>
            		<td colspan="4" style="background: #EAEAEA">Umum</td>
            	</tr>
            	<?php
            	while($buff=mysqli_fetch_array($hasil)){
                	$count++;
            
        		?>
            	<tr>
                	<td><?php echo $count; ?></td>
                	<td><?php echo $buff['judul_pertanyaan']; ?></td>
                	<td><a href="?module=editpertanyaan&id_pertanyaan=<?php echo $buff['id_pertanyaan']; ?>">Edit</a></td>
                	<td><a href="hapuspertanyaan.php?id_pertanyaan=<?php echo $buff['id_pertanyaan']; ?>">Hapus</a></td>
            	</tr>
            	<?php };
        	}
        	$select = "SELECT * FROM pertanyaan WHERE tipe_pertanyaan='keuangan'";
            $hasil = mysqli_query($conn, $select);
            $rowcount = mysqli_num_rows($hasil);
            if ($rowcount!=0){
            	?>
            	<tr>
            		<td colspan="4" style="background: #EAEAEA">Keuangan</td>
            	</tr>
            	<?php
            	while($buff=mysqli_fetch_array($hasil)){
                	$count++;
            
        		?>
            	<tr>
                	<td><?php echo $count; ?></td>
                	<td><?php echo $buff['judul_pertanyaan']; ?></td>
                	<td><a href="?module=editpertanyaan&id_pertanyaan=<?php echo $buff['id_pertanyaan']; ?>">Edit</a></td>
                	<td><a href="hapuspertanyaan.php?id_pertanyaan=<?php echo $buff['id_pertanyaan']; ?>">Hapus</a></td>
            	</tr>
            	<?php };
        	}
        	?>
        </table> <br>
        <form action="?module=tambahpertanyaan" method="get">
        	<input type="hidden" name='module' value="tambahpertanyaan"/>
        	<button type="submit">Tambah</button>
        </form> <br> <br>
    	<?php
    }
    include 'hasil.php';
?>