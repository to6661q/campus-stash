<?php
    include "../koneksi/koneksi.php";

    $tambah = "INSERT INTO bank_soal (pertanyaan) VALUES ('$_POST[pertanyaan]')";
    if(!mysqli_query($conn, $tambah)) {
        die(mysqli_error());
    }

    echo "<script>alert('Pertanyaan Berhasil Ditambahkan !');window.location.href='default.php?page=masterQuest';</script>";
?>