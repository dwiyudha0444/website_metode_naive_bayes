<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPrediksi extends Model
{
    protected $table = 'hasil_prediksi';
    
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

    // public function biodata()
    // {
    //     return $this->belongsTo(Biodata::class,'id_biodata');
    // }
}
