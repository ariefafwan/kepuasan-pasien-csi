<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $fillable = ['pertanyaan_id', 'responden_id', 'bobot_harapan', 'bobot_persepsi'];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function responden()
    {
        return $this->belongsTo(Responden::class);
    }
}
