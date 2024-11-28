<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class ProdukHelpers
{
    public static function getProdukSatu($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('produk', 'FAF')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getProdukDua($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('produk', 'KPD')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getProdukTiga($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('produk', 'PSH')
            ->where('kelas', 'B')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    // TB
    public static function getProdukSatuTB($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('produk', 'FAF')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getProdukDuaTB($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('produk', 'KPD')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
    public static function getProdukTigaTB($column)
    {
        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        $kelasCount = DB::table('datalatih')
            ->where('produk', 'PSH')
            ->where('kelas', 'TB')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    
        return $Count > 0 ? $kelasCount / $Count : 0;
    }
    
}
