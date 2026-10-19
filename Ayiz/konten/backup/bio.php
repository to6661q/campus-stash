<?php
    if(isset($_SESSION['id']))
?>
<h2>Detail Akun <?php if($_SESSION['level']=='mahasiswa'){
    echo 'Mahasiswa';
} else if ($_SESSION['level']=='dosen') {
    echo 'Dosen';
}
?></h2>
<?php 
    if($_SESSION['level']=='dosen') {
        ?>
        <table width="100%" style="border= 0;">
            <tr style="border: 0;">
                <td width='30%' style="border: 0;">ID</td>
                <td width='5%' style="border: 0;">:</td>
                <td width='65%' style="border: 0;"><?php echo $_SESSION['id'];?></td>
            </tr>
            <tr style="border: 0;">
                <td style="border: 0;">Nama Depan</td>
                <td style="border: 0;">:</td>
                <td style="border: 0;"><?php echo $_SESSION['namadep'];?></td>
            </tr>
            <tr style="border: 0;">
                <td style="border: 0;">Nama Belakang</td>
                <td style="border: 0;">:</td>
                <td style="border: 0;"><?php echo $_SESSION['namabel'];?></td>
            </tr>
            <tr style="border: 0;">
                <td style="border: 0;">Username</td>
                <td style="border: 0;">:</td>
                <td style="border: 0;"><?php echo $_SESSION['username'];?></td>
            </tr>
            <tr style="border: 0;">
                <td style="border: 0;">Password</td>
                <td style="border: 0;">:</td>
                <td style="border: 0;"><?php echo $_SESSION['password'];?></td>
            </tr>
        </table>
        <?php
    }else {
        ?>
        <table width="100%" style="border= 0;">
            <tr style="border: 0;">
                <td width='30%' style="border: 0;">ID</td>
                <td width='5%' style="border: 0;">:</td>
                <td width='65%' style="border: 0;"><?php echo $_SESSION['id'];?></td>
            </tr>
            <tr style="border: 0;">
                <td style="border: 0;">Nama Depan</td>
                <td style="border: 0;">:</td>
                <td style="border: 0;"><?php echo $_SESSION['namadep'];?></td>
            </tr>
            <tr style="border: 0;">
                <td style="border: 0;">Nama Belakang</td>
                <td style="border: 0;">:</td>
                <td style="border: 0;"><?php echo $_SESSION['namabel'];?></td>
            </tr>
            <tr style="border: 0;">
                <td style="border: 0;">Username</td>
                <td style="border: 0;">:</td>
                <td style="border: 0;"><?php echo $_SESSION['username'];?></td>
            </tr>
            <tr style="border: 0;">
                <td style="border: 0;">Password</td>
                <td style="border: 0;">:</td>
                <td style="border: 0;"><?php echo $_SESSION['password'];?></td>
            </tr>
        </table>
        <?php
    }
?>
        