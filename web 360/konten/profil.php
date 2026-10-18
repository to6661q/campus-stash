<?php
include "koneksi/koneksi.php";
$select = "SELECT * FROM user WHERE username='$_SESSION[username]'";
$hasil = mysql_query($select);
$buff=mysql_fetch_array($hasil);

if(!isset($_SESSION['username']))
?>

Selamat datang <?php echo '<strong>'.$_SESSION['username'].'</strong>'; ?><br><br>
Nama              : <?php echo $buff['name']; ?><br>
Email         	  : <?php echo $buff['email']; ?><br>
Nomor Telepon     : <?php echo $buff['notel']; ?><br>
Pekerjaan         : <?php echo $buff['level']; ?><br>
Username          : <?php echo $buff['username']; ?><br>
Password          : <?php echo $buff['password']; ?><br>
No. Telepon           : <?php echo $buff['notel']; ?><br><br>
<a href="?module=logout#pos">Keluar</a>