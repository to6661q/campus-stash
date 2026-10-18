<?php
include "../koneksi/koneksi.php";

$select = "SELECT * FROM dosen JOIN akun ON dosen.id = akun.id JOIN matkul ON dosen.id_mk = matkul.id_mk WHERE matkul.semester = '$_SESSION[semester]' ";
$hasil = mysqli_query($conn, $select);
$rowcount = mysqli_num_rows($hasil);

if ($rowcount == 0) {
    ?><p>Tidak ada yang harus anda tanggapi :)</p><?php
                                                    } else {
                                                        ?>
    <div class="view">
        <table width="100%" border="2">
            <tr align="center">
                <td width="1%">No</td>
                <td width="40%">Nama Dosen</td>
                <td width="40%">Mata Kuliah</td>
                <td width="20%">Tanggapi Sekarang</td>
            </tr>
            <?php
                $count = 0;
                while ($buff = mysqli_fetch_array($hasil)) {
                    $count++;
                    ?>
                <tr align="center">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $buff['namadep']; ?></td>
                    <td><?php echo $buff['mk']; ?></td>
                    <td><a href="?page=response&id_dosen=<?php echo $buff['id_dosen']; ?>&mk=<?php echo $buff['mk'] ?>">Tanggapi</a></td>
                </tr>
            <?php
                }
                ?>
        </table>
    </div>
<?php };
mysqli_close($conn);
?>