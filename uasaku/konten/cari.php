<h2>Hasil Pencarian</h2><br/>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$username=$_POST['username'];
	$select="select *from register where username like '$username'";
}
else{
	$select="select *from register";
}
$no=1;
include"koneksi/koneksi.php";
$hasil=mysqli_query($koneksi,$select);
?>
<table width="1105" border="1">
		<tr>
			<th align="center" width="3%">ID</th>
			<th align="center" width="8.3%">Nama Depan</th>
			<th align="center" width="8.3%">Nama Belakang</th>
			<th align="center" width="8.3%">MK</th>
			<th align="center" width="8.3%">Semester</th>
			<th align="center" width="8.3%">Username</th>
			<th align="center" width="8.3%">Password</th>
			<th align="center" width="8.3%">Level</th>
			<th align="center" colspan="2" width="10%">Aksi</th>
		</tr>
<?php
while($buff=mysqli_fetch_array($hasil)){
?>
	<tr>
				<td width="3%" align="center"><?php echo $no; ?></td>
				<td width="8.3%" align="center"><?php echo $buff['namadep']; ?></td>
				<td width="8.3%" align="center"><?php echo $buff['namabel']; ?></td>
				<td width="8.3%" align="center"><?php echo $buff['mk']; ?></td>
				<td width="8.3%" align="center"><?php echo $buff['semester']; ?></td>
				<td width="8.3%" align="center"><?php echo $buff['username']; ?></td>
				<td width="8.3%" align="center"><?php echo $buff['password']; ?></td>
				<td width="8.3%" align="center"><?php echo $buff['level']; ?></td>
				<td width="5%" align="center"><a href="?module=edit&id=<?php echo $buff['id']; ?>">edit</a></td>
				<td width="5%" align="center"><a href="hapus.php?id=<?php echo $buff['id']; ?>">hapus</a></td>
			</tr>

<?php
$no++;
};
mysqli_close($koneksi);
?>
</table><br/>
<a href="index.php"><---- kembali ke index </a>














<?php
include "../koneksi/koneksi.php";
$namadep = $_GET['namadep'];
$select = "SELECT * FROM akun WHERE namadep LIKE '%$namadep'";
$hasil = mysqli_query($conn, $select);
$rowcount = mysqli_num_rows($hasil);
if ($rowcount == 0) {
    ?> <p>Data tidak ditemukan !</p>
<?php
} else {
    ?>
    <div class="view">
        <p>Hasil pencarian</p>
        <table width="100%" border="3">
            <tr>
                <td width="18%">Nama Depan</td>
				<td width="18%">Nama Belakang</td>
                <td width="18%">MK</td>
				<td width="18%">Semester</td>
                <td width="16%">Username</td>
                <td width="16%">Password</td>
                <td width="16%">Level</td>
                <td colspan="2">Aksi</td>
            </tr>

            <?php
                $count = 0;
                while ($buff = mysqli_fetch_array($hasil)) {
                    ;
                    ?>
                <tr>
                    <td><?php echo $buff['namadep']; ?></td>
					 <td><?php echo $buff['namabel']; ?></td>
                    <td><?php echo $buff['mk']; ?></td>
					 <td><?php echo $buff['semester']; ?></td>
                    <td><?php echo $buff['username']; ?></td>
                    <td><?php echo $buff['password']; ?></td>
                    <td><?php echo $buff['level']; ?></td>
                    <td width="55"><a href="?page=edit&id=<?php echo $buff['id']; ?>">Edit</a></td>
                    <td><a href="hapus.php?id=<?php echo $buff['id']; ?>">Hapus</a></td>
                </tr>
        <?php };
        } ?>
        </table>
    </div>