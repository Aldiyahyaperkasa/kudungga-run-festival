<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email' => 'adminnyakudungga1',
                'password' => password_hash('kudunggaRF123', PASSWORD_DEFAULT),
                'nama_admin'     => 'Administrasi Satu',
            ],
            [
                'email' => 'adminnyakudungga2',
                'password' => password_hash('kudunggaRF123', PASSWORD_DEFAULT),
                'nama_admin'     => 'Administrasi Dua',
            ],
            [
                'email' => 'adminnyakudungga3',
                'password' => password_hash('kudunggaRF123', PASSWORD_DEFAULT),
                'nama_admin'     => 'Administrasi Tiga',
            ],
        ];

        // Insert batch ke tabel admin
        $this->db->table('admin')->insertBatch($data);
    }
}
