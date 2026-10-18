<form action="register.php" method="post">
    <table width="100%" style="border: 0;">
        <tr style="border: 0;">
            <td style="border: 0;">Nama Depan</td>
            <td style="border: 0;">
            <div class="textbox">
                <input type="text" name="namadep">
            </div>
            </td>
        </tr>
        <tr style="border: 0;">
            <td style="border: 0;">Nama Belakang</td>
            <td style="border: 0;">
                <div class="textbox">
                    <input type="text" name="namabel">
                </div>
            </td>
        </tr>
        <tr style="border: 0;">
            <td style="border: 0;">Mata Kuliah</td>
            <td style="border: 0;">
                <select name="id_mk">
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
            <td style="border: 0;">
                <div class="textbox">
                    <input type="text" name="username">
                </div>
            </td>
        </tr>
        <tr style="border: 0;">
            <td style="border: 0;">Password</td>
            <td style="border: 0;">
                <div class="textbox">
                    <input type="text" name="password">
                </div>
            </td>
        </tr>
        <tr style="border: 0;">
            <td style="border: 0;">Level Akun</td>
            <td style="border: 0;">
                <input type="radio" name="level" disabled='disabled' value="admin"> Admin <br>
                <input type="radio" name="level" checked='checked' value="dosen"> Dosen <br>
                <input type="radio" name="level" disabled='disabled' value="mahasiswa"> Mahasiswa <br>
            </td>
        </tr>
    </table>
    <input class="button" type="reset" value="reset">
    <input class="button" type="submit" value="submit">
</form>