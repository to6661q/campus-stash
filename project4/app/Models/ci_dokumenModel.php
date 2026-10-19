<?php

namespace App\Models;

use CodeIgniter\Model;

class ci_dokumenModel extends Model
{
    protected $table = 'ci_dokumen';
    protected $primaryKey = 'id_dokumen';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'nama_dokumen'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getDokumenByUser($id_user)
    {
        $result = $this->where(['id_user' => $id_user])
            ->join('ci_dokumen_user', 'ci_dokumen.id_dokumen = ci_dokumen_user.id_dokumen')
            ->findAll();
        return $result;
    }
}
