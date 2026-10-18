<?php
include "../koneksi/koneksi.php";
?>

<form action="registQuest.php" method="post">
    <table width="100%" style="border: 0;">
        <tr style="border: 0;">
            <td style="border: 0; vertical-align: top">Pertanyaan</td>
            <td style="border: 0;">
                <textarea style="resize: none; background: none; color:#fff; width: 99%;" rows="5" cols="60" name="pertanyaan"></textarea>
            </td>
        </tr>
    </table>
    <input class="button" type="reset" value="reset" />
    <input class="button" type="submit" value="submit" />
</form>