<?php
include "../koneksi/koneksi.php";
$id_soal = $_GET['id_soal'];
$hapus = "DELETE FROM bank_soal WHERE id_soal='$id_soal'";
$hasil = mysqli_query($conn, $hapus);
if ($hapus) {
    echo "<script>alert('Pertanyaan berhasi dihapus !');window.location.href='main.php?page=DataQuest';</script>";
}
