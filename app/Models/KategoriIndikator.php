<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriIndikator extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class);
    }
}
