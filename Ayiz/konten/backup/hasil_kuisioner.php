<?php
    include "../koneksi/koneksi.php";

    $select = "SELECT * FROM bank_soal";
    $hasil = mysqli_query($conn, $select);
    $rowcount = mysqli_num_rows($hasil);

    if($rowcount==0) {
        ?><p>Belum ada hasil ! :)</p><?php
    }else {
        ?>
        <div class="view">
			<h2>Hasil Kuisioner</h2>
            <table width="100%" border="2">
                <tr align="center">
                    <td rowspan="2">No</td>
                    <td rowspan="2">Pertanyaan</td>
                    <td colspan="5">Tanggapan</td>
                </tr>
                <tr align="center">
                    <td width="20">1</td>
                    <td width="20">2</td>
                    <td width="20">3</td>
                    <td width="20">4</td>
                    <td width="20">5</td>
                </tr>
                <?php
				$count = 0;
                while($buff = mysqli_fetch_array($hasil)) {
					$count++;
                    ?>
                    <tr align="center">
                        <td><?php echo $count;?></td>
                        <td><?php echo $buff['pertanyaan'];?></td>
                            <?php
                                $select1 = "SELECT * FROM bank_jawaban WHERE id_soal = '$buff[id_soal]' AND id_mhs = '$_GET[id_mhs]' AND id_dosen = '$_GET[id_dosen]' ";
                                $hasil1 = mysqli_query($conn, $select1);
                                $total=0; $total1=0; $total2=0; $total3=0; $total4=0; $total5=0;
                                while($buff1 = mysqli_fetch_array($hasil1)) {
                                    switch($buff1['nilai']) {
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
                                        default : {
                                            break;
                                        }
                                    }
                                    $total = ($total1*1 + $total2*2 + $total3*3 + $total4 *4+ $total5*5)/
                                                    ($total1 + $total2 + $total3 + $total4 + $total5);
                                } ?>
                                <td align="center"> <?php echo $total1?> </td>
                                <td align="center"> <?php echo $total2?> </td>
                                <td align="center"> <?php echo $total3?> </td>
                                <td align="center"> <?php echo $total4?> </td>
                                <td align="center"> <?php echo $total5?> </td>
                    </tr>
                    <?php
                } 
                ?>
                 <tr align="center">
                        <td colspan="2">Total</td>
                        <td colspan="5"><?php echo $total?></td>
                    </tr>
            </table>
        </div>
        <form action="cetak.php" method="post">
            <input type="submit">
        </form>
    <?php };
    mysqli_close($conn);
?>