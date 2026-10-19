<?php

namespace App\Models;

use CodeIgniter\Model;

class ci_pengwilModel extends Model
{
    protected $table = 'ci_pengwil';
    protected $primaryKey = 'id_pengwil';
    protected $useAutoIncrement = false;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['pengwil'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getPengwil()
    {
        return $this->findAll();
    }
    public function getPengwilbyID($id)
    {
        return $this->where(['id_pengwil' => $id])->first();
    }
}
