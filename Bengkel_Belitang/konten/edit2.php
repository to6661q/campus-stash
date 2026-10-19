<?php
    include "../koneksi/koneksi.php";
    if(isset($_POST['id'])) {
        $edit = "UPDATE register SET onderdil='$_POST[onderdil]', nama='$_POST[nama]',
        fungsi='$_POST[fungsi]', harga='$_POST[harga]', stok='$_POST[stok]', tanggal='$_POST[tanggal]',
        keterangan='$_POST[keterangan]' WHERE id='$_POST[id]'";
        $hasil = mysqli_query($conn, $edit);
        if($hasil) {
            echo "<script>alert('Data berhasil diedit'); window.location.href='../index.php';</script>";
        }
    }
?>