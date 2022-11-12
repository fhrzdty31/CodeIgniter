<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class GuruSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        // $data = [
        //     [
        //         'nama' => 'Reza',
        //         'mapel' => 'Informatika',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'nama' => 'Kiply',
        //         'mapel' => 'Bahasa',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ]
        // ];

        for ($i = 0; $i < 50; $i++) {
            $data = [

                'nama' => $faker->name(),
                'mapel' => 'Informatika',
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now()

            ];

            // Simple Queries
            // $this->db->query('INSERT INTO guru (nama, mapel) VALUES(:nama:, :mapel:)', $data);

            // Using Query Builder
            $this->db->table('guru')->insert($data);
            // $this->db->table('guru')->insertBatch($data);
        }
    }
}
