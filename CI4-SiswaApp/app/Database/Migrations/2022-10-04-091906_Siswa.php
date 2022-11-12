<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned'  => true,
                'auto_increment' => true,
            ],
            'foto' => [
                'type' => 'CHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nis' => [
                'type' => 'CHAR',
                'constraint' => '12',
            ],
            'telepon' => [
                'type' => 'CHAR',
                'constraint' => '15',
            ],
            'jurusan' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('gsiswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}
