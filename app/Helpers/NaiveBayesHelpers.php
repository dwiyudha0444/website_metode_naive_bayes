<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class NaiveBayesHelpers
{
    public static function getBerpengaruh($column)
    {
        // Hitung jumlah baris dengan kelas 'B'
        $berpengaruhCount = DB::table('datalatih')
                              ->where('kelas', 'B')
                              ->count();

        // Hitung total jumlah baris di tabel
        $totalCount = DB::table('datalatih')
                        ->count();

        $probabilitas = $berpengaruhCount / $totalCount;
        
        return $probabilitas;

    }

    public static function getTidakBerpengaruh($column)
    {
        // Hitung jumlah baris dengan kelas 'B'
        $tidakBerpengaruhCount = DB::table('datalatih')
                              ->where('kelas', 'TB')
                              ->count();

        // Hitung total jumlah baris di tabel
        $totalCount = DB::table('datalatih')
                        ->count();

        $probabilitas = $tidakBerpengaruhCount / $totalCount;
        
        return $probabilitas;

    }

    public static function getTiktok($column)
    {
        return DB::table('datalatih')
                 ->where('sosmed', 'tiktok')
                 ->count();
    }

    public static function getInstagram($column)
    {
        return DB::table('datalatih')
                 ->where('sosmed', 'instagram')
                 ->count();
    }

    public static function getfacebook($column)
    {
        return DB::table('datalatih')
                 ->where('sosmed', 'facebook')
                 ->count();
    }
}
