<?php
    include "../koneksi/koneksi.php";
?>

<form action="reg_pertanyaan.php" method="post">
    <table width="100%" style="border: 0;">
        <tr style="border: 0;">
            <td style="border: 0; vertical-align: top">Pertanyaan</td>
            <td style="border: 0;">
                <textarea style="resize: none;" rows = "5" cols = "60" name= "pertanyaan"></textarea>
            </td>
        </tr>
        <tr style="border: 0;">
            <td style="border: 0;" height="68" align="right"><input type="reset" value="reset"/></td>
            <td style="border: 0;"><input type="submit" value="submit"/></td>
        </tr>
    </table>
</form>