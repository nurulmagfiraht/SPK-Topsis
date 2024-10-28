<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KPI extends Model
{
    use HasFactory;

    protected $table = 'kpi';
    protected $fillable = [
        'simbol',
        'kriteria',
        'bobot',
        'divisi',
        'atribut',
    ];
}
