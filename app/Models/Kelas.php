<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    
    protected $fillable = [
        'id_prediksi',
        'nama',
        'b',
        'tb',
    ];

    // Definisikan relasi kebalikannya
    public function hasilPrediksi()
    {
        return $this->belongsTo(HasilPrediksi::class, 'id_prediksi', 'id_kelas');
    }
}
