<form action="register.php" method="post">
    <table width="100%" style="border: 0;">
        <tr style="border: 0;">
            <td style="border: 0;">First Name</td>
            <td style="border: 0;"><input type="text" name="namadep"></td>
        </tr>
        <tr style="border: 0;">
            <td style="border: 0;">Last Name</td>
            <td style="border: 0;"><input type="text" name="namabel"></td>
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
            <td style="border: 0;"><input type="text" name="username"></td>
        </tr>
        <tr style="border: 0;">
            <td style="border: 0;">Password</td>
            <td style="border: 0;"><input type="text" name="password"></td>
        </tr>
        <tr style="border: 0;">
            <td class="level" style="border: 0;">Level Akun</td>
            <td class="level" style="border: 0;">
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