<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;
use App\Models\Divisi;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $fillable = [
        'data_karyawan_id',
        'nama',
        'divisi_id',
        'jumlah_hadir',
        'mulai',
        'berakhir',
    ];

    // Definisikan relasi ke model DataKaryawan dan Divisi
    public function dataKaryawan()
    {
        return $this->belongsTo(Karyawan::class, 'data_karyawan_id');
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'data_karyawan_id');
    }
}
