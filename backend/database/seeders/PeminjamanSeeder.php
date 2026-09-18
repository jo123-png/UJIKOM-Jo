<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $peminjaman = [
            [
                'user_id' => 3, // Rian (Peminjam)
                'tgl_pinjam' => '2026-06-01',
                'tgl_kembali_plan' => '2026-06-04',
                'status' => 'dikembalikan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 4, // Siti (Peminjam)
                'tgl_pinjam' => '2026-06-02',
                'tgl_kembali_plan' => '2026-06-05',
                'status' => 'dikembalikan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 5, // Eka (Peminjam)
                'tgl_pinjam' => '2026-06-03',
                'tgl_kembali_plan' => '2026-06-06',
                'status' => 'telat',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 3,
                'tgl_pinjam' => '2026-06-08',
                'tgl_kembali_plan' => '2026-06-11',
                'status' => 'dipinjam',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 4,
                'tgl_pinjam' => '2026-06-09',
                'tgl_kembali_plan' => '2026-06-12',
                'status' => 'diajukan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('peminjaman')->insert($peminjaman);
    }
}