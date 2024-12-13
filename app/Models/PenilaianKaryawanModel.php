<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianKaryawanModel extends Model
{
    use HasFactory;

    protected $table = 'penilaian_karyawan';

    protected $fillable = [
        'karyawan_id',
        'c1',
        'c2',
        'c3',
        'c4',
        'c5',
        'c6',
        'c7',
        'c8',
        'c9',
        'c10',
    ];

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'data_karyawan_id');
    }

    // app/Models/Absensi.php
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id');
    }

public function divisi()
{
    return $this->belongsTo(Divisi::class, 'divisi_id');
}

public function outlet()
{
    return $this->belongsTo(Outlet::class, 'outlet_id');
}


}