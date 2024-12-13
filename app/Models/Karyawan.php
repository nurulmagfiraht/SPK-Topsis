<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jabatan;
use App\Models\Divisi;
use App\Models\Outlet;
use App\Models\PenilaianKaryawanModel;
use App\Models\Absensi;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'data_karyawan';

    protected $fillable = ['nama', 'jabatan_id', 'divisi_id', 'outlet_id'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }

     // Perbaiki relasi ini
     public function penilaian()
     {
         return $this->hasOne(PenilaianKaryawanModel::class, 'karyawan_id', 'id');
     }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'data_karyawan_id');
    }
}
