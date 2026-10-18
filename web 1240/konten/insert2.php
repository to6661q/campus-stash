<body>
<head>
<h2>List Pertanyaan </h2><br />
<style href="style/doggy.style.css" type="text/css" rel="stylesheet">
</head>
<!--
.style1{
	color: #000099;
	font-weight: bold;
}
-->
</style>
<?php
	include "../koneksi/koneksi.php";
    $select = "SELECT * FROM pertanyaan";
    $hasil = mysql_query($select);
    $rowcount = mysql_num_rows($hasil);
    if ($rowcount==0){
        ?>
        <form action="?module=tambahtanya" method="get">
        	<input type="hidden" name='module' value="tambahtanya"/>
        	<button type="submit">Tambah</button>
        </form><?php
    } else {
 ?>
 	<div class="view">
        <h2>List pertanyaan</h2>
	</div>
	
 
<a href="index.php"><-- kembali ke halaman utama</a>
</body>