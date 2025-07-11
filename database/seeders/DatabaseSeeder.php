<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DepartemenTableSeeder;
use Database\Seeders\DivisiTableSeeder;
use Database\Seeders\JabatanTableSeeder;
use Database\Seeders\KpiTableSeeder;
use Database\Seeders\AbsensiTableSeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\DataKaryawanTableSeeder;
use Database\Seeders\OutletTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DepartemenTableSeeder::class,
            DivisiTableSeeder::class,
            JabatanTableSeeder::class,
            KpiTableSeeder::class,
            OutletTableSeeder::class,
            DataKaryawanTableSeeder::class,
            AbsensiTableSeeder::class,
            AdminSeeder::class,
            // UsersTableSeeder::class,
        ]);
    }
}
