<?php

namespace App\Models;

use CodeIgniter\Model;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class ci_pembayaranModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_user', 'id_invoice', 'id_brg', 'nama_brg', 'jumlah', 'harga'];
    protected $useTimestamps = true;

    public function get($table)
    {
        return $this->db->get($table);
    }
}
