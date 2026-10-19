<?php
include "../koneksi/koneksi.php";
$select = "SELECT * FROM bank_soal";
$hasil = mysqli_query($conn, $select);
$rowcount = mysqli_num_rows($hasil);
if ($rowcount == 0) {
    ?><p>Pertanyaan Belum Dibuat</p><?php
                                    } else {
                                        ?>
    <div class="view">
        <h2>Daftar Pertanyaan</h2>
        <table class="paleBlueRows" width="100%" border="3">
            <thead>
                <tr style="text-align: center;">
                    <td width="1%">No</td>
                    <td width="90%">Pertanyaan</td>
                    <td colspan="2">Tanggapan</td>
                </tr>
            </thead>
            <?php
                $count = 0;
                $select = "SELECT * FROM bank_soal";
                while ($buff = mysqli_fetch_array($hasil)) {
                    $count++;
                    ?>

                <tr>
                    <td align="center"><?php echo $count; ?></td>
                    <td align="left"><?php echo $buff['pertanyaan']; ?></td>
                    <td width="40" align="center"><a href="?page=editQuestForm&id_soal=<?php echo $buff['id_soal']; ?>">Edit</a></td>
                    <td align="center"><a href="hapusQuest.php?id_soal=<?php echo $buff['id_soal']; ?>">Hapus</a></td>
                </tr>

            <?php
                }; ?>
        </table>
    </div><?php
            }
            mysqli_close($conn);
            ?>