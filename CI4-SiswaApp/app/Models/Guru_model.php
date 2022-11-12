<?php

namespace App\Models;

use CodeIgniter\Model;

class Guru_model extends Model
{
    protected $table = 'guru';

    public function search($keyword)
    {
        // $builder = $this->table('guru');
        // $builder->like('nama', $keyword);
        return $this->table('orang')->like('nama', $keyword);
    }
}
