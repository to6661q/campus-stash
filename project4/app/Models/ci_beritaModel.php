<?php

namespace App\Models;

use CodeIgniter\Model;

class ci_beritaModel extends Model
{
    protected $table = 'ci_berita';
    protected $primaryKey = 'id_berita';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['judul', 'lokasi', 'jenis', 'img_cnt', 'caption', 'detail'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getBerita()
    {
        return $this->orderBy('id_berita', 'DESC')->findAll(5);
    }
    public function getBeritabyJenis($jenis = '')
    {
        return $this->where(['jenis' => $jenis])
            ->orderBy('id_berita', 'DESC')
            ->findAll();
    }
    public function getBeritabyid($id = '')
    {
        return $this->where(['id_berita' => $id])
            ->first();
    }
    public function getBeritabyJenisTerkini($jenis = '')
    {
        return $this->where(['jenis' => $jenis])
            ->orderBy('id_berita', 'DESC')
            ->first();
    }
}
