<p align="center">Keterangan :	1=Sangat, Kurang, 2=Kurang, 3=Cukup, 4=Baik, 5=Sangat Baik</p><br>
<?php
include "../koneksi/koneksi.php";

$select = "SELECT * FROM pertanyaan";
$hasil = mysqli_query($conn, $select);
$rowcount = mysqli_num_rows($hasil);

if ($rowcount==0) {
	?><p>Pertanyaan kosong.</p><?php
} else {
	?>
	<div class="view">
		<form action=submit.php method="post">
			<table width="750">
	            <tr align="center">
	                <td width="20">no</td>
	                <td width="520">pertanyaan</td>
	                <td>nilai</td>
	            </tr>
	            <?php
	            $count=0;
	            $select = "SELECT * FROM pertanyaan WHERE tipe_pertanyaan='akademik'";
	            $hasil = mysqli_query($conn, $select);
	            $rowcount = mysqli_num_rows($hasil);
	            if ($rowcount!=0){
	            	?>
	            	<tr>
	            		<td colspan="3" style="background: #EAEAEA">Akademik</td>
	            	</tr>
	            	<?php
	            	while($buff=mysqli_fetch_array($hasil)){
	                	$count++;
	            
	        		?>
	            	<tr>
	            		<input type="hidden" name=<?php echo "id_pertanyaan".$count; ?> value=<?php echo $buff['id_pertanyaan']; ?>/>
	                	<td><?php echo $count; ?></td>
	                	<td><?php echo $buff['judul_pertanyaan']; ?></td>
	                	<td>
	                		<?php
	                		$select1 = "SELECT * FROM nilai WHERE id='".$_SESSION['id']."' AND id_pertanyaan='".$buff['id_pertanyaan']."'";
	            			$hasil1 = mysqli_query($conn, $select1);
	            			$rowcount1 = mysqli_num_rows($hasil1);
	                		if ($rowcount1==0) {
	                			?>
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="1"/> 1
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="2"/> 2
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="3"/> 3
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="4"/> 4
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="5"/> 5
	                			<?php
	                		} else {
	                			$buff1=mysqli_fetch_array($hasil1)
	                			?>
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="1" <?php echo ($buff1['skor']=='1')?'checked':'' ?>/> 1
	                        	<input type="radio" name=<?php echo "skor".$count; ?> value="2" <?php echo ($buff1['skor']=='2')?'checked':'' ?>/> 2
	                        	<input type="radio" name=<?php echo "skor".$count; ?> value="3" <?php echo ($buff1['skor']=='3')?'checked':'' ?>/> 3
	                        	<input type="radio" name=<?php echo "skor".$count; ?> value="4" <?php echo ($buff1['skor']=='4')?'checked':'' ?>/> 4
	                        	<input type="radio" name=<?php echo "skor".$count; ?> value="5" <?php echo ($buff1['skor']=='5')?'checked':'' ?>/> 5
	                			<?php
	                		}
	                		?>
	                	</td>
	            	</tr>
	            	<?php
	            	};
	            }
	            $select = "SELECT * FROM pertanyaan WHERE tipe_pertanyaan='umum'";
	            $hasil = mysqli_query($conn, $select);
	            $rowcount = mysqli_num_rows($hasil);
	            if ($rowcount!=0){
	            	?>
	            	<tr>
	            		<td colspan="3" style="background: #EAEAEA">Umum</td>
	            	</tr>
	            	<?php
	            	while($buff=mysqli_fetch_array($hasil)){
	                	$count++;
	            
	        		?>
	            	<tr>
	            		<input type="hidden" name=<?php echo "id_pertanyaan".$count; ?> value=<?php echo $buff['id_pertanyaan']; ?>/>
	                	<td><?php echo $count; ?></td>
	                	<td><?php echo $buff['judul_pertanyaan']; ?></td>
	                	<td>
	                		<?php
	                		$select1 = "SELECT * FROM nilai WHERE id='".$_SESSION['id']."' AND id_pertanyaan='".$buff['id_pertanyaan']."'";
	            			$hasil1 = mysqli_query($conn, $select1);
	            			$rowcount1 = mysqli_num_rows($hasil1);
	                		if ($rowcount1==0) {
	                			?>
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="1"/> 1
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="2"/> 2
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="3"/> 3
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="4"/> 4
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="5"/> 5
	                			<?php
	                		} else {
	                			$buff1=mysqli_fetch_array($hasil1)
	                			?>
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="1" <?php echo ($buff1['skor']=='1')?'checked':'' ?>/> 1
	                        	<input type="radio" name=<?php echo "skor".$count; ?> value="2" <?php echo ($buff1['skor']=='2')?'checked':'' ?>/> 2
	                        	<input type="radio" name=<?php echo "skor".$count; ?> value="3" <?php echo ($buff1['skor']=='3')?'checked':'' ?>/> 3
	                        	<input type="radio" name=<?php echo "skor".$count; ?> value="4" <?php echo ($buff1['skor']=='4')?'checked':'' ?>/> 4
	                        	<input type="radio" name=<?php echo "skor".$count; ?> value="5" <?php echo ($buff1['skor']=='5')?'checked':'' ?>/> 5
	                			<?php
	                		}
	                		?>
	                	</td>
	            	</tr>
	            	<?php
	            	};
	            }
	            $select = "SELECT * FROM pertanyaan WHERE tipe_pertanyaan='keuangan'";
	            $hasil = mysqli_query($conn, $select);
	            $rowcount = mysqli_num_rows($hasil);
	            if ($rowcount!=0){
	            	?>
	            	<tr>
	            		<td colspan="3" style="background: #EAEAEA">Keuangan</td>
	            	</tr>
	            	<?php
	            	while($buff=mysqli_fetch_array($hasil)){
	                	$count++;
	            
	        		?>
	            	<tr>
	            		<input type="hidden" name=<?php echo "id_pertanyaan".$count; ?> value=<?php echo $buff['id_pertanyaan']; ?>/>
	                	<td><?php echo $count; ?></td>
	                	<td><?php echo $buff['judul_pertanyaan']; ?></td>
	                	<td>
	                		<?php
	                		$select1 = "SELECT * FROM nilai WHERE id='".$_SESSION['id']."' AND id_pertanyaan='".$buff['id_pertanyaan']."'";
	            			$hasil1 = mysqli_query($conn, $select1);
	            			$rowcount1 = mysqli_num_rows($hasil1);
	                		if ($rowcount1==0) {
	                			?>
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="1"/> 1
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="2"/> 2
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="3"/> 3
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="4"/> 4
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="5"/> 5
	                			<?php
	                		} else {
	                			$buff1=mysqli_fetch_array($hasil1)
	                			?>
	                			<input type="radio" name=<?php echo "skor".$count; ?> value="1" <?php echo ($buff1['skor']=='1')?'checked':'' ?>/> 1
	                        	<input type="radio" name=<?php echo "skor".$count; ?> value="2" <?php echo ($buff1['skor']=='2')?'checked':'' ?>/> 2
	                        	<input type="radio" name=<?php echo "skor".$count; ?> value="3" <?php echo ($buff1['skor']=='3')?'checked':'' ?>/> 3
	                        	<input type="radio" name=<?php echo "skor".$count; ?> value="4" <?php echo ($buff1['skor']=='4')?'checked':'' ?>/> 4
	                        	<input type="radio" name=<?php echo "skor".$count; ?> value="5" <?php echo ($buff1['skor']=='5')?'checked':'' ?>/> 5
	                			<?php
	                		}
	                		?>
	                	</td>
	            	</tr>
	            	<?php
	            	};
	            } ?>
	        </table> <br>
	        <input type="hidden" name="count" value=<?php echo $count; ?>/>
	        <input type="submit" value="save" />
    	</form>
	</div>
	<?php
}
?>