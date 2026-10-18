<?php
include "koneksi/koneksi.php";
session_start();
$select = "SELECT * FROM register WHERE username='$_SESSION[username]'";
$hasil = mysqli_query($conn, $select);
$buff=mysqli_fetch_array($hasil);

if(!isset($_SESSION['username']))
?>

Selamat datang <?php echo '<strong>'.$_SESSION['username'].'</strong>'; ?><br><br>
Nama Depan            : <?php echo $buff['namadep']; ?><br>
Nama Belakang         : <?php echo $buff['namabel']; ?><br>
Usia                  : <?php echo $buff['usia']; ?><br>
Jenis Kelamin         : <?php echo $buff['jk']; ?><br>
Tempat, tanggal lahir : <?php echo $buff['ttl']; ?><br>
Email                 : <?php echo $buff['email']; ?><br>
No. Telepon           : <?php echo $buff['notel']; ?><br><br>
<a href="?module=logout#pos">Keluar</a>