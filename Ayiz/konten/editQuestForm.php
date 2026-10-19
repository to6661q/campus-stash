<?php
$id_soal = $_GET['id_soal'];
include "../koneksi/koneksi.php";
$select = "SELECT * FROM bank_soal WHERE id_soal='$id_soal'";
$hasil = mysqli_query($conn, $select);
while ($buff = mysqli_fetch_array($hasil)) {
    ?>
    <div class="edit">
        <h2>Edit Pertanyaan</h2>
        <form action="editQuestProc.php" method="post">
            <table width="100%" style="border: 0;">
                <input type="hidden" name='id_soal' value="<?php echo $buff['id_soal']; ?>" />
                <tr style="border: 0;">
                    <td style="border: 0; vertical-align: top">Pertanyaan</td>
                    <td style="border: 0;">
                        <textarea style="resize: none;" rows="5" cols="60" name="pertanyaan"><?php echo $buff['pertanyaan']; ?></textarea>
                    </td>
                </tr>
                <tr style="border: 0;">
                    <td style="border: 0;" height="68" align="right"><input type="reset" value="reset" /></td>
                    <td style="border: 0;"><input type="submit" value="submit" /></td>
                </tr>
            </table>
        </form>
    </div>
<?php
};
mysqli_close($conn);
?>