<?php
    include "../koneksi/koneksi.php";
    if(isset($_POST['id'])) {
        $edit = "UPDATE akun SET id='$_POST[id]', namadep='$_POST[namadep]', namabel='$_POST[namabel]', mk='$_POST[mk]', semester='$_POST[semester]', username='$_POST[username]', password='$_POST[password]', 
                level='$_POST[level]' WHERE id='$_POST[id]'";
        $hasil = mysqli_query($conn, $edit);
        if($hasil) {
            echo "<script>alert('Data sukses dirubah !');window.location.href='main.php?page=masterData';</script>";
        }
    }
?>