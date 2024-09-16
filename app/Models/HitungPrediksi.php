<?php

namespace App\Models;

use App\Helpers\KenaikanKeuntunganHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HitungPrediksi extends Model
{
    protected $table = 'hitung_prediksi';
    
    protected $fillable = [
        'id_prediksi',
        'nama',
        'b',
        'tb',
    ];

    // // Definisikan relasi satu ke banyak dengan Sosmed
    // public function sosmeds()
    // {
    //     return $this->hasMany(Sosmed::class, 'id_prediksi', 'id_sosmed');
    // }

    // public function keuntungan()
    // {
    //     return $this->hasMany(Keuntungan::class, 'id_prediksi', 'id_keuntungan');
    // }

    // public function pengaruh_event()
    // {
    //     return $this->hasMany(PengaruhEvent::class, 'id_prediksi', 'id_pengaruh_event');
    // }

    // public function kenaikan_keuntungan()
    // {
    //     return $this->hasMany(KenaikanKeuntungan::class, 'id_prediksi', 'id_kenaikan_keuntungan');
    // }

    // public function produk()
    // {
    //     return $this->hasMany(Produk::class, 'id_prediksi', 'id_produk');
    // }

    // public function waktu()
    // {
    //     return $this->hasMany(Waktu::class, 'id_prediksi', 'id_waktu');
    // }

    // public function kelas()
    // {
    //     return $this->hasMany(Kelas::class, 'id_prediksi', 'id_kelas');
    // }
}