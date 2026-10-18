<form action="register.php" method="post">
    <table width="100%" style="border: 0;">
        <tr style="border: 0;">
            <td style="border: 0;">Nama Depan</td>
            <td style="border: 0;"><input type="text" name="namadep"></td>
        </tr>
        <tr style="border: 0;">
            <td style="border: 0;">Nama Belakang</td>
            <td style="border: 0;"><input type="text" name="namabel"></td>
        </tr>
        <tr style="border: 0;">
            <td style="border: 0;">MK</td>
            <td style="border: 0;"><input type="text" name="mk"></td>
        </tr>
        <tr style="border: 0;">
            <td style="border: 0;">Username</td>
            <td style="border: 0;"><input type="text" name="username"></td>
        </tr>
        <tr style="border: 0;">
            <td style="border: 0;">Password</td>
            <td style="border: 0;"><input type="text" name="password"></td>
        </tr>
        <tr style="border: 0;">
            <td style="border: 0;">Level Akun</td>
            <td style="border: 0;">
                <input type="radio" name="level" value="admin"> Admin <br>
                <input type="radio" name="level" value="dosen"> Dosen <br>
                <input type="radio" name="level" value="mahasiswa"> Mahasiswa <br>
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