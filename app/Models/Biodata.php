<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';
    
    protected $fillable = [
        'nama',
        'umur',
        'waktu_bergabung',
        'produk',
        'sosmed', 
        'penghasilan', 
    ];
}
