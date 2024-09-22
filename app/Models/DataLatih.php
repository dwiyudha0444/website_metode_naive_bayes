<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLatih extends Model
{
    protected $table = 'datalatih';
    
    protected $fillable = [
        'id_biodata',
        'sosmed',
        'keuntungan',
        'pengaruh_event',
        'kenaikan_keuntungan',
        'produk', 
        'waktu', 
        'kelas', 
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'id_biodata', 'id_user');
    }
}
