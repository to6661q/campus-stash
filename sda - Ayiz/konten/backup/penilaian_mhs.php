<?php
    include "../koneksi/koneksi.php";
    $select = "SELECT * FROM akun JOIN mahasiswa ON akun.id =mahasiswa.id";
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
                    <td width="50%">Nama Mahasiswa</td>
                    <td width="49%">Lihat Hasil</td>
                </tr>
                <?php
				$count = 0;
                while($buff = mysqli_fetch_array($hasil)) {
					$count++;
                    ?>
                    <tr align="center">
                        <td><?php echo $count;?></td>
                        <td><?php echo $buff['namadep'];?> <?php echo $buff['namabel']?></td>
                        <td><a href="?page=hasil_kuisioner&id_mhs=<?php echo $buff['id_mhs'];?>&id_dosen=<?php echo $_GET['id_dosen1'];?>&mk=<?php echo $_GET['mk']; ?>">Lihat Hasil</a></td>
                    </tr>
                    <?php
                } 
                ?>
            </table>
        </div>
    <?php };
    mysqli_close($conn);
?>