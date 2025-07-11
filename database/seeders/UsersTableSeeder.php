<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Outlet extends Model
{
    use HasFactory;
    protected $table = 'outlet';

    protected $fillable = ['nama'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'outlet_id');
    }
}
