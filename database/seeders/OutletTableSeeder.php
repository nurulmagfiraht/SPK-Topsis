<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutletTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('outlet')->insert([
            ['nama' => 'Saoenk Cobek Makassar - Cabang 1'],
            ['nama' => 'Saoenk Cobek Makassar - Cabang 2'],
            ['nama' => 'Saoenk Cobek Makassar - Cabang 3'],
            ['nama' => 'Saoenk Cobek Makassar - Cabang 4'],
            ['nama' => 'Saoenk Cobek Makassar - Cabang 5'],
        ]);
    }
} 