<?php
include "../koneksi/koneksi.php";

//Edit data dosen
if (isset($_POST['id']) && $_POST['level'] == 'dosen') {
    $edit = "UPDATE akun SET id='$_POST[id]', namadep='$_POST[namadep]', namabel='$_POST[namabel]', 
                        username='$_POST[username]', password='$_POST[password]', 
                        level='$_POST[level]' WHERE id='" . $_POST['id'] . "' ";
    $hasil = mysqli_query($conn, $edit);

    $edit1 = "UPDATE dosen SET id_mk ='$_POST[id_mk]' WHERE id= '$_POST[id]' ";
    $hasil1 = mysqli_query($conn, $edit1);

    if ($hasil && $hasil1) {
        echo "<script>alert('Data sukses dirubah !');window.location.href='main.php?page=DataAccount';</script>";
    } else {
        echo "<script>alert('Failed to edit !');window.location.href='main.php?page=DataAccount';</script>";
    }
}
//Edit data mahasiswa
else if (isset($_POST['id']) && $_POST['level'] == 'mahasiswa') {
    $edit = "UPDATE akun SET id='$_POST[id]', namadep='$_POST[namadep]', namabel='$_POST[namabel]', 
                        username='$_POST[username]', password='$_POST[password]', 
                        level='$_POST[level]' WHERE id='" . $_POST['id'] . "' ";
    $hasil = mysqli_query($conn, $edit);

    $edit2 = "UPDATE mahasiswa SET semester ='$_POST[semester]' WHERE id= '$_POST[id]' ";
    $hasil2 = mysqli_query($conn, $edit2);

    if ($hasil && $hasil2) {
        echo "<script>alert('Succesfully Edited !');window.location.href='main.php?page=DataAccount';</script>";
    } else {
        echo "<script>alert('Failed to edit !');window.location.href='main.php?page=DataAccount';</script>";
    }
}
//Edit data admin
else {
    $edit = "UPDATE akun SET id='$_POST[id]', namadep='$_POST[namadep]', namabel='$_POST[namabel]', 
                        username='$_POST[username]', password='$_POST[password]', 
                        level='$_POST[level]' WHERE id='" . $_POST['id'] . "' ";
    $hasil = mysqli_query($conn, $edit);

    if ($hasil) {
        echo "<script>alert('Succesfully Edited !');window.location.href='main.php?page=DataAccount';</script>";
    } else {
        echo "<script>alert('Failed to edit !');window.location.href='main.php?page=DataAccount';</script>";
    }
}
