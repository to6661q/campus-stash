<?php
    include "../koneksi/koneksi.php";
    $select = "SELECT * FROM akun WHERE level='admin' ORDER BY namadep ASC ";
   
    $hasil = mysqli_query($conn, $select);
   
    $rowcount = mysqli_num_rows($hasil);
   
    if ($rowcount==0){
        ?> <p>Data kosong.</p> <?php
    } else {
    ?>
    <div class="view">
        <p>Cari Akun</p>
        <form action="?page=cari#pos" method="get">
            <input type="hidden" name='page' value="cari">
            <input type="text" name="namadep" placeholder="Masukkan nama" />
            <input type="submit" value="cari" />
        </form> <br>

        <h2>Master Data</h2>
        <table width="100%" border="3">
            <tr style="text-align: center;">
                <td width="1%">No</td>
                <td width="21%">Nama Depan</td>
                <td width="21%">Nama Belakang</td>
                <td width="19%">Username</td>
                <td width="19%">Password</td>
                <td width="19%">Level</td>
                <td colspan="2">aksi</td>
            </tr>
            <tr>
                <td colspan="9">ADMIN</td>
           </tr>
           
        <?php
            $count=0;
            while($buff=mysqli_fetch_array($hasil)){
                $count++;
        ?>
            <!-- Jika level akun yang diedit adalah admin -->
            <tr>
                <td style="text-align: center;"><?php echo $count; ?></td>
                <td><?php echo $buff['namadep']; ?></td>
                <td><?php echo $buff['namabel']; ?></td>
                <td><?php echo $buff['username']; ?></td>
                <td><?php echo $buff['password']; ?></td>
                <td><?php echo $buff['level']; ?></td>
                <td width="55"><a href="?page=edit&id=<?php echo $buff['id']; ?>&level=<?php echo $buff['level'];?>">Edit</a></td>
                <td><a href="hapus.php?id=<?php echo $buff['id']; ?>&level=<?php echo $buff['level'];?>">Hapus</a></td>
            </tr>
            <?php }; ?>
            <tr>
                <td colspan="9">DOSEN</td>
           </tr>        
        <?php
            // Jika level akun yang diedit adalah dosen
            $select = "SELECT * FROM akun WHERE level='dosen' ORDER BY namadep ASC ";
            $hasil = mysqli_query($conn, $select);
            $rowcount = mysqli_num_rows($hasil);
            if ($rowcount!=0){
                ?>
                    <?php
                        $count=0;
                        while($buff=mysqli_fetch_array($hasil)){
                            $count++;
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $count; ?></td>
                            <td><?php echo $buff['namadep']; ?></td>
                            <td><?php echo $buff['namabel']; ?></td>
                            <td><?php echo $buff['username']; ?></td>
                            <td><?php echo $buff['password']; ?></td>
                            <td><?php echo $buff['level']; ?></td>
                            <td width="55"><a href="?page=edit&id=<?php echo $buff['id']; ?>&level=<?php echo $buff['level'];?>">Edit</a></td>
                            <td><a href="hapus.php?id=<?php echo $buff['id']; ?>&level=<?php echo $buff['level'];?>">Hapus</a></td>
                        </tr>
                        <?php }; ?>
                        <tr>
                            <td colspan="9">MAHASISWA</td>
                        </tr>
                <?php
            }
            // Tampilkan data mahasiswa
            $select = "SELECT * FROM akun WHERE level='mahasiswa' ORDER BY namadep ASC ";
            $hasil = mysqli_query($conn, $select);
            $rowcount = mysqli_num_rows($hasil);
            if ($rowcount!=0){
                ?>
                    <?php
                        $count=0;
                        while($buff=mysqli_fetch_array($hasil)){
                            $count++;
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $count; ?></td>
                            <td><?php echo $buff['namadep']; ?></td>
                            <td><?php echo $buff['namabel']; ?></td>
                            <td><?php echo $buff['username']; ?></td>
                            <td><?php echo $buff['password']; ?></td>
                            <td><?php echo $buff['level']; ?></td>
                            <td width="55"><a href="?page=edit&id=<?php echo $buff['id']; ?>&level=<?php echo $buff['level'];?>">Edit</a></td>
                            <td><a href="hapus.php?id=<?php echo $buff['id']; ?>&level=<?php echo $buff['level'];?>">Hapus</a></td>
                        </tr>
                        <?php }; ?>
                    </table> <br> <br>
                <?php
            }
    }
    mysqli_close($conn);
?>