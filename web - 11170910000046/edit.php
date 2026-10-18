<?php
include "koneksi.php";
$t = $_GET['t'];
if($t == 'insert'){
    $query = "INSERT INTO register (namadep, namabel, username, password, usia, jk, ttl, email, notel) VALUES ('$_POST[namadep]', '$_POST[namabel]', '$_POST[username]', '$_POST[password]', '$_POST[usia]', '$_POST[jk]', '$_POST[ttl]', '$_POST[email]', '$_POST[notel]')"; 
    mysqli_query($mysqli, $query);
    echo"<script>alert('selamat, Anda terdaftar'); window.location.href='index.php';</script>";
    mysqli_close ($mysqli); 
} else if ($t == 'edit'){
    $query = "DELETE FROM register WHERE id='".$_GET['id']."'";
    $id = $_GET['id'];
    mysqli_query($mysqli, $query);
    $query = "INSERT INTO register (id, namadep, namabel, username, password, usia, jk, ttl, email, notel) VALUES ('$id','$_POST[namadep]', '$_POST[namabel]', '$_POST[username]', '$_POST[password]', '$_POST[usia]', '$_POST[jk]', '$_POST[ttl]', '$_POST[email]', '$_POST[notel]')"; 
    mysqli_query($mysqli, $query);
    echo"<script>alert('selamat, sudah diubah'); window.location.href='index.php?p=view';</script>";
    mysqli_close ($mysqli); 
} else if ($t == 'delete'){
    $query = "DELETE FROM register WHERE id='".$_GET['id']."'";
    mysqli_query($mysqli, $query);
    echo"<script>alert('selamat, sudah dihapus'); window.location.href='index.php?p=view';</script>";
}


?>