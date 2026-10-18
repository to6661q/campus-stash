<?php
    include "../koneksi/koneksi.php";
    if(isset($_POST['id_soal'])) {
        $update = "UPDATE bank_soal SET pertanyaan='$_POST[pertanyaan]' WHERE id_soal='$_POST[id_soal]'";
        $hasil = mysqli_query($conn, $update);
        if($hasil) {
            echo "<script>alert('Pertanyaan berhasil diedit !');window.location.href='default.php?page=masterQuest';</script>";
        }
    }
?>