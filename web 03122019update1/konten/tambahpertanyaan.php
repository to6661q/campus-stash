<form action="registerpertanyaan.php" method="post">
    <table width="750" style="border: 0;">
        <tr style="border: 0;">
            <td width="150" style="border: 0; vertical-align: top">Pertanyaan</td>
            <td width="600" style="border: 0;">
                <textarea rows = "5" cols = "60" name= "judul_pertanyaan"></textarea>
            </td>
        </tr>
        <tr style="border: 0;">
            <td style="border: 0;">Tipe Pertanyaan</td>
            <td style="border: 0;">
                <input type="radio" name="tipe_pertanyaan" value="akademik"/> Akademik<br>
                <input type="radio" name="tipe_pertanyaan" value="umum"/> Umum<br>
                <input type="radio" name="tipe_pertanyaan" value="keuangan"/> Keuangan
            </td>
        </tr>
        <tr style="border: 0;">
            <td style="border: 0;" height="68" align="right"><input type="reset" value="reset"/></td>
            <td style="border: 0;"><input type="submit" value="submit"/></td>
        </tr>
    </table>
</form>