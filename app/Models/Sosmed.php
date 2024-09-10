<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    protected $table = 'sosmed';
    
    protected $fillable = [
        'id_prediksi',
        'nama',
        'b',
        'tb',
    ];

    // Definisikan relasi kebalikannya
    public function hasilPrediksi()
    {
        return $this->belongsTo(HasilPrediksi::class, 'id_prediksi', 'id_sosmed');
    }
//     public function hasil_prediksi()
//     {
//         return $this->hasMany(HasilPrediksi::class);
//     }
}
