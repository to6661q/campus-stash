<?php

namespace App\Models;

use CodeIgniter\Model;

class ci_pelatihanModel extends Model
{
    protected $table = 'ci_pelatihan';
    protected $primaryKey = 'id_pelatihan';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'nama_pelatihan', 'tanggal'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getPelatihanDetail($namaevent)
    {
        $result = $this->where(['nama_pelatihan' => $namaevent])
            ->join('ci_peserta', 'ci_pelatihan.id_pelatihan = ci_peserta.id_pelatihan', 'left')
            ->join('ci_user', 'ci_peserta.id_user = id_user.id_user', 'left')
            ->findAll();
        return $result;
    }
    public function getidPelatihanByNama($namaevent)
    {
        $result = $this->where(['nama_pelatihan' => $namaevent])
            ->first();
        return $result;
    }
    public function getPelatihan()
    {
        $result = $this->findAll();
        return $result;
    }
}
