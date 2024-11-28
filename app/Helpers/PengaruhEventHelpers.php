<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class PengaruhEventHelpers
{
    public static function getPengaruhEventSatu($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('pengaruh_event', 'ya')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getPengaruhEventDua($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('pengaruh_event', 'mungkin')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getPengaruhEventSatuTB($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('pengaruh_event', 'ya')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getPengaruhEventDuaTB($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('pengaruh_event', 'mungkin')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
}
