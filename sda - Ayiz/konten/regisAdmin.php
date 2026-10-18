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
                <input type="radio" name="level" checked='checked' value="admin"> Admin <br>
                <input type="radio" name="level" disabled='disabled' value="dosen"> Dosen <br>
                <input type="radio" name="level" disabled='disabled' value="mahasiswa"> Mahasiswa <br>
            </td>
    </table>
    <input class="button" type="reset" value="reset">
    <input class="button" type="submit" value="submit">
</form>