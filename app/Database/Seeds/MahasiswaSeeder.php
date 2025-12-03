<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('mahasiswa')->truncate();

        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 13; $i++) { 
            
            $jurusan = $faker->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Manajemen Bisnis']);
            
            $data = [
                'nim'        => $faker->unique()->numerify('2023#####'),
                'nama'       => $faker->name,
                'jurusan'    => $jurusan,
                'no_hp'      => $faker->phoneNumber,
                'foto'       => 'default.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->table('mahasiswa')->insert($data);
        }
    }
}