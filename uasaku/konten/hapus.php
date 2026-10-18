<?php
    include "../koneksi/koneksi.php";
    $id = $_GET['id'];
    $level = $_GET['level'];
    
    $hapus2 = "DELETE FROM mahasiswa WHERE id='$id'";
    $hapus1 = "DELETE FROM dosen WHERE id='$id'";
    $hapus = "DELETE FROM akun WHERE id='$id'";
	$hasil=mysqli_query($conn, $hapus);

    if($level=="dosen"){
    	$hasil1 = mysqli_query($conn, $hapus1);
    	$hasil = mysqli_query($conn, $hapus);
    }
    else if ($level=="mahasiswa"){
    	$hasil2 = mysqli_query($conn, $hapus2);
    	$hasil = mysqli_query($conn, $hapus);
    }

    if ($hasil==true) {
        echo "<script>alert('Data berhasil dihapus');window.location.href='main.php?page=masterData';</script>";
    }
    else{
    	echo "<script>alert('Data Gagal dihapus');window.location.href='main.php?page=masterData';</script>";
    }
?>