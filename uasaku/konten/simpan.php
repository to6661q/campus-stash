<?php
include "../koneksi/koneksi.php";
session_start();

$count = $_POST['count'];
for ($i = 1; $i <= $count; $i++) {
    $string1 = "id_soal" . $i;
    $string2 = "nilai" . $i;

    $select = "SELECT * FROM bank_jawaban WHERE id_mhs='$_SESSION[id_mhs]' AND id_dosen='$_POST[id_dosen]'";
    $hasil = mysqli_query($conn, $select);
    $rowcount = mysqli_num_rows($hasil);

    if ($rowcount == 0) {
        $mysqli = "INSERT INTO bank_jawaban (id_dosen, mk, id_soal, id_mhs, nilai) VALUES ('$_POST[id_dosen]','$_POST[mk]','$_POST[$string1]','$_POST[id_mhs]','$_POST[$string2]')";
    } else {
        $mysqli = "UPDATE bank_jawaban SET id_dosen='$_POST[id_dosen]', mk='$_POST[mk]', id_soal='$_POST[$string1]', id_mhs='$_SESSION[id_mhs]', nilai='$_POST[$string2]' WHERE id_mhs='$_SESSION[id_mhs]' AND id_soal='$_POST[$string1]'";
    }

    if (!mysqli_query($conn, $mysqli)) {
        die(mysqli_error($conn));
    }
}

echo "<script>alert('Tanggapan anda telah terekam. Terima kasih sudah memberi tanggapan');window.location.href='main.php';</script>";
mysqli_close($conn);
