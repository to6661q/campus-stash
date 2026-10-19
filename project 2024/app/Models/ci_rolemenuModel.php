<?php

namespace App\Models;

use CodeIgniter\Model;

class ci_rolemenuModel extends Model
{
    protected $table = 'ci_role_menu';
    protected $primaryKey = 'id_role_menu';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_menu', 'id_role', 'add', 'edit', 'delete', 'download', 'upload', 'approve'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getRoleMenu()
    {
        return $this->findAll();
    }
    public function getRoleMenubyRoleid($idrole)
    {
        $result = $this->join('ci_menu', 'ci_role_menu.id_menu = ci_menu.id_menu', 'left')
            ->where("id_role = '$idrole'")
            ->find();
        return $result;
    }
    public function deleteMenubyRoleid($idrole)
    {
        $result = $this->where('id_role', $idrole);
        $result = $this->delete();
        return $result;
    }
    public function insertMenubyRoleid($idmenu, $idrole, $add, $edit, $delete, $download, $upload, $approve)
    {
        $data = [
            'id_menu' => $idmenu,
            'id_role'  => $idrole,
            'add' => $add,
            'edit' => $edit,
            'delete' => $delete,
            'download' => $download,
            'upload' => $upload,
            'approve' => $approve
        ];
        $result = $this->insert($data);
        return $result;
    }
}
