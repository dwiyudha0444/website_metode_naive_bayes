<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HitungPrediksi extends Model
{
    protected $table = 'hitung_prediksi';
    
    protected $fillable = [
        'id_sosmed',
        'id_keuntungan',
        'id_pengaruh_event',
        'id_kenaikan_keuntungan',
        'id_produk', 
        'id_waktu', 
        'id_kelas', 
        'id_hasil',
    ];

    // Definisikan relasi satu ke banyak dengan Sosmed
    public function sosmed()
    {
        return $this->hasMany(Sosmed::class, 'id_prediksi', 'id_sosmed');
    }
}
