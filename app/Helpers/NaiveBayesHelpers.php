<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class NaiveBayesHelpers
{
    public static function getBerpengaruh($column)
    {
        $totalCount = DB::table('datalatih')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        if ($totalCount > 0) {
            $berpengaruhCount = DB::table('datalatih')
                ->where('kelas', 'B')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count();
    
            $probabilitas = $berpengaruhCount / $totalCount;
        } else {
            $probabilitas = 0;
        }
    
        return $probabilitas;
    }
    
    public static function getTidakBerpengaruh($column)
    {
        $totalCount = DB::table('datalatih')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        if ($totalCount > 0) {
            $tidakBerpengaruhCount = DB::table('datalatih')
                ->where('kelas', 'TB')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count();
    
            $probabilitas = $tidakBerpengaruhCount / $totalCount;
        } else {
            $probabilitas = 0;
        }
    
        return $probabilitas;
    }
    
    public static function getTiktok($column)
    {
        $tiktokCount = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $tiktokBerpengaruhCount = DB::table('datalatih')
            ->where('sosmed', 'tiktok')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $tiktokCount > 0 ? $tiktokBerpengaruhCount / $tiktokCount : 0;
    }
    
    public static function getInstagram($column)
    {
        $instagramCount = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $instagramBerpengaruhCount = DB::table('datalatih')
            ->where('sosmed', 'instagram')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $instagramCount > 0 ? $instagramBerpengaruhCount / $instagramCount : 0;
    }
    
    public static function getFacebook($column)
    {
        $facebookCount = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $facebookBerpengaruhCount = DB::table('datalatih')
            ->where('sosmed', 'facebook')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $facebookCount > 0 ? $facebookBerpengaruhCount / $facebookCount : 0;
    }
    
}
