<?php
$id = $_GET['id'];
$level = $_GET['level'];
include "../koneksi/koneksi.php";
$select = "SELECT * FROM akun WHERE id='$id' AND level='$level'";
$hasil = mysqli_query($conn, $select);
while($buff=mysqli_fetch_array($hasil)) {
    ?>
    <div class="edit">
        <h2>Edit Data</h2>
        <?php
        //Jika level akun yang diedit adalah mahasiswa
        if ($level=='dosen') {
            ?>
            <form action="editData.php" method="post">
                <table width="100%" style="border: 0;">
                    <input type="hidden" name='id' value="<?php echo $buff['id'];?>"/>
                    <tr style="border: 0;">
                        <td style="border: 0;">Nama Depan</td>
                        <td style="border: 0;"><input type="text" name="namadep" value=<?php echo $buff['namadep'];?>></td>
                    </tr>
                    <tr style="border: 0;">
                        <td style="border: 0;">Nama Belakang</td>
                        <td style="border: 0;"><input type="text" name="namabel" value=<?php echo $buff['namabel'];?>></td>
                    </tr>
                    <tr style="border: 0;">
                        <td style="border: 0;">Mata Kuliah</td>
                        <td style="border: 0;">
                            <select name="id_mk" value=<?php echo $buff['id_mk'];?>>
                                <option value="1">Rekayasa Perangkat Lunak</option>
                                <option value="2">Pengantar Organisasi Komputer</option>
                                <option value="3">Matematika Dasar 2</option>
                                <option value="4">Metode Numerik</option>
                                <option value="5">Perancangan dan Pemrograman Web</option>
                                <option value="6">Analisis dan Desain Sistem</option>
                                <option value="7">Komunikasi Data</option>
                                <option value="8">Interaksi Manusia dan Komputer</option>
                            </select>
                        </td>
                    </tr>
                    <tr style="border: 0;">
                        <td style="border: 0;">Username</td>
                        <td style="border: 0;"><input type="text" name="username" value=<?php echo $buff['username'];?>></td>
                    </tr>
                    <tr style="border: 0;">
                        <td style="border: 0;">Password</td>
                        <td style="border: 0;"><input type="text" name="password" value=<?php echo $buff['password'];?>></td>
                    </tr>
                    <tr style="border: 0;">
                        <td style="border: 0;">Level Akun</td>
                        <td style="border: 0;">
                            <input type="radio" name="level" disabled='disabled' value="admin"> Admin <br>
                            <input type="radio" name="level" checked='checked' value="dosen"> Dosen <br>
                            <input type="radio" name="level" disabled='disabled' value="mahasiswa"> Mahasiswa <br>
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
            <?php
        } 
        // Jika level akun yang diedit adalah mahasiswa
        else if ($level=='mahasiswa') {
            ?>
                <form action="editData.php" method="post">
                    <table width="100%" style="border: 0;">
                        <input type="hidden" name='id' value="<?php echo $buff['id'];?>"/>
                        <tr style="border: 0;">
                            <td style="border: 0;">Nama Depan</td>
                            <td style="border: 0;"><input type="text" name="namadep" value=<?php echo $buff['namadep'];?>></td>
                        </tr>
                        <tr style="border: 0;">
                            <td style="border: 0;">Nama Belakang</td>
                            <td style="border: 0;"><input type="text" name="namabel" value=<?php echo $buff['namabel'];?>></td>
                        </tr>
                        <tr style="border: 0;">
                            <td style="border: 0;">Semester</td>
                            <td style="border: 0;">
                                <select name="semester">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </td>
                        </tr>
                        <tr style="border: 0;">
                            <td style="border: 0;">Username</td>
                            <td style="border: 0;"><input type="text" name="username" value=<?php echo $buff['username'];?>></td>
                        </tr>
                        <tr style="border: 0;">
                            <td style="border: 0;">Password</td>
                            <td style="border: 0;"><input type="text" name="password" value=<?php echo $buff['password'];?>></td>
                        </tr>
                        <tr style="border: 0;">
                            <td style="border: 0;">Level Akun</td>
                            <td style="border: 0;">
                                <input type="radio" name="level" disabled='disabled' value="admin"> Admin <br>
                                <input type="radio" name="level" disabled='disabled' value="dosen"> Dosen <br>
                                <input type="radio" name="level" checked='checked' value="mahasiswa"> Mahasiswa <br>
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
            <?php
        }
        // Jika level akun yang diedit adalah admin
        else {
            ?>
                <form action="editData.php" method="post">
                        <table width="100%" style="border: 0;">
                            <input type="hidden" name='id' value="<?php echo $buff['id'];?>"/>                            
                            <tr style="border: 0;">
                                <td style="border: 0;">Nama Depan</td>
                                <td style="border: 0;"><input type="text" name="namadep" value=<?php echo $buff['namadep'];?>></td>
                            </tr>
                            <tr style="border: 0;">
                                <td style="border: 0;">Nama Belakang</td>
                                <td style="border: 0;"><input type="text" name="namabel" value=<?php echo $buff['namabel'];?>></td>
                            </tr>
                            <tr style="border: 0;">
                                <td style="border: 0;">Username</td>
                                <td style="border: 0;"><input type="text" name="username" value=<?php echo $buff['username'];?>></td>
                            </tr>
                            <tr style="border: 0;">
                                <td style="border: 0;">Password</td>
                                <td style="border: 0;"><input type="text" name="password" value=<?php echo $buff['password'];?>></td>
                            </tr>
                            <tr style="border: 0;">
                                <td style="border: 0;">Level Akun</td>
                                <td style="border: 0;">
                                    <input type="radio" name="level" checked='checked' value="admin"> Admin <br>
                                    <input type="radio" name="level" disabled='disabled' value="dosen"> Dosen <br>
                                    <input type="radio" name="level" disabled='disabled' value="mahasiswa"> Mahasiswa <br>
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
            <?php
        }
        ?>
    </div>
<?php
};
mysqli_close($conn);
?>