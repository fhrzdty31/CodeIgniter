<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa_model extends Model
{
    protected $table = 'siswa';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['foto', 'nama', 'nis', 'telepon', 'jurusan', 'email'];
    protected $useTimestamps = true;

    public function getSiswa($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }
}
