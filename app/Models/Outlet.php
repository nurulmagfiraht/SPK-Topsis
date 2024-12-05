<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $table = 'outlet';

    protected $fillable = ['nama'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'outlet_id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'outlet_id');
    }
}
