<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class NaiveBayesHelpers
{
    public static function getSosmed($column)
    {
        return DB::table('datalatih')
                 ->where('sosmed', 'facebook')
                 ->sum($column);
    }
}
