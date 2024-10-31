<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KpiTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('kpi')->insert([
            [
                'id' => 1,
                'simbol' => 'C1',
                'kriteria' => 'Kehadiran full',
                'bobot' => 20,
                'atribut' => '',
                'departemen' => 'Pembakaran',
                'divisi' => 'Pembakaran',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'simbol' => 'C2',
                'kriteria' => 'Izin',
                'bobot' => 5,
                'atribut' => '',
                'departemen' => 'Pembakaran',
                'divisi' => 'Pembakaran',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'simbol' => 'C3',
                'kriteria' => 'Alfa',
                'bobot' => 5,
                'atribut' => '',
                'departemen' => 'Pembakaran',
                'divisi' => 'Pembakaran',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 4,
                'simbol' => 'C4',
                'kriteria' => 'Melaksanakan Perintah Atasan',
                'bobot' => 13,
                'atribut' => '',
                'departemen' => 'Pembakaran',
                'divisi' => 'Pembakaran',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 5,
                'simbol' => 'C5',
                'kriteria' => 'Membantah Perintah Atasan',
                'bobot' => 12,
                'atribut' => '',
                'departemen' => 'Pembakaran',
                'divisi' => 'Pembakaran',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 6,
                'simbol' => 'C6',
                'kriteria' => 'Teknik memotong/fillet ikan',
                'bobot' => 10,
                'atribut' => '',
                'departemen' => 'Pembakaran',
                'divisi' => 'Pembakaran',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 7,
                'simbol' => 'C7',
                'kriteria' => 'Mengetahui kualitas/kondisi ikan yang layak diolah',
                'bobot' => 5,
                'atribut' => '',
                'departemen' => 'Pembakaran',
                'divisi' => 'Pembakaran',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 8,
                'simbol' => 'C8',
                'kriteria' => 'Menguasai teknik membakar',
                'bobot' => 10,
                'atribut' => '',
                'departemen' => 'Pembakaran',
                'divisi' => 'Pembakaran',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 9,
                'simbol' => 'C9',
                'kriteria' => 'Menguasai saus (rica/parape)',
                'bobot' => 10,
                'atribut' => '',
                'departemen' => 'Pembakaran',
                'divisi' => 'Pembakaran',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 10,
                'simbol' => 'C10',
                'kriteria' => 'Komentar Negatif',
                'bobot' => 10,
                'atribut' => '',
                'departemen' => 'Pembakaran',
                'divisi' => 'Pembakaran',
                'created_at' => null,
                'updated_at' => null,
            ],
            //.....
        ]);
    }
}
