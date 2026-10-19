<?php

namespace App\Models;

use CodeIgniter\Model;

class cm_dokumenModel extends Model
{
    protected $table = 'cm_dokumen';
    protected $primaryKey = 'id_dokumen';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'dokumen'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    var $folder_public;

    public function __construct()
    {
        parent::__construct();
        $this->folder_public = 'public_html';
    }

    public function getDokument()
    {
        return $this->findAll();
    }
    public function uploadDokumen($data, $file)
    {
        if ($file['fphoto']['error'] == 0) {
            move_uploaded_file($file['fphoto']['tmp_name'], '../' . $this->folder_public . '/dokumen/' . $file['fphoto']['name']);
            $datains = [
                'dokumen' => $file['fphoto']['name']
            ];
            $this->insert($datains);
        } else {
            echo "<script>alert('File Belum dipilih!!');</script>";
        }

        return $this->db->affectedRows();
    }
    public function deleteDokumen($idDoc)
    {
        $this->delete($idDoc);
        return $this->db->affectedRows();
    }
}
