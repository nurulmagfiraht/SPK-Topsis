<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartemenTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('departemen')->insert([
            ['id' => 1, 'nama' => 'Pembakaran'],
            ['id' => 2, 'nama' => 'Hall'],
            ['id' => 3, 'nama' => 'Kitchen'],
            ['id' => 4, 'nama' => 'Pantry'],
            ['id' => 5, 'nama' => 'Admin'],
            ['id' => 6, 'nama' => 'Bar'],
            ['id' => 7, 'nama' => 'Frying'],
            ['id' => 8, 'nama' => 'Accounting'],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
} 