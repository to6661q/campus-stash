<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Bengkel Belitang</title>
    </head>

    <body>
		<div id="wrapper">
        <?php
            include "koneksi/koneksi.php";
            $select = "SELECT * FROM register";
            $hasil = mysqli_query($conn, $select);
        ?>
        <table width="780" border="1">
            <tr>
                <th width="20">No</th>
                <th width="30">ID</th>
                <th width="75">Nama</th>
                <th width="220">Fungsi</th>
                <th width="50">Harga</th>
                <th align="center" width="35">Stok</th>
                <th width="100">Tanggal Masuk</th>
                <th width="60">Keterangan</th>
                <th colspan="2">Aksi</th>
            </tr>
        <?php
            $count=0;
            while($buff=mysqli_fetch_array($hasil)){
                $count++;
        ?>
            <tr>
               <td align="center" width="20"><?php echo $count; ?></td>
                <td width="35"><?php echo $buff['onderdil']; ?></td>
                <td width="75"><?php echo $buff['nama']; ?></td>
                <td width="220"><?php echo $buff['fungsi']; ?></td>
                <td width="50"><?php echo $buff['harga']; ?></td>
                <td align="center" width="35"><?php echo $buff['stok']; ?></td>
                <td width="100"><?php echo $buff['tanggal']; ?></td>
                <td width="60"><?php echo $buff['keterangan']; ?></td>
                <td align="center" width="45"><a href="?module=edit&id=<?php echo $buff['id']; ?>">Edit</a></td>
                <td align="center"><a  href="konten/hapus.php?id=<?php echo $buff['id']; ?>">Hapus</a></td>
            </tr>
			
        <?php
            };
            mysqli_close($conn);
        ?>
		</table>
		</div>
    </body>
</html>