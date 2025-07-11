<?php

namespace App\Imports;

use App\Models\Absensi;
use App\Models\Karyawan;
use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\Departemen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KaryawanImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Pakai jabatan default
        $jabatan = Jabatan::firstOrCreate(['nama' => 'Umum']);

        // Pakai departemen default
        $departemen = Departemen::firstOrCreate(['nama' => 'Umum']);

        // Cari atau buat divisi dengan departemen_id default
        $divisi = Divisi::firstOrCreate(
            ['nama' => $row['divisi']],
            ['departemen_id' => $departemen->id]
        );

        // Simpan atau update data karyawan
      $karyawan = Karyawan::updateOrCreate(
    ['id' => $row['nip']],
    [
        'nama'       => $row['nama'],
        'divisi_id'  => $divisi->id,
        'jabatan_id' => $jabatan->id,
        'outlet_id'  => $row['outlet_id'], // tambahkan ini
    ]
);

        // Simpan data absensi
        return new Absensi([
            'data_karyawan_id' => $karyawan->id,
            'nama'             => $karyawan->nama,
            'divisi_id'        => $divisi->id,
            'jumlah_hadir'     => $row['jumlah_hadir'],
        ]);
    }
}
