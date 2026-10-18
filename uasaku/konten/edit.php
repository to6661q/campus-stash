<?php
$id = $_GET['id'];
include "../koneksi/koneksi.php";
$select = "SELECT * FROM akun WHERE id='$id'";
$hasil = mysqli_query($conn, $select);
while($buff=mysqli_fetch_array($hasil)) {
    ?>
    <div class="edit">
        <h2>Edit Data</h2>
        <form action="editData.php" method="post">
            <table width="100%" style="border: 0;">
                <input type="hidden" name="id" value="<?php echo $buff['id'];?>/">
                <tr style="border: 0;">
                    <td style="border: 0;">Nama Depan</td>
                    <td style="border: 0;"><input type="text" name="namadep" value="<?php echo $buff['namadep'];?>"></td>
                </tr>
                <tr style="border: 0;">
                    <td style="border: 0;">Nama Belakang</td>
                    <td style="border: 0;"><input type="text" name="namabel" value="<?php echo $buff['namabel'];?>"></td>
                </tr>
                <tr style="border: 0;">
                    <td style="border: 0;">MK</td>
                    <td style="border: 0;"><input type="text" name="mk" value="<?php echo $buff['mk'];?>"/></td>
                </tr>
				<tr style="border: 0;">
                    <td style="border: 0;">Semester</td>
                    <td style="border: 0;"><input type="text" name="semester" value="<?php echo $buff['semester'];?>"/></td>
                </tr>
                <tr style="border: 0;">
                    <td style="border: 0;">Username</td>
                    <td style="border: 0;"><input type="text" name="username" value="<?php echo $buff['username'];?>"/></td>
                </tr>
                <tr style="border: 0;">
                    <td style="border: 0;">Password</td>
                    <td style="border: 0;"><input type="text" name="password" value="<?php echo $buff['password'];?>"/></td>
                </tr>
                <tr style="border: 0;">
                    <td style="border: 0;">Level Akun</td>
                    <td style="border: 0;">
                        <input type="radio" name="level" value="admin"<?php echo($buff['level']=='admin')?'checked':''?>/> Admin <br>
                        <input type="radio" name="level" value="dosen"<?php echo($buff['level']=='dosen')?'checked':''?>/> Dosen <br>
                        <input type="radio" name="level" value="mahasiswa"<?php echo($buff['level']=='mahasiswa')?'checked':''?>/> Mahasiswa <br>
                    </td>
                </tr>
                <tr style="border: 0;">
                    <td style="border: 0;" height="68" align="right">
                        <input type="reset" value="reset">
                    </td>
                    <td style="border: 0;">
                        <input type="submit" value="submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>
<?php
};
mysqli_close($conn);
?>