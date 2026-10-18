<?php
    include "../koneksi/koneksi.php";
    $select = "SELECT * FROM akun";
    $hasil = mysqli_query($conn, $select);
    $rowcount = mysqli_num_rows($hasil);
    if ($rowcount==0){
        ?> <p>Data kosong.</p> <?php
    } else {
    ?>
    <div class="view">
        <h2>Cari Akun</h2>
        <form action="?page=cari#pos" method="get">
            <input type="hidden" name='page' value="cari">
            <input type="text" name="nama" placeholder="Masukkan nama" />
            <input type="submit" value="cari" />
        </form> <br>
        <h2>Data seluruh akun</h2>
        <table width="100%" border="3">
            <tr style="text-align: center;">
                <td width="1%">No</td>
                <td width="21%">Nama Depan</td>
                <td width="21%">Nama Belakang</td>
                <td width="21%">MK</td>
				<td width="1%">Semester</td>
                <td width="19%">Username</td>
                <td width="19%">Password</td>
                <td width="19%">Level</td>
                <td colspan="2">aksi</td>
            </tr>

        <?php
            $count=0;
            while($buff=mysqli_fetch_array($hasil)){
                $count++;
        ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $buff['namadep']; ?></td>
                <td><?php echo $buff['namabel']; ?></td>
                <td><?php echo $buff['mk']; ?></td>
				<td align="center"><?php echo $buff['semester']; ?></td>
                <td><?php echo $buff['username']; ?></td>
                <td><?php echo $buff['password']; ?></td>
                <td><?php echo $buff['level']; ?></td>
                <td width="55"><a href="?page=edit&id=<?php echo $buff['id']; ?>">Edit</a></td>
                <td><a href="hapus.php?id=<?php echo $buff['id']; ?>&level=<?php echo $buff['level'];?>">Hapus</a></td>
            </tr>
            <?php }; ?>
        </table> <br> <br>
        <?php
            $select = "SELECT * FROM akun WHERE level='admin'";
            $hasil = mysqli_query($conn, $select);
            $rowcount = mysqli_num_rows($hasil);
            if ($rowcount!=0){
                ?>
                    <h2>Data akun admin</h2>
                    <table width="100%" border="3">
                        <tr style="text-align: center;">
                            <td width="1%">No</td>
                            <td width="21%">Nama Depan</td>
                            <td width="21%">Nama Belakang</td>
                            <td width="21%">MK</td>
							<td width="1%">Semester</td>
                            <td width="19%">Username</td>
                            <td width="19%">Password</td>
                            <td width="19%">Level</td>
                            <td colspan="2">aksi</td>
                        </tr>

                    <?php
                        $count=0;
                        while($buff=mysqli_fetch_array($hasil)){
                            $count++;
                    ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $buff['namadep']; ?></td>
                            <td><?php echo $buff['namabel']; ?></td>
                            <td><?php echo $buff['mk']; ?></td>
							<td align="center"><?php echo $buff['semester']; ?></td>
                            <td><?php echo $buff['username']; ?></td>
                            <td><?php echo $buff['password']; ?></td>
                            <td><?php echo $buff['level']; ?></td>
                            <td width="55"><a href="?page=edit&id=<?php echo $buff['id']; ?>">Edit</a></td>
                            <td><a href="hapus.php?id=<?php echo $buff['id']; ?>&level=<?php echo $buff['level'];?>">Hapus</a></td>
                        </tr>
                        <?php }; ?>
                    </table> <br> <br>
                <?php
            }
            $select = "SELECT * FROM akun WHERE level='dosen'";
            $hasil = mysqli_query($conn, $select);
            $rowcount = mysqli_num_rows($hasil);
            if ($rowcount!=0){
                ?>
                    <h2>Data akun dosen</h2>
                    <table width="100%" border="3">
                        <tr style="text-align: center;">
                            <td width="1%">No</td>
                            <td width="21%">Nama Depan</td>
                            <td width="21%">Nama Belakang</td>
                            <td width="21%">MK</td>
							<td width="1%">Semester</td>
                            <td width="19%">Username</td>
                            <td width="19%">Password</td>
                            <td width="19%">Level</td>
                            <td colspan="2">aksi</td>
                        </tr>

                    <?php
                        $count=0;
                        while($buff=mysqli_fetch_array($hasil)){
                            $count++;
                    ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $buff['namadep']; ?></td>
                            <td><?php echo $buff['namabel']; ?></td>
                            <td><?php echo $buff['mk']; ?></td>
							<td align="center"><?php echo $buff['semester']; ?></td>
                            <td><?php echo $buff['username']; ?></td>
                            <td><?php echo $buff['password']; ?></td>
                            <td><?php echo $buff['level']; ?></td>
                            <td width="55"><a href="?page=edit&id=<?php echo $buff['id']; ?>">Edit</a></td>
                            <td><a href="hapus.php?id=<?php echo $buff['id']; ?>&level=<?php echo $buff['level'];?>">Hapus</a></td>
                        </tr>
                        <?php }; ?>
                    </table> <br> <br>
                <?php
            }
            $select = "SELECT * FROM akun WHERE level='mahasiswa'";
            $hasil = mysqli_query($conn, $select);
            $rowcount = mysqli_num_rows($hasil);
            if ($rowcount!=0){
                ?>
                    <h2>Data akun mahasiswa</h2>
                    <table width="100%" border="3">
                        <tr style="text-align: center;">
                            <td width="1%">No</td>
                            <td width="21%">Nama Depan</td>
                            <td width="21%">Nama Belakang</td>
                            <td width="21%">MK</td>
							<td width="1%">Semester</td>
                            <td width="19%">Username</td>
                            <td width="19%">Password</td>
                            <td width="19%">Level</td>
                            <td colspan="2">aksi</td>
                        </tr>

                    <?php
                        $count=0;
                        while($buff=mysqli_fetch_array($hasil)){
                            $count++;
                    ?>
                        <tr>
                        <td><?php echo $count; ?></td>
                            <td><?php echo $buff['namadep']; ?></td>
                            <td><?php echo $buff['namabel']; ?></td>
                            <td><?php echo $buff['mk']; ?></td>
							<td align="center"><?php echo $buff['semester']; ?></td>
                            <td><?php echo $buff['username']; ?></td>
                            <td><?php echo $buff['password']; ?></td>
                            <td><?php echo $buff['level']; ?></td>
                            <td width="55"><a href="?page=edit&id=<?php echo $buff['id']; ?>">Edit</a></td>
                            <td><a href="hapus.php?id=<?php echo $buff['id']; ?>&level=<?php echo $buff['level'];?>">Hapus</a></td>
                        </tr>
                        <?php }; ?>
                    </table>
                </div>
            <?php
        }
    }
    mysqli_close($conn);
?>