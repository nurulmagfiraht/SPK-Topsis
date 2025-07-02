<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                'departemen_id' => 1, // Pembakaran
                'divisi_id' => 1, // Pembakaran
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'simbol' => 'C2',
                'kriteria' => 'Izin',
                'bobot' => 5,
                'departemen_id' => 1, // Pembakaran
                'divisi_id' => 1, // Pembakaran
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'simbol' => 'C3',
                'kriteria' => 'Alfa',
                'bobot' => 5,
                'departemen_id' => 1, // Pembakaran
                'divisi_id' => 1, // Pembakaran
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'simbol' => 'C4',
                'kriteria' => 'Melaksanakan Perintah Atasan',
                'bobot' => 13,
                'departemen_id' => 1, // Pembakaran
                'divisi_id' => 1, // Pembakaran
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'simbol' => 'C5',
                'kriteria' => 'Membantah Perintah Atasan',
                'bobot' => 12,
                'departemen_id' => 1, // Pembakaran
                'divisi_id' => 1, // Pembakaran
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'simbol' => 'C6',
                'kriteria' => 'Teknik memotong/fillet ikan',
                'bobot' => 10,
                'departemen_id' => 1, // Pembakaran
                'divisi_id' => 1, // Pembakaran
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'simbol' => 'C7',
                'kriteria' => 'Mengetahui kualitas/kondisi ikan yang layak diolah',
                'bobot' => 5,
                'departemen_id' => 1, // Pembakaran
                'divisi_id' => 1, // Pembakaran
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'simbol' => 'C8',
                'kriteria' => 'Menguasai teknik membakar',
                'bobot' => 10,
                'departemen_id' => 1, // Pembakaran
                'divisi_id' => 1, // Pembakaran
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'simbol' => 'C9',
                'kriteria' => 'Menguasai saus (rica/parape)',
                'bobot' => 10,
                'departemen_id' => 1, // Pembakaran
                'divisi_id' => 1, // Pembakaran
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'simbol' => 'C10',
                'kriteria' => 'Komentar Negatif',
                'bobot' => 10,
                'departemen_id' => 1, // Pembakaran
                'divisi_id' => 1, // Pembakaran
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 11,
                'simbol' => 'C1',
                'kriteria' => 'Kehadiran full',
                'bobot' => 20,
                'departemen_id' => 2, // Hall
                'divisi_id' => 12, // Hall Kasir
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 12,
                'simbol' => 'C2',
                'kriteria' => 'Izin',
                'bobot' => 5,
                'departemen_id' => 2, // Hall
                'divisi_id' => 12, // Hall Kasir
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 13,
                'simbol' => 'C3',
                'kriteria' => 'Alfa',
                'bobot' => 5,
                'departemen_id' => 2, // Hall
                'divisi_id' => 12, // Hall Kasir
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 14,
                'simbol' => 'C4',
                'kriteria' => 'Melaksanakan perintah atasan',
                'bobot' => 13,
                'departemen_id' => 2, // Hall
                'divisi_id' => 12, // Hall Kasir
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 15,
                'simbol' => 'C5',
                'kriteria' => 'Membantah perintah atasan',
                'bobot' => 12,
                'departemen_id' => 2, // Hall
                'divisi_id' => 12, // Hall Kasir
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 16,
                'simbol' => 'C6',
                'kriteria' => 'Menyetor kas kasir',
                'bobot' => 10,
                'departemen_id' => 2, // Hall
                'divisi_id' => 12, // Hall Kasir
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 17,
                'simbol' => 'C7',
                'kriteria' => 'Melayani proses transaksi customer',
                'bobot' => 10,
                'departemen_id' => 2, // Hall
                'divisi_id' => 12, // Hall Kasir
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 18,
                'simbol' => 'C8',
                'kriteria' => 'Laporan harian MOKA',
                'bobot' => 10,
                'departemen_id' => 2, // Hall
                'divisi_id' => 12, // Hall Kasir
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 19,
                'simbol' => 'C9',
                'kriteria' => 'Konfirmasi ulang tambahan orderan customer',
                'bobot' => 5,
                'departemen_id' => 2, // Hall
                'divisi_id' => 12, // Hall Kasir
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 20,
                'simbol' => 'C10',
                'kriteria' => 'Komentar Negatif',
                'bobot' => 10,
                'departemen_id' => 2, // Hall
                'divisi_id' => 12, // Hall Kasir
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 21,
                'simbol' => 'C1',
                'kriteria' => 'Kehadiran full',
                'bobot' => 20,
                'departemen_id' => 6, // Bar
                'divisi_id' => 8, // Bar
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 22,
                'simbol' => 'C2',
                'kriteria' => 'Izin',
                'bobot' => 5,
                'departemen_id' => 6, // Bar
                'divisi_id' => 8, // Bar
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 23,
                'simbol' => 'C3',
                'kriteria' => 'Alfa',
                'bobot' => 5,
                'departemen_id' => 6, // Bar
                'divisi_id' => 8, // Bar
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 24,
                'simbol' => 'C4',
                'kriteria' => 'Melaksanakan perintah atasan',
                'bobot' => 13,
                'departemen_id' => 6, // Bar
                'divisi_id' => 8, // Bar
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 25,
                'simbol' => 'C5',
                'kriteria' => 'Membantah perintah atasan',
                'bobot' => 12,
                'departemen_id' => 6, // Bar
                'divisi_id' => 8, // Bar
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 26,
                'simbol' => 'C6',
                'kriteria' => 'Menjaga kebersihan area bar',
                'bobot' => 10,
                'departemen_id' => 6, // Bar
                'divisi_id' => 8, // Bar
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 27,
                'simbol' => 'C7',
                'kriteria' => 'Menyiapkan bahan baku',
                'bobot' => 10,
                'departemen_id' => 6, // Bar
                'divisi_id' => 8, // Bar
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 28,
                'simbol' => 'C8',
                'kriteria' => 'Cek stok bahan baku',
                'bobot' => 5,
                'departemen_id' => 6, // Bar
                'divisi_id' => 8, // Bar
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 29,
                'simbol' => 'C9',
                'kriteria' => 'Kecepatan dan ketepatan memproses pesanan',
                'bobot' => 10,
                'departemen_id' => 6, // Bar
                'divisi_id' => 8, // Bar
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 30,
                'simbol' => 'C10',
                'kriteria' => 'Komentar negatif',
                'bobot' => 10,
                'departemen_id' => 6, // Bar
                'divisi_id' => 8, // Bar
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}