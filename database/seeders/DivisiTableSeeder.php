<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisiTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('divisi')->insert([
            ['id' => 1, 'nama' => 'Pembakaran', 'departemen_id' => 1],
            ['id' => 2, 'nama' => 'Hall Waiters', 'departemen_id' => 2],
            ['id' => 3, 'nama' => 'Hall Cleaning Service', 'departemen_id' => 2],
            ['id' => 4, 'nama' => 'Cook', 'departemen_id' => 3],
            ['id' => 5, 'nama' => 'Kitchen Helper', 'departemen_id' => 3],
            ['id' => 6, 'nama' => 'Pantry', 'departemen_id' => 4],
            ['id' => 7, 'nama' => 'Admin Gudang', 'departemen_id' => 5],
            ['id' => 8, 'nama' => 'Bar', 'departemen_id' => 6],
            ['id' => 9, 'nama' => 'Frying', 'departemen_id' => 7],
            ['id' => 10, 'nama' => 'Accounting', 'departemen_id' => 8],
            ['id' => 11, 'nama' => 'Runner', 'departemen_id' => 2],
            ['id' => 12, 'nama' => 'Hall Cashier', 'departemen_id' => 2],
            ['id' => 13, 'nama' => 'Bartender', 'departemen_id' => 6],
            ['id' => 14, 'nama' => 'Kitchen Cook', 'departemen_id' => 3],
            ['id' => 15, 'nama' => 'Helper', 'departemen_id' => 3],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
} 