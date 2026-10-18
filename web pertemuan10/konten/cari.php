<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
    </head>
    <body>
        <h2>Hasil Pencarian</h2><br/>
        <?php
            include "koneksi/koneksi.php";
            $username = $_GET['username'];
            $select = "SELECT * FROM register WHERE username LIKE '%$username'";
            $hasil = mysqli_query($conn, $select);
        ?>
        <table width="780" border="1">
            <tr>
                <td width="20">no</td>
                <td width="85">nama depan</td>
                <td width="99">nama belakang</td>
                <td width="75">username</td>
                <td width="75">password</td>
                <td width="35">usia</td>
                <td width="35">jk</td>
                <td width="50">ttl</td>
                <td width="60">email</td>
                <td width="60">notel</td>
                <td colspan="2">aksi</td>
            </tr>
        </table>

        <?php
            $count=0;
            while($buff=mysqli_fetch_array($hasil)){
                $count++;
        ?>
        <table width="780" border="1">
            <tr>
                <td width="20"><?php echo $count; ?></td>
                <td width="85"><?php echo $buff['namadep']; ?></td>
                <td width="99"><?php echo $buff['namabel']; ?></td>
                <td width="75"><?php echo $buff['username']; ?></td>
                <td width="75"><?php echo $buff['password']; ?></td>
                <td width="35"><?php echo $buff['usia']; ?></td>
                <td width="35"><?php echo $buff['jk']; ?></td>
                <td width="50"><?php echo $buff['ttl']; ?></td>
                <td width="60"><?php echo $buff['email']; ?></td>
                <td width="60"><?php echo $buff['notel']; ?></td>
                <td width="55"><a href="konten/edit.php?id=<?php echo $buff['id']; ?>">edit</a></td>
                <td><a href="konten/hapus.php?id=<?php echo $buff['id']; ?>">hapus</a></td>
            </tr>
        </table>
        <?php
            };
            mysqli_close($conn);
        ?><br/>
        
    </body>
</html>