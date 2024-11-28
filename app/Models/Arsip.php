<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'biodata';
    
    protected $fillable = [
        'nama',
        'tb',
        'b',
        'nilai'
    ];

}
