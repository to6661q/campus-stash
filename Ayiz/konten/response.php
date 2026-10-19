<?php
$id_dosen = $_GET['id_dosen'];
include "../koneksi/koneksi.php";
$select = "SELECT * FROM bank_soal";
$hasil = mysqli_query($conn, $select);
?>
<div>
    <form action="saveResponse.php" method="post">
        <p>Mohon berikan tanggapan anda dengan kriteria sebagai berikut :<br>1 = Sangat Buruk<br>2 = Buruk<br>3 = Cukup<br>4 = Baik<br>5 = Sangat Baik</p><br>
        <table class="paleBlueRows" width="100%" border="2">
            <thead>
                <tr align="center">
                    <td width="1%">No</td>
                    <td width="60%">Pertanyaan</td>
                    <td width="39%">Tanggapan</td>
                </tr>
            </thead>
            <?php
            $count = 0;
            $select = "SELECT * FROM bank_soal";
            while ($buff = mysqli_fetch_array($hasil)) {
                $count++;
                ?>
                <tr>
                    <input type="hidden" name=<?php echo "id_soal" . $count; ?> value=<?php echo $buff['id_soal']; ?> />
                    <td align="center"><?php echo $count; ?></td>
                    <td><?php echo $buff['pertanyaan']; ?></td>
                    <?php
                        $select1 = "SELECT * FROM response WHERE id_dosen = '" . $_GET['id_dosen'] . "' AND id_soal = '" . $buff['id_soal'] . "'  AND id_mhs = '" . $_SESSION['id_mhs'] . "'";
                        $hasil1 = mysqli_query($conn,  $select1);
                        $rowcount1 = mysqli_num_rows($hasil1);
                        ?>
                    <td align="center">
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
                                $buff1 = mysqli_fetch_array($hasil1);
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