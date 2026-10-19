<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ci_userModel;

class ci_dokumenuserModel extends Model
{
    protected $table = 'ci_dokumen_user';
    protected $primaryKey = 'id_dokumen_user';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_user', 'id_dokumen', 'link'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $ci_userModel;
    var $folder_public;

    public function __construct()
    {
        parent::__construct();
        $this->folder_public = 'public_html';
        $this->ci_userModel = new ci_userModel();
    }
    public function adddokumen($uid, $iddoc, $file)
    {
        if ($file['error'] == 0) {
            $fdoc = $file['name'];
            if (file_exists('../' . $this->folder_public . '/img/dokumen/' . $uid . '_' . $iddoc . '.' . pathinfo($file['name'], PATHINFO_EXTENSION))) {
                chmod('../' . $this->folder_public . '/img/dokumen/' . $uid . '_' . $iddoc . '.' . pathinfo($file['name'], PATHINFO_EXTENSION), 0755);
                unlink('../' . $this->folder_public . '/img/dokumen/' . $uid . '_' . $iddoc . '.' . pathinfo($file['name'], PATHINFO_EXTENSION));
            }
            move_uploaded_file($file['tmp_name'], '../' . $this->folder_public . '/img/dokumen/' . $uid . '_' . $iddoc . '.' . pathinfo($file['name'], PATHINFO_EXTENSION));
            $datains = [
                'id_user' => $uid,
                'id_dokumen' => $iddoc,
                'link' => $uid . '_' . $iddoc . '.' . pathinfo($file['name'], PATHINFO_EXTENSION)
            ];
            $result = $this->insert($datains);
            if ($result) {
                $return = $this->ci_userModel->getUserDetailById($uid);
            } else {
                $return = 'Insert gagal';
            }
        }
        return $return;
    }
}
