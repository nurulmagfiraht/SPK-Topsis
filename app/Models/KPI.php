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
        'departemen_id',
        'divisi_id',
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }
}
