<?php
include "../koneksi/koneksi.php";
$select = "SELECT * FROM dosen INNER JOIN akun ON dosen.id=akun.id";
$hasil = mysqli_query($conn, $select);
?>
<div class="view">
    <table width="100%" border="3">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Dosen</th>
                <th>Hasil</th>
            </tr>
            <?php
            $count = "0";
            while ($buff = mysqli_fetch_array($hasil)) {
                $count++;
                ?>
                <tr align="center">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $buff['namadep']; ?> <?php echo $buff['namabel']; ?></td>
                    <td><a href="?page=ViewResultDsn&id_dosen= <?php echo $buff['id_dosen'] ?>">Lihat</a></td>
                <?php }; ?>
                </tr>
    </table>
</div>
<?php
mysqli_close($conn);
?>