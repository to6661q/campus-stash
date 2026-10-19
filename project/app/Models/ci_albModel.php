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
        'no_alb', 'status', 'jenis', 'id_role', 'nama', 'tempat_lahir',
        'tgl_lahir', 'alamat_tinggal', 'no_tlp', 'no_ktp', 'lokasi_magang', 'universitas',
        'email', 'password', 'foto', 'ijazah_s1', 'ijazah_s2', 'transkrip',
        'foto_ktp', 'pernyataan'
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
        $this->folder_public = 'public';
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
        tgl_lahir,alamat_tinggal, lokasi_magang, universitas,no_tlp,no_ktp,email,foto,ijazah_s1,ijazah_s2,transkrip,foto_ktp,
        pernyataan,ci_alb2024.created_at')
            ->where(['id_user' => $data])->first();
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

    public function getALByear()
    {
        $result = $this->select('YEAR(created_at) as tahun')
            ->distinct()
            ->findAll();
        return $result;
    }

    public function addalb($data, $file)
    {
        $sql = "insert into `ci_alb2024` (`no_alb`,`status`,`jenis`,`id_role`,`nama`,
        `tempat_lahir`,`tgl_lahir`,`alamat_tinggal`,`lokasi_magang`,`universitas`,`no_tlp`,`no_ktp`,`email`,`password`,
        `foto`,`ijazah_s1`,`ijazah_s2`,`transkrip`,`foto_ktp`,`created_at`) 
        select IFNULL(LPAD(max(no_anggota)+1,5,'0'),'00001'),0,'alb',7,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW() from `ci_user` where jenis='alb'";
        $this->query($sql, [
            $data['tbnama'], $data['tbtempatlahir'], $data['tbtgllahir'], $data['tbalamat'],
            $data['tblokasimagang'], $data['tblokasisarjanah'], $data['tbtlp'], $data['tbnoktp'], $data['tbemail'],
            md5($data['tbpass']), $file['fphoto']['name'], $file['fijazahs1']['name'], $file['fijazahs2']['name'], $file['ftranskript']['name'],
            $file['ffotoktp']['name']
        ]);
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

    // Fungsi untuk mendapatkan no_alb baru dengan panjang 5 digit
    protected function getNewNoAlb()
    {
        $maxNoAlb = $this->selectMax('no_alb')->get()->getRow()->no_alb;
        $newNoAlb = str_pad(intval($maxNoAlb) + 1, 5, '0', STR_PAD_LEFT);
        return $newNoAlb;
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
        if ($file['fijazahs1']['error'] == 0) {
            $fijazahs1 = $file['fijazahs1']['name'];
            if (file_exists('../' . $this->folder_public . '/img/ijazahs1/' . $data['tbid'] . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ijazahs1/' . $data['tbid'] . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ijazahs1/' . $data['tbid'] . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fijazahs1']['tmp_name'], '../' . $this->folder_public . '/img/ijazahs1/' . $data['tbid'] . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION));
        } else {
            $fijazahs1 = $lama['ijazah_s1'];
        }
        if ($file['fijazahs2']['error'] == 0) {
            $fijazahs2 = $file['fijazahs2']['name'];
            if (file_exists('../' . $this->folder_public . '/img/ijazahs2/' . $data['tbid'] . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ijazahs2/' . $data['tbid'] . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ijazahs2/' . $data['tbid'] . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fijazahs2']['tmp_name'], '../' . $this->folder_public . '/img/ijazahs2/' . $data['tbid'] . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION));
        } else {
            $fijazahs2 = $lama['ijazah_s2'];
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
        /*if ($file['fuangpangkal']['error'] == 0) {
            $fuangpangkal = $file['fuangpangkal']['name'];
            if (file_exists('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fuangpangkal']['tmp_name'], '../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION));
        } else {
            $fuangpangkal = $lama['uang_pangkal'];
        }*/

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
            'ijazah_s1' => $fijazahs1,
            'ijazah_s2' => $fijazahs2,
            'transkrip' => $ftranskript,
            'foto_ktp' => $ffotoktp,
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
        if ($file['fijazahs1']['error'] == 0) {
            $fijazahs1 = $file['fijazahs1']['name'];
            if (file_exists('../' . $this->folder_public . '/img/ijazahs1/' . $data['tbid'] . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ijazahs1/' . $data['tbid'] . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ijazahs1/' . $data['tbid'] . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fijazahs1']['tmp_name'], '../' . $this->folder_public . '/img/ijazahs1/' . $data['tbid'] . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION));
        } else {
            $fijazahs1 = $lama['ijazah_s1'];
        }
        if ($file['fijazahs2']['error'] == 0) {
            $fijazahs2 = $file['fijazahs2']['name'];
            if (file_exists('../' . $this->folder_public . '/img/ijazahs2/' . $data['tbid'] . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ijazahs2/' . $data['tbid'] . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ijazahs2/' . $data['tbid'] . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fijazahs2']['tmp_name'], '../' . $this->folder_public . '/img/ijazahs2/' . $data['tbid'] . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION));
        } else {
            $fijazahs2 = $lama['ijazah_s2'];
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
        /*if ($file['fuangpangkal']['error'] == 0) {
            $fuangpangkal = $file['fuangpangkal']['name'];
            if (file_exists('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fuangpangkal']['tmp_name'], '../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION));
        } else {
            $fuangpangkal = $lama['uang_pangkal'];
        }*/
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
            'ijazah_s1' => $fijazahs1,
            'ijazah_s2' => $fijazahs2,
            'transkrip' => $ftranskript,
            'foto_ktp' => $ffotoktp,
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
        if ($file['fijazahs1']['error'] == 0) {
            $fijazahs1 = $file['fijazahs1']['name'];
            if (file_exists('../' . $this->folder_public . '/img/ijazahs1/' . $data['tbid'] . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ijazahs1/' . $data['tbid'] . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ijazahs1/' . $data['tbid'] . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fijazahs1']['tmp_name'], '../' . $this->folder_public . '/img/ijazahs1/' . $data['tbid'] . '.' . pathinfo($file['fijazahs1']['name'], PATHINFO_EXTENSION));
        } else {
            $fijazahs1 = $lama['ijazah_s1'];
        }
        if ($file['fijazahs2']['error'] == 0) {
            $fijazahs2 = $file['fijazahs2']['name'];
            if (file_exists('../' . $this->folder_public . '/img/ijazahs2/' . $data['tbid'] . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/ijazahs2/' . $data['tbid'] . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/ijazahs2/' . $data['tbid'] . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fijazahs2']['tmp_name'], '../' . $this->folder_public . '/img/ijazahs2/' . $data['tbid'] . '.' . pathinfo($file['fijazahs2']['name'], PATHINFO_EXTENSION));
        } else {
            $fijazahs2 = $lama['ijazah_s2'];
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
        /*if ($file['fuangpangkal']['error'] == 0) {
            $fuangpangkal = $file['fuangpangkal']['name'];
            if (file_exists('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['fuangpangkal']['tmp_name'], '../' . $this->folder_public . '/img/uangpangkal/' . $data['tbid'] . '.' . pathinfo($file['fuangpangkal']['name'], PATHINFO_EXTENSION));
        } else {
            $fuangpangkal = $lama['uang_pangkal'];
        }*/

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
            'ijazah_s1' => $fijazahs1,
            'ijazah_s2' => $fijazahs2,
            'transkrip' => $ftranskript,
            'foto_ktp' => $ffotoktp,
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
        if (file_exists('../' . $this->folder_public . '/img/ijazahs1/' . $iduser . '.pdf')) {
            unlink('../' . $this->folder_public . '/img/ijazahs1/' . $iduser . '.pdf');
        }
        if (file_exists('../' . $this->folder_public . '/img/ijazahs2/' . $iduser . '.pdf')) {
            unlink('../' . $this->folder_public . '/img/ijazahs2/' . $iduser . '.pdf');
        }
        if (file_exists('../' . $this->folder_public . '/img/transkript/' . $iduser . '.pdf')) {
            unlink('../' . $this->folder_public . '/img/transkript/' . $iduser . '.pdf');
        }
        if (file_exists('../' . $this->folder_public . '/img/ktp/' . $iduser . '.pdf')) {
            unlink('../' . $this->folder_public . '/img/ktp/' . $iduser . '.pdf');
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
