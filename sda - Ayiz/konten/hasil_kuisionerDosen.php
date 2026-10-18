<?php
    include "../koneksi/koneksi.php";

    $select = "SELECT * FROM bank_soal JOIN bank_jawaban ON bank_soal.id_soal = bank_jawaban.id_soal JOIN dosen ON bank_jawaban.id_dosen = dosen.id_dosen JOIN matkul ON dosen.id_mk = matkul.id_mk";
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
                $total=0; $total1=0; $total2=0; $total3=0; $total4=0; $total5=0;
                while($buff = mysqli_fetch_array($hasil)) {
					$count++;
                    ?>
                    <tr align="center">
                        <td><?php echo $count;?></td>
                        <td><?php echo $buff['pertanyaan'];?></td>
                            <?php
                                $select1 = "SELECT * FROM bank_jawaban WHERE id_soal = '$buff[id_soal]' AND id_mhs = '$_GET[id_mhs]' AND id_dosen = '$_GET[id_dosen]' ";
                                $hasil1 = mysqli_query($conn, $select1);
                                $nilai1=0; $nilai2=0; $nilai3=0; $nilai4=0; $nilai5=0;
                                while($buff1 = mysqli_fetch_array($hasil1)) {
                                    switch($buff1['nilai']) {
                                        case 1: {
                                            $total1++;
                                            $nilai1++;
                                            break;
                                        }
                                        case 2: {
                                            $total2++;
                                            $nilai2++;
                                            break;    
                                        }
                                        case 3: {
                                            $total3++;
                                            $nilai3++;
                                            break;
                                        }
                                        case 4: {
                                            $total4++;
                                            $nilai4++;
                                            break;
                                        }
                                        case 5: {
                                            $total5++;
                                            $nilai5++;
                                            break;
                                        }
                                        default : {
                                            break;
                                        }
                                    }
                                } ?>
                                <td align="center"> <?php echo $nilai1?> </td>
                                <td align="center"> <?php echo $nilai2?> </td>
                                <td align="center"> <?php echo $nilai3?> </td>
                                <td align="center"> <?php echo $nilai4?> </td>
                                <td align="center"> <?php echo $nilai5?> </td>
                               <?php
                                $total = ($total1*1 + $total2*2 + $total3*3 + $total4 *4+ $total5*5) / ($total1 + $total2 + $total3 + $total4 + $total5);
                                ?>
                    </tr>
                    <?php
                } 
                ?>
                 <tr align="center">
                        <td colspan="2">Rata-rata Nilai</td>
                        <td colspan="5"><?php echo $total?></td>
                    </tr>
            </table>
        </div>
    <?php };
    mysqli_close($conn);
?>