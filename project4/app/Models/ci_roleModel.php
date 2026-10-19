<?php

namespace App\Models;

use CodeIgniter\Model;

class ci_roleModel extends Model
{
    protected $table = 'ci_role';
    protected $primaryKey = 'id_role';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nama_role'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getRole()
    {
        return $this->where('id_role <> 1')->findAll();
    }
    public function getRolebyid($id)
    {
        return $this->find($id);
    }
}
