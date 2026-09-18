<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            ['id' => 1, 'nama_kategori' => 'Furniture'],
            ['id' => 2, 'nama_kategori' => 'Alat Pertukangan'],
            ['id' => 3, 'nama_kategori' => 'Alat Kebersihan'],
            ['id' => 4, 'nama_kategori' => 'Alat Perkakas'],
            ['id' => 5, 'nama_kategori' => 'Alat Elektronik'],
        ];

        foreach ($kategori as $item) {
            Kategori::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}