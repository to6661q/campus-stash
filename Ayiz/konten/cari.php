<?php
include "../koneksi/koneksi.php";
$namadep = $_GET['namadep'];
$select = "SELECT * FROM akun WHERE namadep LIKE '%$namadep'";
$hasil = mysqli_query($conn, $select);
$rowcount = mysqli_num_rows($hasil);
if ($rowcount == 0) {
    ?> <p>Data tidak ditemukan !</p>
<?php
} else {
    ?>
    <div class="view">
        <h2>Hasil pencarian</h2>
        <table width="100%" border="3">
            <tr>
                <td width="1%">No</td>
                <td width="21%">Nama Depan</td>
                <td width="21%">Nama Belakang</td>
                <td width="19%">Username</td>
                <td width="19%">Password</td>
                <td width="19%">Level</td>
                <td colspan="2">aksi</td>
            </tr>

            <?php
                $count = 0;
                while ($buff = mysqli_fetch_array($hasil)) {
                    $count++;
                    ?>
                <tr>
                    <td style="text-align: center;"><?php echo $count; ?></td>
                    <td><?php echo $buff['namadep']; ?></td>
                    <td><?php echo $buff['namabel']; ?></td>
                    <td><?php echo $buff['username']; ?></td>
                    <td><?php echo $buff['password']; ?></td>
                    <td><?php echo $buff['level']; ?></td>
                    <td width="55"><a href="?page=edit&id=<?php echo $buff['id']; ?>">Edit</a></td>
                    <td><a href="hapus.php?id=<?php echo $buff['id']; ?>&level=<?php echo $buff['level']; ?>">Hapus</a></td>
                </tr>
        <?php };
        } ?>
        </table>
    </div>