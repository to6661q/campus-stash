<?php
    include "../koneksi/koneksi.php";
    $select = "SELECT * FROM akun JOIN dosen ON akun.id = dosen.id  JOIN matkul ON dosen.id_mk=matkul.id_mk";
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
                    <td width="1%">No</td>
                    <td width="40%">Nama Dosen</td>
                    <td width="40%">Mata Kuliah</td>
                    <td width="19%">Lihat Hasil</td>
                </tr>
                <?php
				$count = 0;
                while($buff = mysqli_fetch_array($hasil)) {
					$count++;
                    ?>
                    <tr align="center">
                        <td><?php echo $count;?></td>
                        <td><?php echo $buff['namadep'];?> <?php echo $buff['namabel']?></td>
                        <td><?php echo $buff['mk'];?></td>
                        <td><a href="?page=penilaian_mhs&id_dosen1=<?php echo $buff['id_dosen'];?>&mk=<?php echo $buff['mk']?>">Lihat Hasil</a></td>
                    </tr>
                    <?php
                } 
                ?>
            </table>
        </div>
    <?php };
    mysqli_close($conn);
?>