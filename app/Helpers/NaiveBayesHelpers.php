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

    //Soaial Media Kelas Berpengaruh
    public static function getTiktok($column)
    {
        // Hitung jumlah data TikTok
        $tiktokCount = DB::table('datalatih')
            ->where('kelas', 'B')
            ->count();

        // Hitung jumlah data TikTok yang berpengaruh
        $tiktokBerpengaruhCount = DB::table('datalatih')
            ->where('sosmed', 'tiktok')
            ->where('kelas', 'B')
            ->count();

        // Cek apakah $tiktokCount adalah nol
        if ($tiktokCount > 0) {
            $nilaiTiktokBerpengaruh = $tiktokBerpengaruhCount / $tiktokCount;
        } else {
            $nilaiTiktokBerpengaruh = 0; // Atau nilai lain yang sesuai
        }

        return $nilaiTiktokBerpengaruh;
    }

    public static function getInstagram($column)
    {
        // Hitung jumlah data TikTok
        $instagramCount = DB::table('datalatih')
            ->where('kelas', 'B')
            ->count();

        // Hitung jumlah data TikTok yang berpengaruh
        $instagramBerpengaruhCount = DB::table('datalatih')
            ->where('sosmed', 'instagram')
            ->where('kelas', 'B')
            ->count();

        // Cek apakah $tiktokCount adalah nol
        if ($instagramCount > 0) {
            $nilaiInstagramBerpengaruh = $instagramBerpengaruhCount / $instagramCount;
        } else {
            $nilaiInstagramBerpengaruh = 0;
        }

        return $nilaiInstagramBerpengaruh;
    }

    public static function getFacebook($column)
    {
        // Hitung jumlah data TikTok
        $facebookCount = DB::table('datalatih')
            ->where('kelas', 'B')
            ->count();

        // Hitung jumlah data TikTok yang berpengaruh
        $facebookBerpengaruhCount = DB::table('datalatih')
            ->where('sosmed', 'facebook')
            ->where('kelas', 'B')
            ->count();

        // Cek apakah $tiktokCount adalah nol
        if ($facebookCount > 0) {
            $nilaiFacebookBerpengaruh = $facebookBerpengaruhCount / $facebookCount;
        } else {
            $nilaiFacebookBerpengaruh = 0;
        }

        return $nilaiFacebookBerpengaruh;
    }
}
