<?php

namespace Database\Seeders;

use App\Models\Alat;
use Illuminate\Database\Seeder;

class AlatSeeder extends Seeder
{
    public function run(): void
    {
        $alats = [
            [
                'id' => 1,
                'kategori_id' => 1,
                'nama_alat' => 'Router Mikrotik RB941-2nD',
                'stok' => 15,
                'status_kondisi' => 'Baik',
            ],
            [
                'id' => 2,
                'kategori_id' => 2,
                'nama_alat' => 'Kamera DSLR Canon EOS 3000D',
                'stok' => 5,
                'status_kondisi' => 'Baik',
            ],
            [
                'id' => 3,
                'kategori_id' => 3,
                'nama_alat' => 'Mini PC Intel NUC 11',
                'stok' => 8,
                'status_kondisi' => 'Baik',
            ],
            [
                'id' => 4,
                'kategori_id' => 1,
                'nama_alat' => 'Tang Crimping RJ45',
                'stok' => 10,
                'status_kondisi' => 'Baik',
            ],
            [
                'id' => 5,
                'kategori_id' => 1,
                'nama_alat' => 'Adapter Power Supply 12V',
                'stok' => 20,
                'status_kondisi' => 'Baik',
            ],
        ];

        foreach ($alats as $alat) {
            Alat::updateOrCreate(['id' => $alat['id']], $alat);
        }
    }
}