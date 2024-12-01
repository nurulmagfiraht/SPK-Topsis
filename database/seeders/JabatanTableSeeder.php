<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('jabatan')->insert([
            ['id' => 1, 'nama' => 'Pengawas Lapangan'],
            ['id' => 2, 'nama' => 'Cook'],
            ['id' => 3, 'nama' => 'Hall Cashier'],
            ['id' => 4, 'nama' => 'Runner'],
            ['id' => 5, 'nama' => 'Helper'],
            ['id' => 6, 'nama' => 'Bartender'],
        ]);
    }
} 