<?php

namespace App\Models;

use CodeIgniter\Model;

class ci_pesertaModel extends Model
{
    protected $table = 'ci_peserta';
    protected $primaryKey = 'id_peserta';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_pelatihan', 'id_user', 'status'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getPesertaDetail($namaevent)
    {
        $result = $this->where(['nama_event' => $namaevent])
            ->join('ci_user', 'ci_peserta.id_user = ci_user.id_user', 'left')
            ->findAll();
        return $result;
    }
    public function getPesertaDetailbyID($idpeserta)
    {
        $result = $this->where(['id_peserta' => $idpeserta])
            ->join('ci_pelatihan', 'ci_peserta.id_pelatihan = ci_pelatihan.id_pelatihan', 'left')
            ->join('ci_user', 'ci_peserta.id_user = ci_user.id_user', 'left')
            ->first();
        return $result;
    }
    public function addPeserta($iduser, $event, $status = '0')
    {
        $data = array(
            'id_pelatihan' => $event,
            'id_user' => $iduser,
            'status' => $status
        );
        $this->insert($data);
        return $this->db->affectedRows();
    }
    public function getPelatihanUserId($userid)
    {
        $result = $this->where("id_user = '$userid' AND status in ('1','0')")
            ->join('ci_pelatihan', 'ci_peserta.id_pelatihan = ci_pelatihan.id_pelatihan', 'left')
            ->findAll();
        return $result;
    }
    public function getPelatihanAbsenUserId($userid)
    {
        $result = $this->where("id_user = '$userid' AND status ='0'")
            ->join('ci_pelatihan', 'ci_peserta.id_pelatihan = ci_pelatihan.id_pelatihan', 'left')
            ->findAll();
        return $result;
    }
    public function getPelatihanUserIdEvent($idevent, $userid)
    {
        $result = $this->where("id_user = '$userid' AND status <> '2' AND ci_peserta.id_pelatihan='$idevent'")
            ->join('ci_pelatihan', 'ci_peserta.id_pelatihan = ci_pelatihan.id_pelatihan', 'left')
            ->findAll();
        return $result;
    }
    public function getPelatihanUserIdEventTerdaftar($idevent, $userid)
    {
        $result = $this->where("id_user = '$userid' AND ci_peserta.id_pelatihan='$idevent'")
            ->join('ci_pelatihan', 'ci_peserta.id_pelatihan = ci_pelatihan.id_pelatihan', 'left')
            ->findAll();
        return $result;
    }
    public function approvePelatihanByUserEvt($user, $idevent)
    {
        $result = $this->set('status', 1)
            ->where('id_user', $user)
            ->where('id_pelatihan', $idevent)
            ->update();
        return $result;
    }
    public function approvePelatihan($idevent)
    {
        $dataup = [
            'status' => 1
        ];
        $result = $this->update($idevent, $dataup);
        if ($result) {
            $return = $this->getPesertaDetailbyID($idevent);
        } else {
            $return = 'Update gagal';
        }
        return $return;
    }
    public function approvePendaftaran($idevent)
    {
        $dataup = [
            'status' => 0
        ];
        $result = $this->update($idevent, $dataup);
        if ($result) {
            $return = $this->getPesertaDetailbyID($idevent);
        } else {
            $return = 'Update gagal';
        }
        return $return;
    }

    public function hapusbyuser($iduser)
    {
        $result = $this->delete(['id_user' => $iduser]);
        if (!$result) {
            $return = 'Delete gagal';
        } else {
            $return = 'Delete sukses';
        }
        return $return;
    }
    public function cekpeserta($id, $event)
    {
        $result = $this->where(['id_user' => $id, 'id_pelatihan' => $event])->first();
        return $result;
    }
}
