<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $fillable = [
        'data_karyawan_id',
        'nama',
        'divisi',
        'jumlah_hadir',
        'mulai',
        'berakhir',
    ];

    // Definisikan relasi ke model Karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
