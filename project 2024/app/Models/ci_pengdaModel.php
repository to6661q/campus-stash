<?php

namespace App\Models;

use CodeIgniter\Model;

class ci_pengdaModel extends Model
{
    protected $table = 'ci_pengda';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_pengwil', 'id_pengda', 'pengda'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getPengda()
    {
        return $this->orderBy('pengda', 'ASC')->findAll();
    }
    public function getPengwil($pengda)
    {
        return $this->join('ci_pengwil', 'ci_pengda.id_pengwil = ci_pengwil.id_pengwil', 'left')
            ->where(['id_pengda' => $pengda])->first();
    }
}
