<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $fillable = ['kode_pertanyaan', 'kategori_indikator_id', 'title'];

    public function kategori_indikator()
    {
        return $this->belongsTo(KategoriIndikator::class);
    }
    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }
}
