<?php
    include "../koneksi/koneksi.php";
    $id = $_GET['id'];
    $hapus = "DELETE FROM register WHERE id='$id'";
    $hasil = mysqli_query($conn, $hapus);
    if ($hapus) {
        echo "<script>alert('Data berhasil dihapus');window.location.href='../index.php';</script>";
    }
?>