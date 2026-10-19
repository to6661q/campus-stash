<?php

namespace App\Models;

use CodeIgniter\Model;

class ci_menuModel extends Model
{
    protected $table = 'ci_menu';
    protected $primaryKey = 'id_menu';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['menu_name', 'root_id', 'icon', 'alamat'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getMenu()
    {
        return $this->findAll();
    }
}
