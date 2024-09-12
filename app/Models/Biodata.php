<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';
    
    protected $fillable = [
        'id_user',
        'nama',
        'umur',
        'waktu_bergabung',
    ];

    public function datalatih()
    {
        return $this->hasMany(DataLatih::class);
    }
}
