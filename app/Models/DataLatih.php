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
        'produk', 
        'waktu', 
    ];
}
