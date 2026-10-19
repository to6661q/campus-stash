<?php

class Modul {
	var $host;

	public function __construct($koneksi) {
		$this->host = $koneksi;
	}

	// Login =====================================

	public function login($hlm_tujuan, $username, $password) {
		$sql = "SELECT * FROM tb_akun WHERE username='$username' AND password='$password'";
		$query = mysqli_query($this->host, $sql);
		$cek = mysqli_num_rows($query);
		if ($cek==1) {
			$data = mysqli_fetch_array($query);
			$_SESSION['id_akun'] = $data['id_akun'];
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['akses'] = $data['akses'];
			if ($data['akses']==1) {
				$qryAdmin = mysqli_query($this->host, "SELECT nama FROM tb_akun JOIN tb_detail_admin ON tb_akun.id_akun=tb_detail_admin.id_akun WHERE tb_akun.username='$username'");
				$dataAdmin = mysqli_fetch_array($qryAdmin);
				$_SESSION['nama'] = $dataAdmin['nama'];
			} 
			
			echo "<script>window.location.href='".$hlm_tujuan."'</script>";	
		} else {
			echo "<script>alert('Username atau password tidak sesuai!'); window.history.back();</script>";
		}
	}

	// Parkir =====================================

	public function parkir_masuk($hlm_tujuan, $plat_nomor, $id_gedung, $nomor_tersedia) {
		$sql = "INSERT INTO tb_parkir (plat_nomor, id_gedung, nomor_tempat) VALUES ('$plat_nomor', '$id_gedung', '$nomor_tersedia')";
		$query = mysqli_query($this->host, $sql);
		if ($query) {
			echo "<script>window.location.href='?page=".$hlm_tujuan."'</script>";	
		} else {
			echo "<script>alert('Kendaraan masih ada di parkiran!'); window.history.back();</script>";
		}
	}

	public function parkir_keluar($hlm_tujuan, $plat_nomor) {
		$sqlCek = "SELECT plat_nomor FROM tb_parkir WHERE plat_nomor = '$plat_nomor'";
		$queryCek = mysqli_query($this->host, $sqlCek);
		$hasilCek = mysqli_num_rows($queryCek);
		if ($hasilCek != 0) {
			$sqlDelete = "DELETE FROM tb_parkir WHERE plat_nomor = '$plat_nomor'";
			$queryDelete = mysqli_query($this->host, $sqlDelete);
			echo "<script>window.location.href='?page=".$hlm_tujuan."'</script>";	
		} else {
			echo "<script>alert('Kendaraan tidak sedang diparkiran!'); window.history.back();</script>";
		}
	}

	public function cek_lokasi_parkir($plat_nomor) {
		$sql = "SELECT tb_gedung.nama_gedung, tb_parkir.nomor_tempat FROM tb_parkir JOIN tb_gedung ON tb_parkir.id_gedung=tb_gedung.id_gedung AND tb_parkir.plat_nomor='$plat_nomor' LIMIT 1";
		$query = mysqli_query($this->host, $sql);
		$data = mysqli_fetch_array($query);

		return $data;
	}

	public function parkir_tersedia() {
		$qryGedung = mysqli_query($this->host, "SELECT id_gedung, nama_gedung, kuota FROM tb_gedung WHERE terisi<kuota ORDER BY id_gedung ASC LIMIT 1");
		$hasilGedung = mysqli_num_rows($qryGedung);

		if ($hasilGedung==0) {
			$hasil['id_gedung'] = 0;
			$hasil['nomor_tempat'] = 0;
			$hasil['nama_gedung'] = 0;
		} else {
			$dataGedung = mysqli_fetch_array($qryGedung);
			$id_gedung = $dataGedung['id_gedung'];

			for ($i=1; $i <= $dataGedung['kuota']; $i++) { 	
				$qryNomor = mysqli_query($this->host, "SELECT nomor_tempat FROM tb_parkir WHERE id_gedung='$id_gedung' AND nomor_tempat='$i' ORDER BY nomor_tempat ASC LIMIT 1");
				$status = mysqli_num_rows($qryNomor);
				if($status==0) {
					$nomor_tersedia=$i; 
					break;
				}
			}

			$hasil['id_gedung'] = $id_gedung;
			$hasil['nama_gedung'] = $dataGedung['nama_gedung'];
			$hasil['nomor_tempat'] = $nomor_tersedia;
		}

		return $hasil;
	}

	public function cek_parkir($gedung, $nomor)	{
		$sql = "SELECT nomor_tempat FROM tb_parkir WHERE id_gedung='$gedung' AND nomor_tempat='$nomor' LIMIT 1";
		$query = mysqli_query($this->host, $sql);
		$status = mysqli_num_rows($query);
		return $status;
	}

	public function tampil_history_parkir()	{
		$sql = "SELECT * FROM tb_history_parkir";
		$query = mysqli_query($this->host, $sql);

		while ($data = mysqli_fetch_array($query)) {
			$row[] = $data;
		}

		return $row;
	}

	public function tampil_history_parkir_2($plat)	{
		$sql = "SELECT * FROM tb_history_parkir WHERE plat_nomor LIKE '%$plat%'";
		$query = mysqli_query($this->host, $sql);

		while ($data = mysqli_fetch_array($query)) {
			$row[] = $data;
		}

		return $row;
	}

	public function cek_biaya($plat_nomor) {
		$sql = "SELECT * FROM tb_history_parkir WHERE plat_nomor='$plat_nomor' ORDER BY waktu_masuk DESC LIMIT 1";
		$query = mysqli_query($this->host, $sql);
		$data = mysqli_fetch_array($query);
		return $data;
	}

	// Tarif =================================

	public function tampil_tarif()	{
		$qryAwal = mysqli_query($this->host, "SELECT isi FROM tb_ketentuan WHERE ketentuan='tarif_awal'");
		$dataAwal = mysqli_fetch_array($qryAwal);

		$qryPerJam = mysqli_query($this->host, "SELECT isi FROM tb_ketentuan WHERE ketentuan='tarif_perjam'");
		$dataPerJam = mysqli_fetch_array($qryPerJam);

		$qryMaks = mysqli_query($this->host, "SELECT isi FROM tb_ketentuan WHERE ketentuan='tarif_maks'");
		$dataMaks = mysqli_fetch_array($qryMaks);

		$row[] = $dataAwal['isi'];
		$row[] = $dataPerJam['isi'];
		$row[] = $dataMaks['isi'];

		return $row;
	}

	public function ubah_tarif($hlm_tujuan, $tarif_awal, $tarif_perjam, $tarif_maks)	{
		$qryAwal = mysqli_query($this->host, "UPDATE tb_ketentuan SET isi='$tarif_awal' WHERE ketentuan='tarif_awal'");

		$qryPerJam = mysqli_query($this->host, "UPDATE tb_ketentuan SET isi='$tarif_perjam' WHERE ketentuan='tarif_perjam'");

		$qryMaks = mysqli_query($this->host, "UPDATE tb_ketentuan SET isi='$tarif_maks' WHERE ketentuan='tarif_maks'");

		if ($qryAwal && $qryPerJam && $qryMaks) {
			echo "<script>alert('Data Telah Disimpan'); window.location.href='?page=".$hlm_tujuan."'</script>";	
		} else {
			echo "<script>alert('Gagal Menyimpan!'); window.history.back();</script>";
		}
	}

	// Admin =================================

	public function id_admin_baru() {
		$sql = "SELECT id_akun FROM tb_akun WHERE id_akun LIKE 'ADM%' ORDER BY id_akun DESC";
		$query = mysqli_query($this->host, $sql);
		$result = mysqli_fetch_array($query);
		$id = substr($result['id_akun'], 3) + 1;
		if (strlen($id)==1) {
			$id_baru = '00'.$id;
		} else if (strlen($id)==2) {
			$id_baru = '0'.$id;
		} else {
			$id_baru = $id;
		}
		
		return 'ADM'.$id_baru;
	}

	public function tambah_admin($hlm_tujuan, $nama, $username, $password, $tgl_lahir) {
		$id = $this->id_admin_baru();
		$sql = "INSERT INTO tb_akun(id_akun, username, password, akses) VALUES ('$id','$username', '$password', 1)";
		$query = mysqli_query($this->host, $sql);

		$sql2 = "INSERT INTO tb_detail_admin(id_akun, nama, tgl_lahir) VALUES ('$id','$nama', '$tgl_lahir')";
		$query2 = mysqli_query($this->host, $sql2);

		if ($query && $query2) {
			echo "<script>window.location.href='?page=".$hlm_tujuan."'</script>";	
		} else {
			echo "<script>alert('Username sudah digunakan!'); window.history.back();</script>";
		}
	}

	public function ubah_admin($hlm_tujuan, $id, $nama, $username, $password, $tgl_lahir) {
		$sql = "UPDATE tb_akun SET username = '$username',
								password = '$password'
								WHERE id_akun = '$id'";
		$sql2 = "UPDATE tb_detail_admin SET nama = '$nama',
								tgl_lahir = '$tgl_lahir'
								WHERE id_akun='$id'";

		$query = mysqli_query($this->host, $sql);
		$query2 = mysqli_query($this->host, $sql2);

		if ($query && $query2) {
			if ($id==$_SESSION['id_akun']) {
				$_SESSION['nama'] = $nama;
				$_SESSION['username'] = $username;
			} 			
			echo "<script>window.location.href='?page=".$hlm_tujuan."'</script>";	
		} else {
			echo "<script>alert('Username sudah digunakan!'); window.history.back();</script>";
		}
	}

	public function tampil_admin($username) {
		$sql = "SELECT * FROM tb_akun JOIN tb_detail_admin ON tb_akun.id_akun=tb_detail_admin.id_akun AND tb_akun.akses=1 AND tb_akun.username!='$username'";
		$query = mysqli_query($this->host, $sql);

		while ($data = mysqli_fetch_array($query)) {
			$row[] = $data;
		}

		return $row;
	}

	public function tampil_admin_id($id) {
		$sql = "SELECT * FROM tb_akun JOIN tb_detail_admin ON tb_akun.id_akun=tb_detail_admin.id_akun WHERE tb_akun.username='$id'";
		$query = mysqli_query($this->host, $sql);

		while ($data = mysqli_fetch_array($query)) {
			$row[] = $data;
		}

		return $row;
	}

	public function hapus_admin($hlm_tujuan, $id) {
		$sql = "DELETE FROM tb_akun WHERE id_akun='$id'";
		$query = mysqli_query($this->host, $sql);

		if ($query) {
			echo "<script>window.location.href='?page=".$hlm_tujuan."'</script>";	
		} else {
			echo "<script>alert('Gagal Menghapus!'); window.history.back();</script>";
		}
	}

	// Grafik =================================
	public function banyak_parkir($bulan) {
		$sql = "SELECT COUNT(*) AS jml FROM tb_history_parkir WHERE MONTH(waktu_masuk)='$bulan'";
		$query = mysqli_query($this->host, $sql);
		$data = mysqli_fetch_array($query);
		return $data['jml'];
	}


	// User =================================

	public function tambah_user($hlm_tujuan, $plat_nomor) {
		$sql = "INSERT INTO tb_akun(id_akun, username, password, akses) VALUES ('$plat_nomor','$plat_nomor', '$plat_nomor', 0)";
		$query = mysqli_query($this->host, $sql);

		if ($query) {
			echo "<script>window.location.href='?page=".$hlm_tujuan."'</script>";	
		} else {
			echo "<script>alert('Nomor Kendaraan sudah ada!'); window.history.back();</script>";
		}
	}

	public function ubah_user($hlm_tujuan, $plat_nomor, $username, $password) {
		$sql = "UPDATE tb_akun SET username = '$username',
								password = '$password'
								WHERE id_akun = '$plat_nomor'";

		$query = mysqli_query($this->host, $sql);

		if ($query) {
			if ($plat_nomor==$_SESSION['id_akun']) {
				$_SESSION['username'] = $username;
			} 			
			echo "<script>window.location.href='?page=".$hlm_tujuan."'</script>";	
		} else {
			echo "<script>alert('Username sudah digunakan!'); window.history.back();</script>";
		}
	}

	public function tampil_user() {
		$sql = "SELECT * FROM tb_akun WHERE akses=0";
		$query = mysqli_query($this->host, $sql);

		while ($data = mysqli_fetch_array($query)) {
			$row[] = $data;
		}

		return $row;
	}

	public function tampil_user_id($plat_nomor) {
		$sql = "SELECT * FROM tb_akun WHERE id_akun='$plat_nomor'";
		$query = mysqli_query($this->host, $sql);

		while ($data = mysqli_fetch_array($query)) {
			$row[] = $data;
		}

		return $row;
	}

	public function hapus_user($hlm_tujuan, $plat_nomor) {
		$sql = "DELETE FROM tb_akun WHERE id_akun='$plat_nomor'";
		$query = mysqli_query($this->host, $sql);

		if ($query) {
			echo "<script>window.location.href='?page=".$hlm_tujuan."'</script>";	
		} else {
			echo "<script>alert('Gagal Menghapus!'); window.history.back();</script>";
		}
	}

	// Gedung =================================

	public function tambah_gedung($hlm_tujuan, $nama_gedung, $kuota) {
		$sql = "INSERT INTO tb_gedung (nama_gedung, kuota) VALUES ('$nama_gedung', '$kuota')";
		$query = mysqli_query($this->host, $sql);

		if ($query) {
			echo "<script>window.location.href='?page=".$hlm_tujuan."'</script>";	
		} else {
			echo "<script>alert('Gagal menambah data!'); window.history.back();</script>";
		}
	}

	public function ubah_gedung($hlm_tujuan, $id_gedung, $nama_gedung, $kuota) {
		$sql = "UPDATE tb_gedung SET nama_gedung = '$nama_gedung',
								kuota = '$kuota'
								WHERE id_gedung = '$id_gedung'";

		$query = mysqli_query($this->host, $sql);

		if ($query) {
			echo "<script>window.location.href='?page=".$hlm_tujuan."'</script>";	
		} else {
			echo "<script>alert('Gagal mengubah data!'); window.history.back();</script>";
		}
	}

	public function tampil_gedung() {
		$sql = "SELECT *, (kuota-terisi) as sisa FROM tb_gedung";
		$query = mysqli_query($this->host, $sql);

		while ($data = mysqli_fetch_array($query)) {
			$row[] = $data;
		}

		return $row;
	}

	public function tampil_gedung_id($id) {
		$sql = "SELECT * FROM tb_gedung WHERE id_gedung='$id'";
		$query = mysqli_query($this->host, $sql);

		while ($data = mysqli_fetch_array($query)) {
			$row[] = $data;
		}

		return $row;
	}

	public function hapus_gedung($hlm_tujuan, $id) {
		$sql = "DELETE FROM tb_gedung WHERE id_gedung='$id'";
		$query = mysqli_query($this->host, $sql);

		if ($query) {
			echo "<script>window.location.href='?page=".$hlm_tujuan."'</script>";	
		} else {
			echo "<script>alert('Gagal Menghapus!'); window.history.back();</script>";
		}
	}

}



?>