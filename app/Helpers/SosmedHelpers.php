<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class SosmedHelpers
{
    //Soaial Media Kelas Tidak Berpengaruh
    public static function getTiktok($column)
    {
        // Hitung jumlah data TikTok
        $tiktokCount = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->count();

        // Hitung jumlah data TikTok yang berpengaruh
        $tiktokBerpengaruhCount = DB::table('datalatih')
            ->where('sosmed', 'tiktok')
            ->where('kelas', 'TB')
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
            ->where('kelas', 'TB')
            ->count();

        // Hitung jumlah data TikTok yang berpengaruh
        $instagramBerpengaruhCount = DB::table('datalatih')
            ->where('sosmed', 'instagram')
            ->where('kelas', 'TB')
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
            ->where('kelas', 'TB')
            ->count();

        // Hitung jumlah data TikTok yang berpengaruh
        $facebookBerpengaruhCount = DB::table('datalatih')
            ->where('sosmed', 'facebook')
            ->where('kelas', 'TB')
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
