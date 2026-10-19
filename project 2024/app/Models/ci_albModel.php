<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ci_pesertaModel;

class ci_albModel extends Model
{
    protected $table = 'ci_alb2024';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'no_alb', 'password', 'status', 'jenis', 'id_role', 'nama', 'tempat_lahir',
        'tgl_lahir', 'alamat_tinggal', 'alamat_kantor', 'lokasi_magang', 'universitas',
        'no_tlp', 'no_ktp', 'email', 'id_pengwil', 'id_pengda', 'sertifikat_peningkatan',
        'sk_perpanjangan', 'sertifikat_protokol', 'no_sk', 'sk_jabatan', 'tanggal_sk', 'no_bas',
        'bas_jabatan', 'tanggal_bas', 'ket_alb', 'rek_pengda', 'foto', 'ijasah', 'transkrip',
        'foto_ktp', 'sertifikat_dasar_1', 'sertifikat_dasar_2', 'uang_pangkal', 'sertifikat_kode_etik'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $ci_pesertaModel;
    var $folder_public;

    public function __construct()
    {
        parent::__construct();
        $this->folder_public = 'public_html';
        $this->ci_pesertaModel = new ci_pesertaModel();
    }
    public function getUserDetail($data)
    {
        $result = $this->where(['email' => $data['tbemail'], 'password' => md5($data['tbpass'])])->first();
        return $result;
    }
    public function getUserDetailById($data)
    {
        return $this->select('id_user,no_alb,password,status,jenis,id_role,nama,tempat_lahir,
        tgl_lahir,alamat_tinggal,alamat_kantor,lokasi_magang,universitas,no_tlp,no_ktp,email,ci_alb2024.id_pengwil,ci_pengwil.pengwil,
        ci_alb2024.id_pengda,ci_pengda.pengda,sertifikat_peningkatan,sk_perpanjangan,sertifikat_protokol,no_sk,sk_jabatan,
        tanggal_sk,no_bas,bas_jabatan,tanggal_bas,ket_alb,rek_pengda,foto,ijasah,transkrip,foto_ktp,
        uang_pangkal,ci_alb2024.created_at')
            ->join('ci_pengda', 'ci_alb2024.id_pengda = ci_pengda.id_pengda and ci_alb2024.id_pengwil = ci_pengda.id_pengwil', 'left')
            ->join('ci_pengwil', 'ci_alb2024.id_pengwil = ci_pengwil.id_pengwil', 'left')
            ->where(['id_user' => $data])->first();
    }
    public function getUserMenu($data)
    {
        $result = $this->join('ci_role', 'ci_alb2024.id_role = ci_role.id_role', 'left')
            ->join('ci_role_menu', 'ci_alb2024.id_role = ci_role_menu.id_role', 'left')
            ->join('ci_menu', 'ci_role_menu.id_menu = ci_menu.id_menu', 'left')
            ->where(['email' => $data['tbemail'], 'password' => md5($data['tbpass'])])
            ->orderBy('ci_menu.root_id', 'DESC')
            ->findAll();
        return $result;
    }
    public function getAnggotaMin($ktp = '', $nama = '', $pengda = '', $status = '')
    {
        if ($ktp == '' && $nama == '' && $status == '2') {
            $result = $this->join('ci_pengda', 'ci_alb2024.id_pengda = ci_pengda.id_pengda')
                ->join('ci_pengwil', 'ci_alb2024.id_pengwil = ci_pengwil.id_pengwil AND ci_pengda.id_pengwil = ci_pengwil.id_pengwil')
                ->where("(concat(ci_alb2024.id_pengwil,ci_alb2024.id_pengda) = '$pengda' OR '$pengda'=0) AND ci_alb2024.jenis in ('anggota','senior')")
                ->orderBy('id_user', 'DESC')
                ->findAll(10);
            return $result;
        } else {
            $result = $this->join('ci_pengda', 'ci_alb2024.id_pengda = ci_pengda.id_pengda')
                ->join('ci_pengwil', 'ci_alb2024.id_pengwil = ci_pengwil.id_pengwil AND ci_pengda.id_pengwil = ci_pengwil.id_pengwil')
                ->where("(concat(ci_alb2024.id_pengwil,ci_alb2024.id_pengda) = '$pengda' OR '$pengda'=0) AND ci_alb2024.jenis in ('anggota','senior') AND ci_alb2024.no_ktp LIKE '%$ktp%' AND ci_alb2024.nama LIKE '%$nama%' AND (ci_alb2024.status = '$status' OR $status = '2')")
                ->orderBy('id_user', 'DESC')
                ->findAll();
            return $result;
        }
    }
    public function getAnggotaPelatihan($ktp = '', $nama = '', $pelatihan = '', $jenis = '')
    {
        if ($ktp == '' && $nama == '' && $pelatihan == '0' && $jenis == '0') {
            $result = $this->join('ci_pengda', 'ci_alb2024.id_pengda = ci_pengda.id_pengda AND ci_alb2024.id_pengwil = ci_pengda.id_pengwil', 'left')
                ->join('ci_pengwil', 'ci_pengda.id_pengwil = ci_pengwil.id_pengwil', 'left')
                ->join('ci_peserta', 'ci_alb2024.id_user = ci_peserta.id_user')
                ->join('ci_pelatihan', 'ci_peserta.id_pelatihan = ci_pelatihan.id_pelatihan')
                ->orderBy('ci_alb2024.id_user', 'DESC')
                ->findAll(10);
            return $result;
        } else {
            $result = $this->join('ci_pengda', 'ci_alb2024.id_pengda = ci_pengda.id_pengda AND ci_alb2024.id_pengwil = ci_pengda.id_pengwil', 'left')
                ->join('ci_pengwil', 'ci_pengda.id_pengwil = ci_pengwil.id_pengwil', 'left')
                ->join('ci_peserta', 'ci_alb2024.id_user = ci_peserta.id_user')
                ->join('ci_pelatihan', 'ci_peserta.id_pelatihan = ci_pelatihan.id_pelatihan')
                ->where("ci_alb2024.no_ktp LIKE '%$ktp%' AND ci_alb2024.nama LIKE '%$nama%' AND (ci_peserta.id_pelatihan = '$pelatihan' OR '$pelatihan' = '0') AND (ci_alb2024.jenis = '$jenis' OR '$jenis' = '0')")
                ->orderBy('ci_alb2024.id_user', 'DESC')
                ->findAll();
            return $result;
        }
    }
    public function getAnggotaRole($ktp = '', $nama = '')
    {
        if ($ktp == '' && $nama == '') {
            $result = $this->where("ci_alb2024.no_ktp LIKE '%$ktp%' AND ci_alb2024.nama LIKE '%$nama%' AND ci_alb2024.id_user <> 1")
                ->join('ci_role', 'ci_alb2024.id_role = ci_role.id_role', 'left')
                ->findAll(10);
            return $result;
        } else {
            $result = $this->where("ci_alb2024.no_ktp LIKE '%$ktp%' AND ci_alb2024.nama LIKE '%$nama%' AND ci_alb2024.id_user <> 1")
                ->join('ci_role', 'ci_alb2024.id_role = ci_role.id_role', 'left')
                ->orderBy('id_user', 'DESC')
                ->findAll();
            return $result;
        }
    }
    public function getWredaMin($ktp = '', $nama = '', $pengda = '', $status = '')
    {
        if ($ktp == '' && $nama == '' && $pengda == 0 && $status == '2') {
            $result = $this->join('ci_pengda', 'ci_alb2024.id_pengda = ci_pengda.id_pengda', 'left')
                ->join('ci_pengwil', 'ci_alb2024.id_pengwil = ci_pengwil.id_pengwil AND ci_pengda.id_pengwil = ci_pengwil.id_pengwil', 'left')
                ->where("ci_alb2024.jenis = 'wreda'")
                ->orderBy('id_user', 'DESC')
                ->findAll(10);
            return $result;
        } else {
            $result = $this->join('ci_pengda', 'ci_alb2024.id_pengda = ci_pengda.id_pengda', 'left')
                ->join('ci_pengwil', 'ci_alb2024.id_pengwil = ci_pengwil.id_pengwil AND ci_pengda.id_pengwil = ci_pengwil.id_pengwil', 'left')
                ->where("(concat(ci_alb2024.id_pengwil,ci_alb2024.id_pengda) = '$pengda' OR '$pengda'=0)  AND ci_alb2024.jenis = 'wreda' AND ci_alb2024.no_ktp LIKE '%$ktp%' AND ci_alb2024.nama LIKE '%$nama%' AND (ci_alb2024.status = '$status' OR $status = '2')")
                ->orderBy('id_user', 'DESC')
                ->findAll();
            return $result;
        }
    }
    public function getAlbMin($ktp = '', $nama = '', $status = '', $from = "", $to = "")
    {
        if ($from == "") {
            $from = date("Y-01-01");
        }
        if ($to == "") {
            $to = date("Y-m-d");
        }
        $to = date('Y-m-d', strtotime($to . ' + 1 days'));
        if ($ktp == '' && $nama == '' && $status == '2') {
            $result = $this->where("ci_alb2024.jenis = 'alb' AND ci_alb2024.created_at >= '$from' AND ci_alb2024.created_at <= '$to'")
                ->orderBy('no_alb', 'ASC')
                ->findAll(10);
            return $result;
        } else {
            $result = $this->where("ci_alb2024.jenis = 'alb' AND ci_alb2024.no_ktp LIKE '%$ktp%' AND ci_alb2024.nama LIKE '%$nama%' AND (ci_alb2024.status = '$status' OR $status = '2') AND ci_alb2024.created_at >= '$from' AND ci_alb2024.created_at <= '$to' ")
                ->orderBy('no_alb', 'ASC')
                ->findAll();
            return $result;
        }
    }
    public function getAlbcnt()
    {
        $result = $this->selectCount('id_user')
            ->where("jenis = 'alb' AND status = '1' ")
            ->findAll();
        return $result[0]['id_user'];
    }
    public function getAnggotacnt()
    {
        $result = $this->selectCount('id_user')
            ->where("jenis in ('anggota','senior') AND status = '1' ")
            ->findAll();
        return $result[0]['id_user'];
    }
    public function getWredacnt()
    {
        $result = $this->selectCount('id_user')
            ->where("jenis = 'wreda' AND status = '1' ")
            ->findAll();
        return $result[0]['id_user'];
    }
    public function getAlb($ktp = '', $nama = '', $status = '', $from = "", $to = "")
    {
        if ($from == "") {
            $from = date("Y-01-01 00:00:00");
        }
        if ($to == "") {
            $to = date("Y-m-d");
        }
        $to = date('Y-m-d', strtotime($to . ' + 1 days'));
        if ($ktp == '' && $nama == '' && $status == '2') {
            $result = $this->where("ci_alb2024.jenis = 'alb' AND ci_alb2024.created_at >= '$from' AND ci_alb2024.created_at <= '$to'")
                ->orderBy('no_alb', 'ASC')
                ->findAll();
            return $result;
        } else {
            $result = $this->where("ci_alb2024.jenis = 'alb' AND ci_alb2024.no_ktp LIKE '%$ktp%' AND ci_alb2024.nama LIKE '%$nama%' AND (ci_alb2024.status = '$status' OR $status = '2') AND ci_alb2024.created_at >= '$from' AND ci_alb2024.created_at <= '$to' ")
                ->orderBy('no_alb', 'ASC')
                ->findAll();
            return $result;
        }
    }
    public function getAlbbyId($id = '')
    {
        $result = $this->where("ci_alb2024.jenis = 'alb' AND id_user = '$id' AND ci_alb2024.status = '1'")
            ->first();
        return $result;
    }
    public function getAlbbyNo($noalb = '')
    {
        $result = $this->where("ci_alb2024.jenis = 'alb' AND CONCAT(DATE_FORMAT(ci_alb2024.created_at, '%Y.%m'),'.',ci_alb2024.no_alb) = '$noalb' AND ci_alb2024.status = '1'")
            ->orderBy('no_alb', 'ASC')
            ->first();
        return $result;
    }
    public function getAnggotabyId($id = '')
    {
        $result = $this->where("ci_alb2024.jenis = 'anggota' AND id_user = '$id' AND ci_alb2024.status = '1'")
            ->first();
        return $result;
    }
    public function getAnggotabyNo($noanggota = '')
    {
        $result = $this->where("ci_alb2024.jenis = 'anggota' AND concat(id_pengwil,'.',id_pengda,'.',no_alb) = '$noanggota' AND ci_alb2024.status = '1'")
            ->orderBy('no_alb', 'ASC')
            ->first();
        return $result;
    }
    public function getALByear()
    {
        $result = $this->select('YEAR(created_at) as tahun')
            ->distinct()
            ->findAll();
        return $result;
    }
    public function addWredaFull($data, $file)
    {

        $sql = "insert into ci_alb2024 (`no_alb`,`status`,`jenis`,`id_role`,`nama`,
        `tempat_lahir`,`tgl_lahir`,`alamat_kantor`,`no_tlp`,`no_ktp`,`email`,`password`,
        `id_pengwil`,`id_pengda`,`foto`,`created_at`) 
        select IFNULL(LPAD(max(no_alb)+1,5,'0'),'00001'),1,'wreda',5,?,?,?,?,?,?,?,?,?,?,?,NOW() from ci_alb2024 where jenis in ('anggota','senior','wreda')";

        $this->query($sql, [
            $data['tbnama'], $data['tbtempatlahir'], $data['tbtgllahir'], $data['tbalamatkantor'],
            $data['tbtlp'], $data['tbnoktp'], $data['tbemail'], md5($data['tbpass']),
            substr($data['cbpengda'], 0, 2), substr($data['cbpengda'], 2, 2),
            $file['fphoto']['name']
        ]);
        $id = $this->insertID();
        if ($file['fphoto']['error'] == 0) {
            if (file_exists('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fphoto']['tmp_name'], '../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
        }

        return $id;
    }
    public function addAnggota($data, $file)
    {
        $sql = "insert into ci_alb2024 (`no_alb`,`status`,`jenis`,`id_role`,`nama`,
        `tempat_lahir`,`tgl_lahir`,`alamat_tinggal`,`alamat_kantor`,`no_tlp`,`no_ktp`,`email`,`password`,
        `id_pengwil`,`id_pengda`,`no_sk`,`sk_jabatan`,`tanggal_sk`,`no_bas`,`bas_jabatan`,`tanggal_bas`,
        `rek_pengda`,`foto`,`created_at`) 
        select IFNULL(LPAD(max(no_alb)+1,5,'0'),'00001'),0,'anggota',4,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW() from ci_alb2024 where jenis in ('anggota','senior','wreda')";

        $this->query($sql, [
            $data['tbnama'], $data['tbtempatlahir'], $data['tbtgllahir'], $data['tbalamat'],
            $data['tbalamatkantor'], $data['tbtlp'], $data['tbnoktp'], $data['tbemail'], md5($data['tbpass']),
            substr($data['cbpengda'], 0, 2), substr($data['cbpengda'], 2, 2), $data['tbnosk'], $file['fskjabatan']['name'],
            $data['tbtglsk'], $data['tbnobas'], $file['fbasjabatan']['name'], $data['tbtglbas'],
            $file['frekpengda']['name'], $file['fphoto']['name']
        ]);
        $id = $this->insertID();
        if ($file['fphoto']['error'] == 0) {
            if (file_exists('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fphoto']['tmp_name'], '../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
        }
        if ($file['fskjabatan']['error'] == 0) {
            if (file_exists('../' . $this->folder_public . '/img/sk/' . $id . '.' . pathinfo($file['fskjabatan']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/sk/' . $id . '.' . pathinfo($file['fskjabatan']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/sk/' . $id . '.' . pathinfo($file['fskjabatan']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fskjabatan']['tmp_name'], '../' . $this->folder_public . '/img/sk/' . $id . '.' . pathinfo($file['fskjabatan']['name'], PATHINFO_EXTENSION));
        }
        if ($file['fbasjabatan']['error'] == 0) {
            if (file_exists('../' . $this->folder_public . '/img/bas/' . $id . '.' . pathinfo($file['fbasjabatan']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/bas/' . $id . '.' . pathinfo($file['fbasjabatan']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/bas/' . $id . '.' . pathinfo($file['fbasjabatan']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fbasjabatan']['tmp_name'], '../' . $this->folder_public . '/img/bas/' . $id . '.' . pathinfo($file['fbasjabatan']['name'], PATHINFO_EXTENSION));
        }
        if ($file['frekpengda']['error'] == 0) {
            if (file_exists('../' . $this->folder_public . '/img/pengda/' . $id . '.' . pathinfo($file['frekpengda']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/pengda/' . $id . '.' . pathinfo($file['frekpengda']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/pengda/' . $id . '.' . pathinfo($file['frekpengda']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['frekpengda']['tmp_name'], '../' . $this->folder_public . '/img/pengda/' . $id . '.' . pathinfo($file['frekpengda']['name'], PATHINFO_EXTENSION));
        }

        return $this->db->affectedRows();
    }

    public function insertDataTabelPertama($data)
    {
        $this->db->insertId('tabel_pertama', $data);
        return $this->db->insertId(); // Mengembalikan ID data yang baru saja disimpan
    }
    public function addalb(/*$data,*/$file)
    {
        /*$sql = "insert into `ci_alb2024` (`no_alb`,`status`,`jenis`,`id_role`,`nama`,
        `tempat_lahir`,`tgl_lahir`,`alamat_tinggal`,`lokasi_magang`,`universitas`,`no_tlp`,`no_ktp`,`email`,`password`,
        `foto`,`ijazah_s1`,`ijazah_s2`,`transkrip`,`foto_ktp`,`created_at`) 
        select IFNULL(LPAD(max(no_alb)+1,5,'0'),'00001'),0,'alb',7,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW() from `ci_alb2024` where jenis='alb'";
        $this->query($sql, [
            $data['tbnama'], $data['tbtempatlahir'], $data['tbtgllahir'], $data['tbalamat'],
            $data['tblokasimagang'], $data['tblokasisarjanah'], $data['tbtlp'], $data['tbnoktp'], $data['tbemail'],
            md5($data['tbpass']), $file['fphoto']['name'], $file['fijazahs1']['name'], $file['fijazahs2']['name'], $file['ftranskript']['name'],
            $file['ffotoktp']['name']
        ]);*/
        $id = $this->insertID();
        $this->ci_pesertaModel->addPeserta($id, '19');
        $this->ci_pesertaModel->addPeserta($id, '20');
        $this->ci_pesertaModel->addPeserta($id, '21');
        if ($file['fphoto']['error'] == 0) {
            if (file_exists('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fphoto']['tmp_name'], '../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
        }
        if ($file['fijazahs1']['error'] == 0) {
            if (file_exists('../' . $this->folder_public . '/img/ijazahs1/' . $id . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ijazahs1/' . $id . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ijazahs1/' . $id . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fijazahs1']['tmp_name'], '../' . $this->folder_public . '/img/ijazahs1/' . $id . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION));
        }
        if ($file['fijazahs2']['error'] == 0) {
            if (file_exists('../' . $this->folder_public . '/img/ijazahs2/' . $id . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ijazahs2/' . $id . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ijazahs2/' . $id . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fijazahs2']['tmp_name'], '../' . $this->folder_public . '/img/ijazahs2/' . $id . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION));
        }
        if ($file['ftranskript']['error'] == 0) {
            if (file_exists('../' . $this->folder_public . '/img/transkript/' . $id . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/transkript/' . $id . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/transkript/' . $id . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['ftranskript']['tmp_name'], '../' . $this->folder_public . '/img/transkript/' . $id . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION));
        }
        if ($file['ffotoktp']['error'] == 0) {
            if (file_exists('../' . $this->folder_public . '/img/ktp/' . $id . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ktp/' . $id . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ktp/' . $id . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['ffotoktp']['tmp_name'], '../' . $this->folder_public . '/img/ktp/' . $id . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION));
        }
        /*
        if ($file['fuangpangkal']['error'] == 0) {
            if (file_exists('../' . $this->folder_public . '/img/uangpangkal/' . $id . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/uangpangkal/' . $id . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/uangpangkal/' . $id . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fuangpangkal']['tmp_name'], '../' . $this->folder_public . '/img/uangpangkal/' . $id . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION));
        }*/

        return $this->db->affectedRows();
    }



    public function addsenior($data, $file)
    {
        $lama = $this->getUserDetailById($data['tbid']);
        if ($file['fsertifikat']['error'] == 0) {
            $fsertifikat = $file['fsertifikat']['name'];
            if (file_exists('../' . $this->folder_public . '/img/sertifikatkualitas/' . $data['tbid'] . '.' . pathinfo($file['fsertifikat']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/sertifikatkualitas/' . $data['tbid'] . '.' . pathinfo($file['fsertifikat']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/sertifikatkualitas/' . $data['tbid'] . '.' . pathinfo($file['fsertifikat']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fsertifikat']['tmp_name'], '../' . $this->folder_public . '/img/sertifikatkualitas/' . $data['tbid'] . '.' . pathinfo($file['fsertifikat']['name'], PATHINFO_EXTENSION));
        } else {
            $fsertifikat = $lama['sertifikat_peningkatan'];
        }
        if ($file['fskperpanjang']['error'] == 0) {
            $fskperpanjang = $file['fskperpanjang']['name'];
            if (file_exists('../' . $this->folder_public . '/img/skperpanjang/' . $data['tbid'] . '.' . pathinfo($file['fskperpanjang']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/skperpanjang/' . $data['tbid'] . '.' . pathinfo($file['fskperpanjang']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/skperpanjang/' . $data['tbid'] . '.' . pathinfo($file['fskperpanjang']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fskperpanjang']['tmp_name'], '../' . $this->folder_public . '/img/skperpanjang/' . $data['tbid'] . '.' . pathinfo($file['fskperpanjang']['name'], PATHINFO_EXTENSION));
        } else {
            $fskperpanjang = $lama['sk_perpanjangan'];
        }

        $dataup = [
            'sertifikat_peningkatan' => $fsertifikat,
            'sk_perpanjangan' => $fskperpanjang,
            'jenis' => 'senior',
            'status' => 0,
            'id_role' => 6
        ];
        $result = $this->update($data['tbid'], $dataup);
        if ($result) {
            $return = $this->getUserDetailById($data['tbid']);
        } else {
            $return = 'Update gagal';
        }
        return $return;
    }
    public function addwreda($data, $file)
    {
        $lama = $this->getUserDetailById($data['tbid']);
        if ($file['fsertifikat']['error'] == 0) {
            $fsertifikat = $file['fsertifikat']['name'];
            if (file_exists('../' . $this->folder_public . '/img/sertifikatprotokol/' . $data['tbid'] . '.' . pathinfo($file['fsertifikat']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/sertifikatprotokol/' . $data['tbid'] . '.' . pathinfo($file['fsertifikat']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/sertifikatprotokol/' . $data['tbid'] . '.' . pathinfo($file['fsertifikat']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fsertifikat']['tmp_name'], '../' . $this->folder_public . '/img/sertifikatprotokol/' . $data['tbid'] . '.' . pathinfo($file['fsertifikat']['name'], PATHINFO_EXTENSION));
        } else {
            $fsertifikat = $lama['sertifikat_protokol'];
        }

        $dataup = [
            'sertifikat_protokol' => $fsertifikat,
            'jenis' => 'wreda',
            'status' => 0,
            'id_role' => 5
        ];

        $result = $this->update($data['tbid'], $dataup);
        if ($result) {
            $return = $this->getUserDetailById($data['tbid']);
        } else {
            $return = 'Update gagal';
        }
        return $return;
    }
    public function updateALB($data, $file)
    {
        $lama = $this->getUserDetailById($data['tbid']);
        if ($file['fphoto']['error'] == 0) {
            $fphoto = $file['fphoto']['name'];
            if (file_exists('../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fphoto']['tmp_name'], '../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
        } else {
            $fphoto = $lama['foto'];
        }
        if ($file['fijazah']['error'] == 0) {
            $fijazah = $file['fijazah']['name'];
            if (file_exists('../' . $this->folder_public . '/img/ijazah/' . $data['tbid'] . '.' . pathinfo($file['fijazah']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ijazah/' . $data['tbid'] . '.' . pathinfo($file['fijazah']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ijazah/' . $data['tbid'] . '.' . pathinfo($file['fijazah']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fijazah']['tmp_name'], '../' . $this->folder_public . '/img/ijazah/' . $data['tbid'] . '.' . pathinfo($file['fijazah']['name'], PATHINFO_EXTENSION));
        } else {
            $fijazah = $lama['ijasah'];
        }
        if ($file['ftranskript']['error'] == 0) {
            $ftranskript = $file['ftranskript']['name'];
            if (file_exists('../' . $this->folder_public . '/img/transkript/' . $data['tbid'] . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/transkript/' . $data['tbid'] . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/transkript/' . $data['tbid'] . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['ftranskript']['tmp_name'], '../' . $this->folder_public . '/img/transkript/' . $data['tbid'] . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION));
        } else {
            $ftranskript = $lama['transkrip'];
        }
        if ($file['ffotoktp']['error'] == 0) {
            $ffotoktp = $file['ffotoktp']['name'];
            if (file_exists('../' . $this->folder_public . '/img/ktp/' . $data['tbid'] . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ktp/' . $data['tbid'] . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ktp/' . $data['tbid'] . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['ffotoktp']['tmp_name'], '../' . $this->folder_public . '/img/ktp/' . $data['tbid'] . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION));
        } else {
            $ffotoktp = $lama['foto_ktp'];
        }
        if ($file['fuangpangkal']['error'] == 0) {
            $fuangpangkal = $file['fuangpangkal']['name'];
            if (file_exists('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fuangpangkal']['tmp_name'], '../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION));
        } else {
            $fuangpangkal = $lama['uang_pangkal'];
        }

        $dataup = [
            'nama' => $data['tbnama'],
            'tempat_lahir' => $data['tbtempatlahir'],
            'tgl_lahir' => $data['tbtgllahir'],
            'alamat_tinggal' => $data['tbalamat'],
            'lokasi_magang' => $data['tblokasimagang'],
            'universitas' => $data['tblokasisarjanah'],
            'no_tlp' => $data['tbtlp'],
            'no_ktp' => $data['tbnoktp'],
            'email' => $data['tbemail'],
            'password' => md5($data['tbpass']),
            'foto' => $fphoto,
            'ijasah' => $fijazah,
            'transkrip' => $ftranskript,
            'foto_ktp' => $ffotoktp,
            'uang_pangkal' => $fuangpangkal,
            'id_user' => $data['tbid']
        ];
        $result = $this->update($data['tbid'], $dataup);
        if ($result) {
            $return = $this->getUserDetailById($data['tbid']);
        } else {
            $return = 'Update gagal';
        }
        return $return;
    }
    public function updateALBbyid($data, $file)
    {
        $lama = $this->getUserDetailById($data['tbid']);
        if ($file['fphoto']['error'] == 0) {
            $fphoto = $file['fphoto']['name'];
            if (file_exists('../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fphoto']['tmp_name'], '../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
        } else {
            $fphoto = $lama['foto'];
        }
        if ($file['fijazah']['error'] == 0) {
            $fijazah = $file['fijazah']['name'];
            if (file_exists('../' . $this->folder_public . '/img/ijazah/' . $data['tbid'] . '.' . pathinfo($file['fijazah']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ijazah/' . $data['tbid'] . '.' . pathinfo($file['fijazah']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ijazah/' . $data['tbid'] . '.' . pathinfo($file['fijazah']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fijazah']['tmp_name'], '../' . $this->folder_public . '/img/ijazah/' . $data['tbid'] . '.' . pathinfo($file['fijazah']['name'], PATHINFO_EXTENSION));
        } else {
            $fijazah = $lama['ijasah'];
        }
        if ($file['ftranskript']['error'] == 0) {
            $ftranskript = $file['ftranskript']['name'];
            if (file_exists('../' . $this->folder_public . '/img/transkript/' . $data['tbid'] . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/transkript/' . $data['tbid'] . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/transkript/' . $data['tbid'] . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['ftranskript']['tmp_name'], '../' . $this->folder_public . '/img/transkript/' . $data['tbid'] . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION));
        } else {
            $ftranskript = $lama['transkrip'];
        }
        if ($file['ffotoktp']['error'] == 0) {
            $ffotoktp = $file['ffotoktp']['name'];
            if (file_exists('../' . $this->folder_public . '/img/ktp/' . $data['tbid'] . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ktp/' . $data['tbid'] . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ktp/' . $data['tbid'] . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['ffotoktp']['tmp_name'], '../' . $this->folder_public . '/img/ktp/' . $data['tbid'] . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION));
        } else {
            $ffotoktp = $lama['foto_ktp'];
        }
        if ($file['fuangpangkal']['error'] == 0) {
            $fuangpangkal = $file['fuangpangkal']['name'];
            if (file_exists('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fuangpangkal']['tmp_name'], '../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION));
        } else {
            $fuangpangkal = $lama['uang_pangkal'];
        }
        $password = $lama['password'];
        if ($data['tbpassword'] != "") {
            $password = md5($data['tbpassword']);
        }
        $dataup = [
            'nama' => $data['tbnama'],
            'tempat_lahir' => $data['tbtempatlahir'],
            'tgl_lahir' => $data['tbtgllahir'],
            'alamat_tinggal' => $data['tbalamat'],
            'lokasi_magang' => $data['tblokasimagang'],
            'universitas' => $data['tblokasisarjanah'],
            'no_tlp' => $data['tbtlp'],
            'no_ktp' => $data['tbnoktp'],
            'foto' => $fphoto,
            'ijasah' => $fijazah,
            'transkrip' => $ftranskript,
            'foto_ktp' => $ffotoktp,
            'uang_pangkal' => $fuangpangkal,
            'password' => $password,
            'email' => $data['tbemail'],
            'id_user' => $data['tbid']
        ];
        $result = $this->update($data['tbid'], $dataup);
        if ($result) {
            $return = $this->getUserDetailById($data['tbid']);
        } else {
            $return = 'Update gagal';
        }
        return $return;
    }
    public function updateAnggotabyid($data, $file)
    {
        $lama = $this->getUserDetailById($data['tbid']);
        if ($file['fphoto']['error'] == 0) {
            $fphoto = $file['fphoto']['name'];
            if (file_exists('../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fphoto']['tmp_name'], '../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
        } else {
            $fphoto = $lama['foto'];
        }
        if ($file['fskjabatan']['error'] == 0) {
            $fskjabatan = $file['fskjabatan']['name'];
            if (file_exists('../' . $this->folder_public . '/img/sk/' . $data['tbid'] . '.' . pathinfo($file['fskjabatan']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/sk/' . $data['tbid'] . '.' . pathinfo($file['fskjabatan']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/sk/' . $data['tbid'] . '.' . pathinfo($file['fskjabatan']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fskjabatan']['tmp_name'], '../' . $this->folder_public . '/img/sk/' . $data['tbid'] . '.' . pathinfo($file['fskjabatan']['name'], PATHINFO_EXTENSION));
        } else {
            $fskjabatan = $lama['sk_jabatan'];
        }
        if ($file['fbasjabatan']['error'] == 0) {
            $fbasjabatan = $file['fbasjabatan']['name'];
            if (file_exists('../' . $this->folder_public . '/img/bas/' . $data['tbid'] . '.' . pathinfo($file['fbasjabatan']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/bas/' . $data['tbid'] . '.' . pathinfo($file['fbasjabatan']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/bas/' . $data['tbid'] . '.' . pathinfo($file['fbasjabatan']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fbasjabatan']['tmp_name'], '../' . $this->folder_public . '/img/bas/' . $data['tbid'] . '.' . pathinfo($file['fbasjabatan']['name'], PATHINFO_EXTENSION));
        } else {
            $fbasjabatan = $lama['bas_jabatan'];
        }
        if ($file['fketalb']['error'] == 0) {
            $fketalb = $file['fketalb']['name'];
            if (file_exists('../' . $this->folder_public . '/img/skalb/' . $data['tbid'] . '.' . pathinfo($file['fketalb']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/skalb/' . $data['tbid'] . '.' . pathinfo($file['fketalb']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/skalb/' . $data['tbid'] . '.' . pathinfo($file['fketalb']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fketalb']['tmp_name'], '../' . $this->folder_public . '/img/skalb/' . $data['tbid'] . '.' . pathinfo($file['fketalb']['name'], PATHINFO_EXTENSION));
        } else {
            $fketalb = $lama['ket_alb'];
        }
        if ($file['frekpengda']['error'] == 0) {
            $frekpengda = $file['frekpengda']['name'];
            if (file_exists('../' . $this->folder_public . '/img/pengda/' . $data['tbid'] . '.' . pathinfo($file['frekpengda']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/pengda/' . $data['tbid'] . '.' . pathinfo($file['frekpengda']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/pengda/' . $data['tbid'] . '.' . pathinfo($file['frekpengda']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['frekpengda']['tmp_name'], '../' . $this->folder_public . '/img/pengda/' . $data['tbid'] . '.' . pathinfo($file['frekpengda']['name'], PATHINFO_EXTENSION));
        } else {
            $frekpengda = $lama['rek_pengda'];
        }
        if ($file['fspk']['error'] == 0) {
            $fspk = $file['fspk']['name'];
            if (file_exists('../' . $this->folder_public . '/img/sertifikatkualitas/' . $data['tbid'] . '.' . pathinfo($file['fspk']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/sertifikatkualitas/' . $data['tbid'] . '.' . pathinfo($file['fspk']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/sertifikatkualitas/' . $data['tbid'] . '.' . pathinfo($file['fspk']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fspk']['tmp_name'], '../' . $this->folder_public . '/img/sertifikatkualitas/' . $data['tbid'] . '.' . pathinfo($file['fspk']['name'], PATHINFO_EXTENSION));
        } else {
            $fspk = $lama['sertifikat_peningkatan'];
        }
        if ($file['fskperpanjang']['error'] == 0) {
            $fskperpanjang = $file['fskperpanjang']['name'];
            if (file_exists('../' . $this->folder_public . '/img/skperpanjang/' . $data['tbid'] . '.' . pathinfo($file['fskperpanjang']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/skperpanjang/' . $data['tbid'] . '.' . pathinfo($file['fskperpanjang']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/skperpanjang/' . $data['tbid'] . '.' . pathinfo($file['fskperpanjang']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fskperpanjang']['tmp_name'], '../' . $this->folder_public . '/img/skperpanjang/' . $data['tbid'] . '.' . pathinfo($file['fskperpanjang']['name'], PATHINFO_EXTENSION));
        } else {
            $fskperpanjang = $lama['sk_perpanjangan'];
        }
        $password = $lama['password'];
        if ($data['tbpass'] != "") {
            $password = md5($data['tbpass']);
        }
        $dataup = [
            'nama' => $data['tbnama'],
            'tempat_lahir' => $data['tbtempatlahir'],
            'tgl_lahir' => $data['tbtgllahir'],
            'alamat_tinggal' => $data['tbalamat'],
            'alamat_kantor' => $data['tbalamatkantor'],
            'no_tlp' => $data['tbtlp'],
            'no_ktp' => $data['tbnoktp'],
            'id_pengda' => substr($data['cbpengda'], 2, 2),
            'id_pengwil' => substr($data['cbpengda'], 0, 2),
            'foto' => $fphoto,
            'no_sk' => $data['tbnosk'],
            'sk_jabatan' => $fskjabatan,
            'tanggal_sk' => $data['tbtglsk'],
            'no_bas' => $data['tbnobas'],
            'bas_jabatan' => $fbasjabatan,
            'tanggal_bas' => $data['tbtglbas'],
            'ket_alb' => $fketalb,
            'rek_pengda' => $frekpengda,
            'sertifikat_peningkatan' => $fspk,
            'sk_perpanjangan' => $fskperpanjang,
            'password' => $password,
            'email' => $data['tbemail'],
            'id_user' => $data['tbid']
        ];
        $result = $this->update($data['tbid'], $dataup);
        if ($result) {
            $return = $this->getUserDetailById($data['tbid']);
        } else {
            $return = 'Update gagal';
        }
        return $return;
    }
    public function updateBAS($uid, $file)
    {
        if ($file['fbas']['error'] == 0) {
            $fbas = $file['fbas']['name'];
            if (file_exists('../' . $this->folder_public . '/img/bas/' . $uid . '.' . pathinfo($file['fbas']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/bas/' . $uid . '.' . pathinfo($file['fbas']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/bas/' . $uid . '.' . pathinfo($file['fbas']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fbas']['tmp_name'], '../' . $this->folder_public . '/img/bas/' . $uid . '.' . pathinfo($file['fbas']['name'], PATHINFO_EXTENSION));
            $dataup = [
                'bas_jabatan' => $fbas,
                'id_user' => $uid
            ];

            $result = $this->update($uid, $dataup);
            if ($result) {
                $return = $this->getUserDetailById($uid);
            } else {
                $return = 'Update gagal';
            }
        }
        return $return;
    }
    public function updateSK($uid, $file)
    {
        if ($file['fsk']['error'] == 0) {
            $fsk = $file['fsk']['name'];
            if (file_exists('../' . $this->folder_public . '/img/sk/' . $uid . '.' . pathinfo($file['fsk']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/sk/' . $uid . '.' . pathinfo($file['fsk']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/sk/' . $uid . '.' . pathinfo($file['fsk']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fsk']['tmp_name'], '../' . $this->folder_public . '/img/sk/' . $uid . '.' . pathinfo($file['fsk']['name'], PATHINFO_EXTENSION));
            $dataup = [
                'sk_jabatan' => $fsk,
                'id_user' => $uid
            ];

            $result = $this->update($uid, $dataup);
            if ($result) {
                $return = $this->getUserDetailById($uid);
            } else {
                $return = 'Update gagal';
            }
        }
        return $return;
    }
    public function updateKTP($uid, $file, $post)
    {
        if ($file['fktp']['error'] == 0) {
            $fktp = $file['fktp']['name'];
            if (file_exists('../' . $this->folder_public . '/img/ktp/' . $uid . '.' . pathinfo($file['fktp']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ktp/' . $uid . '.' . pathinfo($file['fktp']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ktp/' . $uid . '.' . pathinfo($file['fktp']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fktp']['tmp_name'], '../' . $this->folder_public . '/img/ktp/' . $uid . '.' . pathinfo($file['fktp']['name'], PATHINFO_EXTENSION));
            $dataup = [
                'no_ktp' => $post['tbnomorktp'],
                'foto_ktp' => $fktp,
                'id_user' => $uid
            ];

            $result = $this->update($uid, $dataup);
            if ($result) {
                $return = $this->getUserDetailById($uid);
            } else {
                $return = 'Update gagal';
            }
        }
        return $return;
    }
    public function updateUserFoto($id, $email, $file)
    {
        $lama = $this->getUserDetailById($id);
        if ($file['fphoto']['error'] == 0) {
            $fphoto = $file['fphoto']['name'];
            if (file_exists('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fphoto']['tmp_name'], '../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
        } else {
            $fphoto = $lama['foto'];
        }
        $dataup = [
            'email' => $email,
            'foto' => $fphoto
        ];
        $result = $this->update($id, $dataup);
        if ($result) {
            $return = $this->getUserDetailById($id);
        } else {
            $return = 'Update gagal';
        }
        return $return;
    }
    public function updateUserPassFoto($id, $email, $pass, $file)
    {
        $lama = $this->getUserDetailById($id);
        if ($file['fphoto']['error'] == 0) {
            $fphoto = $file['fphoto']['name'];
            if (file_exists('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fphoto']['tmp_name'], '../' . $this->folder_public . '/img/foto/' . $id . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
        } else {
            $fphoto = $lama['foto'];
        }
        $dataup = [
            'password' => md5($pass),
            'email' => $email,
            'foto' => $fphoto
        ];
        $result = $this->update($id, $dataup);
        if ($result) {
            $return = $this->getUserDetailById($id);
        } else {
            $return = 'Update gagal';
        }
        return $return;
    }
    public function updateUser($data, $file)
    {
        $lama = $this->getUserDetailById($data['tbid']);
        if ($file['fphoto']['error'] == 0) {
            $fphoto = $file['fphoto']['name'];
            if (file_exists('../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fphoto']['tmp_name'], '../' . $this->folder_public . '/img/foto/' . $data['tbid'] . '.' . pathinfo($file['fphoto']['name'], PATHINFO_EXTENSION));
        } else {
            $fphoto = $lama['foto'];
        }
        if ($file['fskjabatan']['error'] == 0) {
            $fskjabatan = $file['fskjabatan']['name'];
            if (file_exists('../' . $this->folder_public . '/img/sk/' . $data['tbid'] . '.' . pathinfo($file['fskjabatan']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/sk/' . $data['tbid'] . '.' . pathinfo($file['fskjabatan']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/sk/' . $data['tbid'] . '.' . pathinfo($file['fskjabatan']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fskjabatan']['tmp_name'], '../' . $this->folder_public . '/img/sk/' . $data['tbid'] . '.' . pathinfo($file['fskjabatan']['name'], PATHINFO_EXTENSION));
        } else {
            $fskjabatan = $lama['sk_jabatan'];
        }
        if ($file['fbasjabatan']['error'] == 0) {
            $fbasjabatan = $file['fbasjabatan']['name'];
            if (file_exists('../' . $this->folder_public . '/img/bas/' . $data['tbid'] . '.' . pathinfo($file['fbasjabatan']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/bas/' . $data['tbid'] . '.' . pathinfo($file['fbasjabatan']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/bas/' . $data['tbid'] . '.' . pathinfo($file['fbasjabatan']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fbasjabatan']['tmp_name'], '../' . $this->folder_public . '/img/bas/' . $data['tbid'] . '.' . pathinfo($file['fbasjabatan']['name'], PATHINFO_EXTENSION));
        } else {
            $fbasjabatan = $lama['bas_jabatan'];
        }
        if ($file['fketalb']['error'] == 0) {
            $fketalb = $file['fketalb']['name'];
            if (file_exists('../' . $this->folder_public . '/img/skalb/' . $data['tbid'] . '.' . pathinfo($file['fketalb']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/skalb/' . $data['tbid'] . '.' . pathinfo($file['fketalb']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/skalb/' . $data['tbid'] . '.' . pathinfo($file['fketalb']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fketalb']['tmp_name'], '../' . $this->folder_public . '/img/skalb/' . $data['tbid'] . '.' . pathinfo($file['fketalb']['name'], PATHINFO_EXTENSION));
        } else {
            $fketalb = $lama['ket_alb'];
        }
        if ($file['frekpengda']['error'] == 0) {
            $frekpengda = $file['frekpengda']['name'];
            if (file_exists('../' . $this->folder_public . '/img/pengda/' . $data['tbid'] . '.' . pathinfo($file['frekpengda']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/pengda/' . $data['tbid'] . '.' . pathinfo($file['frekpengda']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/pengda/' . $data['tbid'] . '.' . pathinfo($file['frekpengda']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['frekpengda']['tmp_name'], '../' . $this->folder_public . '/img/pengda/' . $data['tbid'] . '.' . pathinfo($file['frekpengda']['name'], PATHINFO_EXTENSION));
        } else {
            $frekpengda = $lama['rek_pengda'];
        }
        if ($file['fijazah']['error'] == 0) {
            $fijazah = $file['fijazah']['name'];
            if (file_exists('../' . $this->folder_public . '/img/ijazah/' . $data['tbid'] . '.' . pathinfo($file['fijazah']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ijazah/' . $data['tbid'] . '.' . pathinfo($file['fijazah']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ijazah/' . $data['tbid'] . '.' . pathinfo($file['fijazah']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fijazah']['tmp_name'], '../' . $this->folder_public . '/img/ijazah/' . $data['tbid'] . '.' . pathinfo($file['fijazah']['name'], PATHINFO_EXTENSION));
        } else {
            $fijazah = $lama['ijasah'];
        }
        if ($file['ftranskript']['error'] == 0) {
            $ftranskript = $file['ftranskript']['name'];
            if (file_exists('../' . $this->folder_public . '/img/transkript/' . $data['tbid'] . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/transkript/' . $data['tbid'] . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/transkript/' . $data['tbid'] . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['ftranskript']['tmp_name'], '../' . $this->folder_public . '/img/transkript/' . $data['tbid'] . '.' . pathinfo($file['ftranskript']['name'], PATHINFO_EXTENSION));
        } else {
            $ftranskript = $lama['transkrip'];
        }
        if ($file['ffotoktp']['error'] == 0) {
            $ffotoktp = $file['ffotoktp']['name'];
            if (file_exists('../' . $this->folder_public . '/img/ktp/' . $data['tbid'] . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ktp/' . $data['tbid'] . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ktp/' . $data['tbid'] . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['ffotoktp']['tmp_name'], '../' . $this->folder_public . '/img/ktp/' . $data['tbid'] . '.' . pathinfo($file['ffotoktp']['name'], PATHINFO_EXTENSION));
        } else {
            $ffotoktp = $lama['foto_ktp'];
        }
        if ($file['fuangpangkal']['error'] == 0) {
            $fuangpangkal = $file['fuangpangkal']['name'];
            if (file_exists('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fuangpangkal']['tmp_name'], '../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION));
        } else {
            $fuangpangkal = $lama['uang_pangkal'];
        }
        if ($file['fspst']['error'] == 0) {
            $fspst = $file['fspst']['name'];
            if (file_exists('../' . $this->folder_public . '/img/sertifikatprotokol/' . $data['tbid'] . '.' . pathinfo($file['fspst']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/sertifikatprotokol/' . $data['tbid'] . '.' . pathinfo($file['fspst']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/sertifikatprotokol/' . $data['tbid'] . '.' . pathinfo($file['fspst']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fspst']['tmp_name'], '../' . $this->folder_public . '/img/sertifikatprotokol/' . $data['tbid'] . '.' . pathinfo($file['fspst']['name'], PATHINFO_EXTENSION));
        } else {
            $fspst = $lama['sertifikat_protokol'];
        }
        if ($file['fspk']['error'] == 0) {
            $fspk = $file['fspk']['name'];
            if (file_exists('../' . $this->folder_public . '/img/sertifikatkualitas/' . $data['tbid'] . '.' . pathinfo($file['fspk']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/sertifikatkualitas/' . $data['tbid'] . '.' . pathinfo($file['fspk']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/sertifikatkualitas/' . $data['tbid'] . '.' . pathinfo($file['fspk']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fspk']['tmp_name'], '../' . $this->folder_public . '/img/sertifikatkualitas/' . $data['tbid'] . '.' . pathinfo($file['fspk']['name'], PATHINFO_EXTENSION));
        } else {
            $fspk = $lama['sertifikat_peningkatan'];
        }
        if ($file['fskperpanjang']['error'] == 0) {
            $fskperpanjang = $file['fskperpanjang']['name'];
            if (file_exists('../' . $this->folder_public . '/img/skperpanjang/' . $data['tbid'] . '.' . pathinfo($file['fskperpanjang']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/skperpanjang/' . $data['tbid'] . '.' . pathinfo($file['fskperpanjang']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/skperpanjang/' . $data['tbid'] . '.' . pathinfo($file['fskperpanjang']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fskperpanjang']['tmp_name'], '../' . $this->folder_public . '/img/skperpanjang/' . $data['tbid'] . '.' . pathinfo($file['fskperpanjang']['name'], PATHINFO_EXTENSION));
        } else {
            $fskperpanjang = $lama['sk_perpanjangan'];
        }

        $dataup = [
            'nama' => $data['tbnama'],
            'tempat_lahir' => $data['tbtempatlahir'],
            'tgl_lahir' => $data['tbtgllahir'],
            'alamat_tinggal' => $data['tbalamat'],
            'alamat_kantor' => $data['tbalamatkantor'],
            'lokasi_magang' => $data['tblokasimagang'],
            'universitas' => $data['tblokasisarjanah'],
            'no_tlp' => $data['tbtlp'],
            'no_ktp' => $data['tbnoktp'],
            'id_pengda' => substr($data['cbpengda'], 2, 2),
            'id_pengwil' => substr($data['cbpengda'], 0, 2),
            'email' => $data['tbemail'],
            'password' => md5($data['tbpass']),
            'foto' => $fphoto,
            'no_sk' => $data['tbnosk'],
            'sk_jabatan' => $fskjabatan,
            'tanggal_sk' => $data['tbtglsk'],
            'no_bas' => $data['tbnobas'],
            'bas_jabatan' => $fbasjabatan,
            'tanggal_bas' => $data['tbtglbas'],
            'ket_alb' => $fketalb,
            'rek_pengda' => $frekpengda,
            'ijasah' => $fijazah,
            'transkrip' => $ftranskript,
            'foto_ktp' => $ffotoktp,
            'uang_pangkal' => $fuangpangkal,
            'sertifikat_protokol' => $fspst,
            'sertifikat_peningkatan' => $fspk,
            'sk_perpanjangan' => $fskperpanjang,
            'id_user' => $data['tbid']
        ];
        $result = $this->update($data['tbid'], $dataup);
        if ($result) {
            $return = $this->getUserDetailById($data['tbid']);
        } else {
            $return = 'Update gagal';
        }
        return $return;
    }
    public function updateRole($iduser, $idrole)
    {
        $dataup = [
            'id_role' => $idrole
        ];
        $this->update($iduser, $dataup);
        return $this->db->affectedRows();
    }
    public function updateEmailTlp($data)
    {
        $dataup = [
            'email' => $data['tbemail'],
            'no_tlp' => $data['tbtlp']
        ];
        $this->update($data['tbiduser'], $dataup);
        return $this->db->affectedRows();
    }
    public function hapus($iduser)
    {
        if (file_exists('../' . $this->folder_public . '/img/foto/' . $iduser . '.jpg')) {
            unlink('../' . $this->folder_public . '/img/foto/' . $iduser . '.jpg');
        }
        if (file_exists('../' . $this->folder_public . '/img/ijazah/' . $iduser . '.pdf')) {
            unlink('../' . $this->folder_public . '/img/ijazah/' . $iduser . '.pdf');
        }
        if (file_exists('../' . $this->folder_public . '/img/transkript/' . $iduser . '.pdf')) {
            unlink('../' . $this->folder_public . '/img/transkript/' . $iduser . '.pdf');
        }
        if (file_exists('../' . $this->folder_public . '/img/ktp/' . $iduser . '.pdf')) {
            unlink('../' . $this->folder_public . '/img/ktp/' . $iduser . '.pdf');
        }
        if (file_exists('../' . $this->folder_public . '/img/sd1/' . $iduser . '.pdf')) {
            unlink('../' . $this->folder_public . '/img/sd1/' . $iduser . '.pdf');
        }
        if (file_exists('../' . $this->folder_public . '/img/sd2/' . $iduser . '.pdf')) {
            unlink('../' . $this->folder_public . '/img/sd2/' . $iduser . '.pdf');
        }
        if (file_exists('../' . $this->folder_public . '/img/uangpangkal/' . $iduser . '.pdf')) {
            unlink('../' . $this->folder_public . '/img/uangpangkal/' . $iduser . '.pdf');
        }
        if (file_exists('../' . $this->folder_public . '/img/kodeetik/' . $iduser . '.pdf')) {
            unlink('../' . $this->folder_public . '/img/kodeetik/' . $iduser . '.pdf');
        }

        $result = $this->delete(['id_user' => $iduser]);
        if (!$result) {
            $return = 'Delete gagal';
        } else {
            $return = 'Delete sukses';
        }
        return $return;
    }
    public function approveALB($data, $iduser)
    {
        $dataup = [
            'status' => 1
        ];
        $result = $this->update($data, $dataup);
        if ($result) {
            $return = $this->getUserDetailById($iduser);
        } else {
            $return = 'Update gagal';
        }
        return $return;
    }
    public function rejectALB($data, $iduser)
    {
        $dataup = [
            'status' => 0
        ];
        $result = $this->update($data, $dataup);
        if ($result) {
            $return = $this->getUserDetailById($iduser);
        } else {
            $return = 'Update gagal';
        }
        return $return;
    }
    public function approveWreda($data, $iduser)
    {
        $dataup = [
            'status' => 1
        ];
        $result = $this->update($data, $dataup);
        if ($result) {
            $return = $this->getUserDetailById($iduser);
        } else {
            $return = 'Update gagal';
        }
        return $return;
    }
    public function cekKTP($noktp)
    {
        $result = $this->where(['no_ktp' => $noktp])->first();
        return $result;
    }
    public function cekEmail($email)
    {
        $result = $this->where(['email' => $email])->first();
        return $result;
    }
    public function cekEmailkta($email, $iduser)
    {
        $result = $this->where("email = '$email' && id_user <> '$iduser'")->first();
        return $result;
    }
}
