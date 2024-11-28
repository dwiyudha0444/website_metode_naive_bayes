<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class KeuntunganHelpers
{
    public static function getKeuntunganSatu($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('keuntungan', 'Lebih dari Rp 1.000.000')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getKeuntunganDua($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('keuntungan', 'Lebih dari Rp 500.000')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getKeuntunganTiga($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('keuntungan', 'Kurang dari Rp 500.000')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getKeuntunganSatuTB($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('keuntungan', 'Lebih dari Rp 1.000.000')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getKeuntunganDuaTB($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('keuntungan', 'Lebih dari Rp 500.000')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getKeuntunganTigaTB($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('keuntungan', 'Kurang dari Rp 500.000')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
}
