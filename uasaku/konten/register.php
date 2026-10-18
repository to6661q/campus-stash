<?php
include "../koneksi/koneksi.php";

$insert = "INSERT INTO akun
    (namadep, namabel, mk,semester, username, password, level) VALUES
    ('$_POST[namadep]','$_POST[namabel]','$_POST[mk]','$_POST[semester]','$_POST[username]','$_POST[password]','$_POST[level]')";

if ($conn->query($insert) == TRUE) {
    echo "<script>alert('Akun berhasil didaftarkan !');window.location.href='main.php?page=masterData';</script>";
    $test = "SELECT * FROM akun ORDER BY id DESC";
    $hasil = mysqli_query($conn, $test);
    $buff = mysqli_fetch_array($hasil);
    $id = $buff['id'];
    $level = $buff['level'];

    if ($level == 'dosen') {
        $mysql1 = "INSERT INTO dosen (id) VALUES ('$id')";
        $conn->query($mysql1);
    } else {
        $mysql1 = "INSERT INTO mahasiswa (id) VALUES ('$id')";
        $conn->query($mysql1);
    }
} else {
    echo "Error ! : " . mysqli . "<br>" . $conn->error;
}
