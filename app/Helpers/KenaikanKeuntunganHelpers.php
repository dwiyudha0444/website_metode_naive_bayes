<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class KenaikanKeuntunganHelpers
{
    public static function getKenaikanKeuntunganSatu($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('kenaikan_keuntungan', 'Lebih dari Rp 200.000')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getKenaikanKeuntunganDua($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('kenaikan_keuntungan', 'Lebih dari Rp 50.000')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getKenaikanKeuntunganTiga($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('kenaikan_keuntungan', 'Kurang dari Rp 150.000')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    // TB
    public static function getKenaikanKeuntunganSatuTB($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('kenaikan_keuntungan', 'Lebih dari Rp 200.000')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getKenaikanKeuntunganDuaTB($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('kenaikan_keuntungan', 'Lebih dari Rp 50.000')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getKenaikanKeuntunganTigaTB($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('kenaikan_keuntungan', 'Kurang dari Rp 150.000')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
}
