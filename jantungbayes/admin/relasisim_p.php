<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Simpan Relasi</title>
<style type="text/css">
body { margin:50px;background-image:url(../Image/Bottom_texture.jpg);}
div { border:1px dashed #666; background-color:#CCC; padding:10px;}
</style>
</head>
<body>
<div>
<?php 
//include "inc.connect/connect.php"; 
include "../koneksi.php";
# Baca variabel Form (If Register Global ON)
$TxtKdPenyakit=$_POST['TxtKdPenyakit'];
$bobot=$_POST['txtbobot'];
# Validasi Form
if (trim($TxtKdPenyakit)=="") {	echo "Kode Penyakit masih kosong, ulangi kembali";	}
elseif (trim($bobot)=="") { echo "nilai masih kosong";}

$sql_cek = "SELECT * FROM nilai_probabilitas_p WHERE kd_penyakit='$TxtKdPenyakit' ";
$qry_cek = mysql_query($sql_cek, $koneksi) 
		   or die ("Gagal Cek".mysql_error());
$ada_cek = mysql_num_rows($qry_cek);
if ($ada_cek >=1) {
echo"RELASI TELAH ADA";
echo "<center><a href='../admin/haladmin.php?top=rule-penyakit.php'>OK</a></center>";
	exit;
}
else {
$sql  = " INSERT INTO nilai_probabilitas_p (kd_penyakit,nilai) VALUES ('$TxtKdPenyakit','$bobot')"; 
	mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
	echo "<center><strong>DATA TELAH BERHASIL DIRELASIKAN..!</strong></center>";
	echo "<center><a href='../admin/haladmin.php?top=rule-penyakit.php'>OK</a></center>";
}
?>
</div>
</body>
</html>
