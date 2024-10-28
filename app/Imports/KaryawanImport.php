<?php
namespace App\Imports;

use App\Models\Absensi; 
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;// Replace with your model name

class KaryawanImport implements ToModel,WithHeadingRow
{
    public function model(array $row)
    {
        return new Absensi([
            'data_karyawan_id' => $row['nip'], // Excel column heading should match
            'nama'             => $row['nama'],
            'divisi'             => $row['divisi'],
            'jumlah_hadir'     => $row['jumlah_hadir'],
        ]);
    }
}
