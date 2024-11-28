<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class WaktuHelpers
{
    public static function getWaktuSatu($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('waktu', '1')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getWaktuDua($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('waktu', '2')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getWaktuTiga($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('waktu', '3')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    // TB
    public static function getWaktuSatuTB($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('waktu', '1')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getWaktuDuaTB($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('waktu', '2')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getWaktuTigaTB($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('waktu', '3')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
}
