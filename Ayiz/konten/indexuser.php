<?php
    include "koneksi/koneksi.php";
    session_start();
    $select = "SELECT * FROM akun WHERE username='$_SESSION[username]'";
    $hasil = mysqli_query($conn, $select);
    $buff=mysqli_fetch_array($hasil);
    if(!isset($_SESSION['username']))
        ?>
        Selamat datang <?php echo '<strong>'.$_SESSION['username'].'</strong>'; ?><br><br>
        Username              : <?php echo $buff['username']; ?><br>
        Password              : <?php echo $buff['password']; ?><br>
        Tipe                  : <?php echo $buff['level']; ?><br><br>
    <a href="?module=logout#pos">Keluar</a>