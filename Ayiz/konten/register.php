<?php
include "../koneksi/koneksi.php";

$insert = "INSERT INTO akun
    (namadep, namabel, username, password, level) VALUES
    ('$_POST[namadep]','$_POST[namabel]','$_POST[username]','$_POST[password]','$_POST[level]')";

if ($conn->query($insert) == TRUE) {
    echo "<script>alert('Akun berhasil didaftarkan !');window.location.href='main.php?page=DataAccount';</script>";
    $test = "SELECT * FROM akun ORDER BY id DESC";
    $hasil = mysqli_query($conn, $test);
    $buff = mysqli_fetch_array($hasil);
    $id = $buff['id'];
    $level = $buff['level'];

    if ($level == 'dosen') {
        $mysql1 = "INSERT INTO dosen (id, id_mk) VALUES ('$id', '$_POST[id_mk]')";
        $conn->query($mysql1);
    } else if ($level == 'mahasiswa') {
        $mysql1 = "INSERT INTO mahasiswa (id, semester) VALUES ('$id', '$_POST[semester]')";
        $conn->query($mysql1);
    }
} else {
    echo "Error ! : " . mysql . "<br>" . $conn->error;
}
