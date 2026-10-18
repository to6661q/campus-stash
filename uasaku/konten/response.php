<?php
include "../koneksi/koneksi.php";
$select = "SELECT * FROM bank_soal";
$hasil = mysqli_query($conn, $select);
?>
<div style="view">
    <form action="simpan.php" method="post">
        <p>Mohon berikan tanggapan anda dengan kriteria sebagai berikut :<br>1 = Sangat Buruk<br>2 = Buruk<br>3 = Cukup<br>4 = Baik<br>5 = Sangat Baik</p><br>
        <table width="100%" border="2">
            <tr>
                <td>No</td>
                <td>Pertanyaan</td>
                <td>Tanggapan</td>
            </tr>
            <?php
            $count = 0;
            while ($buff = mysqli_fetch_array($hasil)) {
                $count++;
                ?>
                <tr>
                    <input type="hidden" name=<?php echo "id_soal" . $count; ?> value=<?php echo $buff['id_soal']; ?> />
                    <td><?php echo $count; ?></td>
                    <td><?php echo $buff['pertanyaan']; ?></td>
                    <?php
                        $select1 = "SELECT * FROM bank_jawaban WHERE id_dosen ='" . $_GET['id_dosen'] . "' 
						AND mk = '" . $_GET['mk'] . "' 
						AND id_mhs = '" . $_GET['id_mhs'] . "' 
						AND id_soal = '" . $_GET['id_soal'] . "'";
                        $hasil1 = mysqli_query($conn, $select1);
                        $rowcount1 = mysqli_num_rows($hasil1);
                        ?>
                    <td>
                        <?php
                            if ($rowcount1 == 0) {
                                ?>
                            <input type="radio" name="nilai<?php echo $count; ?>" value="1" /> 1
                            <input type="radio" name="nilai<?php echo $count; ?>" value="2" /> 2
                            <input type="radio" name="nilai<?php echo $count; ?>" value="3" /> 3
                            <input type="radio" name="nilai<?php echo $count; ?>" value="4" /> 4
                            <input type="radio" name="nilai<?php echo $count; ?>" value="5" /> 5
                        <?php
                            } else {
                                ?>
                            <input type="radio" name="nilai<?php echo $count; ?>" value="1" <?php echo ($buff1['nilai'] == '1') ? 'checked' : '' ?> /> 1
                            <input type="radio" name="nilai<?php echo $count; ?>" value="2" <?php echo ($buff1['nilai'] == '2') ? 'checked' : '' ?> /> 2
                            <input type="radio" name="nilai<?php echo $count; ?>" value="3" <?php echo ($buff1['nilai'] == '3') ? 'checked' : '' ?> /> 3
                            <input type="radio" name="nilai<?php echo $count; ?>" value="4" <?php echo ($buff1['nilai'] == '4') ? 'checked' : '' ?> /> 4
                            <input type="radio" name="nilai<?php echo $count; ?>" value="5" <?php echo ($buff1['nilai'] == '5') ? 'checked' : '' ?> /> 5
                        <?php
                            }
                            ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>

        <input type="hidden" name="count" value=<?php echo $count; ?> />
        <input type="hidden" name="id_mhs" value=<?php echo $_SESSION['id_mhs']; ?> />
        <input type="hidden" name="id_dosen" value=<?php echo $_GET['id_dosen']; ?> />
        <input type="hidden" name="mk" value=<?php echo $_GET['mk']; ?> />
        <input type="submit" value="Simpan" />
    </form>
</div>
<?php
mysqli_close($conn);
?>