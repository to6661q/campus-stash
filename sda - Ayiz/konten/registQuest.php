<?php
include "../koneksi/koneksi.php";

$tambah = "INSERT INTO bank_soal (pertanyaan) VALUES ('$_POST[pertanyaan]')";
if (!mysqli_query($conn, $tambah)) {
    die(mysqli_error($conn));
}

echo "<script>alert('Pertanyaan Berhasil Ditambahkan !');window.location.href='main.php?page=DataQuest';</script>";
