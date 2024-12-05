<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'divisi';
    protected $fillable = ['nama'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
    public function kpi()
{
    return $this->hasMany(KPI::class);
}
}