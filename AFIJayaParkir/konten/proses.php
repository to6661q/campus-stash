<?php

if (isset($_GET['status'])) {
	$id = $_GET['status'];
} else {
	$id = $_POST['id_proses'];
}

switch ($id) {
		// Auth =======================================
	case 'login':
		$username = $_POST['username'];
		$password = $_POST['password'];
		$proses->login('index.php', $username, $password);
		break;

	case 'logout':
		session_destroy();
		header('location:auth.php');
		break;

		// Parkir =======================================
	case 'parkir_masuk':
		$plat_nomor = $_POST['plat_nomor'];
		$id_gedung = $_POST['id_gedung'];
		$nomor_tempat = $_POST['nomor_tempat'];
		$proses->parkir_masuk('parkir_masuk', $plat_nomor, $id_gedung, $nomor_tempat);
		break;

	case 'parkir_keluar':
		$plat_nomor = $_POST['plat_nomor'];
		$proses->parkir_keluar("parkir_keluar&id=$plat_nomor", $plat_nomor);
		break;

		// Tarif =======================================
	case 'ubah_tarif':
		$tarif_awal = $_POST['tarif_awal'];
		$tarif_perjam = $_POST['tarif_perjam'];
		$tarif_maks = $_POST['tarif_maks'];
		$proses->ubah_tarif('tarif', $tarif_awal, $tarif_perjam, $tarif_maks);
		break;

		// Admin =======================================
	case 'tambah_admin':
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$proses->tambah_admin('admin', $nama, $username, $password, $tgl_lahir);
		break;

	case 'ubah_admin':
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$proses->ubah_admin('admin', $id, $nama, $username, $password, $tgl_lahir);
		break;

	case 'hapus_admin':
		$id = $_GET['id'];
		$proses->hapus_admin('admin', $id);
		break;

		// User =======================================
	case 'tambah_user':
		$id = $_POST['plat_nomor'];
		$proses->tambah_user('user', $id);
		break;

	case 'ubah_user':
		$id = $_POST['plat_nomor'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		if ($_SESSION['akses']==0) $tujuan = 'cek_parkiran';
		else $tujuan = 'user';
		$proses->ubah_user($tujuan, $id, $username, $password);
		break;

	case 'hapus_user':
		$id = $_GET['id'];
		$proses->hapus_user('user', $id);
		break;

		// Gedung =======================================
	case 'tambah_gedung':
		$nama_gedung = $_POST['nama_gedung'];
		$kuota = $_POST['kuota'];
		$proses->tambah_gedung('gedung', $nama_gedung, $kuota);
		break;

	case 'ubah_gedung':
		$id = $_POST['id'];
		$nama_gedung = $_POST['nama_gedung'];
		$kuota = $_POST['kuota'];
		$proses->ubah_gedung('gedung', $id, $nama_gedung, $kuota);
		break;

	case 'hapus_gedung':
		$id = $_GET['id'];
		$proses->hapus_gedung('gedung', $id);
		break;
	
	default:
		echo "<script>alert('Ada kesalahan!'); window.history.back();</script>";
		break;
}


?>
