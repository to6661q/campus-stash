<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
    </head>
    <body>
        <?php
            $id = $_GET['id'];
            include "koneksi/koneksi.php";
            $select = "SELECT * FROM register WHERE id='$id'";
            $hasil = mysqli_query($conn, $select);
            while($buff=mysqli_fetch_array($hasil)) {
                ?>
                <h2>Edit Data</h2>
                <form action='konten/edit2.php' method='post'>
                    <table width='auto' border='0'>
                        <input type="hidden" name='id' value="<?php echo $buff['id'];?>"/>
                        <tr>
                            <td width='150'>ID</td>
                            <td width='327'><input type="text" name="onderdil" value="<?php echo $buff['onderdil'];?>"/></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" name="nama" value="<?php echo $buff['nama'];?>"/></td>
                        </tr>
                        <tr>
                            <td>Fungsi</td>
                            <td><input type="text" name="fungsi" value="<?php echo $buff['fungsi'];?>"/></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><input type="text" name="harga" value="<?php echo $buff['harga'];?>"/></td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td><input type="text" name="stok" value="<?php echo $buff['stok'];?>"/></td>
                        </tr>
						<tr>
                            <td>Keterangan</td>
                            <td><input type="text" name="keterangan" value="<?php echo $buff['keterangan'];?>"/></td>
                        </tr>
                        <tr>
                            <td>Tanggal Masuk</td>
                            <td><input type="date" name="tanggal" value="<?php echo $buff['tanggal'];?>"/></td>
                        </tr>
                        
                            <td height="68" align="right"><input type="Reset" value="Reset" /></td>
                            <td><input type="Submit" value="Submit" /></td>
                        </tr>
                    </table>
                </form>
            <?php
            };
            mysqli_close($conn);
            ?>
    </body>
</html>