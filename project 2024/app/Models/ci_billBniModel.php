<?php

namespace App\Models;

use CodeIgniter\Model;

class ci_billBniModel extends Model
{
    protected $table = 'savebilling';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'jumlah_trx', 'nama_pelanggan', 'email_pelanggan',
        'email_pelanggan', 'telepon_pelanggan', 'virtual_account',
        'trx_id', 'datetime_expried', 'description', 'type'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $ci_pesertaModel;
    var $folder_public;

    public function __construct()
    {
        parent::__construct();
        $this->folder_public = 'public';
        $this->ci_pesertaModel = new ci_pesertaModel();
    }
}
