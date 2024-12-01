<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataKaryawanTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('data_karyawan')->insert([
            [
                'id' => 1,
                'nama' => 'A. Yusril Mahendra',
                'jabatan_id' => 1, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 1,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 2,
                'nama' => 'Abd Rahman',
                'jabatan_id' => 2, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 4,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 3,
                'nama' => 'Adam Achmad Labisa',
                'jabatan_id' => 3, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 4,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 4,
                'nama' => 'Ade Ratih',
                'jabatan_id' => 4, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 12,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 5,
                'nama' => 'Ahmad Dani',
                'jabatan_id' => 5, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 2,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 6,
                'nama' => 'Ahmad Sodiqin',
                'jabatan_id' => 6, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 3,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 7,
                'nama' => 'Akmal',
                'jabatan_id' => 1, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 1,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 8,
                'nama' => 'Ali Akbar',
                'jabatan_id' => 2, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 8,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 9,
                'nama' => 'Andi Rivaldi',
                'jabatan_id' => 3, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 3,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 10,
                'nama' => 'Apriliani Kartika Sari Ali',
                'jabatan_id' => 4, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 2,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 11,
                'nama' => 'Asriana Fitria Auliana Syam',
                'jabatan_id' => 5, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 2,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 12,
                'nama' => 'Ayu Meylani',
                'jabatan_id' => 6, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 2,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 13,
                'nama' => 'Bambang Wiranata',
                'jabatan_id' => 1, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 4,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 14,
                'nama' => 'Erawasi',
                'jabatan_id' => 2, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 2,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            // Tambahkan data lainnya sesuai dengan data di AbsensiTableSeeder
            [
                'id' => 30,
                'nama' => 'Maharani Afifa',
                'jabatan_id' => 4, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 12,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 31,
                'nama' => 'Mecarania Hidayat',
                'jabatan_id' => 5, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 2,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 32,
                'nama' => 'Megawati',
                'jabatan_id' => 6, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 11,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 33,
                'nama' => 'Moh. Rifaah Mahfudz',
                'jabatan_id' => 1, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 6,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 34,
                'nama' => 'Muh Ali Akbar',
                'jabatan_id' => 2, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 3,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 35,
                'nama' => 'Muh Farhan',
                'jabatan_id' => 3, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 2,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 36,
                'nama' => 'Muh Fitra Ramadhan',
                'jabatan_id' => 4, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 1,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 37,
                'nama' => 'Muh. Ilham',
                'jabatan_id' => 5, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 5,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 38,
                'nama' => 'Muh Rafly Ahmad',
                'jabatan_id' => 6, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 5,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 39,
                'nama' => 'Muh Reza',
                'jabatan_id' => 1, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 11,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 40,
                'nama' => 'Muh Rusdi',
                'jabatan_id' => 2, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 14,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 41,
                'nama' => 'Muh. Ilyas B',
                'jabatan_id' => 3, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 5,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 42,
                'nama' => 'Muhammad Ali Al Khumais',
                'jabatan_id' => 4, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 2,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
            [
                'id' => 43,
                'nama' => 'Muhammad Danial Ibrahim',
                'jabatan_id' => 5, // Sesuaikan dengan ID jabatan yang sesuai
                'divisi_id' => 2,
                'outlet_id' => rand(1, 5), // Randomize outlet_id
            ],
        ]);
    }
} 