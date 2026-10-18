<?php
    include "../koneksi/koneksi.php";
    $select = "SELECT * FROM bank_soal";
    $hasil = mysqli_query($conn, $select);
    $rowcount = mysqli_num_rows($hasil);
    if($rowcount==0) {
        ?><p>Pertanyaan Belum Dibuat</p><?php
    }else {
        ?>
        <div class="view">
            <h2>Daftar Pertanyaan</h2>
            <table width="100%" border="3">
                <tr style="text-align: center;">
                    <td width="1%">No</td>
                    <td width="90%">Pertanyaan</td>
					<td width="10%">Jenis Pertanyaan</td>
                    <td colspan="2">Tanggapan</td>
                </tr>
            <?php
                $count = 0;
                $select = "SELECT * FROM bank_soal";
                while($buff=mysqli_fetch_array($hasil)) {
                    $count++;
                ?>
                <tr>
                    <td align="center"><?php echo $count; ?></td>
                    <td><?php echo $buff['pertanyaan']; ?></td>
					<td><?php echo $buff['jenis_soal']; ?></td>
                    <td width="40" align="center"><a href="?page=editQuest&id_soal=<?php echo $buff['id_soal']; ?>">Edit</a></td>
                    <td align="center"><a href="hapusQuest.php?id_soal=<?php echo $buff['id_soal']; ?>">Hapus</a></td>
                </tr>
                <?php
                }; ?>
            </table>
        </div><?php
    }
    mysqli_close($conn);
?>