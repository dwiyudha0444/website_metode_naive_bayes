<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class KeuntunganHelpers{    
        public static function getKeuntunganSatu($column)
        {
            
            $Count = DB::table('datalatih')
                        ->where('kelas', 'B')
                        ->count();
    
            
            $kelasCount = DB::table('datalatih')
                        ->where('keuntungan', 'Lebih dari Rp 1.000.000')
                        ->where('kelas', 'B')
                        ->count();
    
            
            if ($Count > 0) {
                $nilai = $kelasCount / $Count;
            } else {
                $nilai = 0; 
            }
    
            return $nilai;
    
        }

        public static function getKeuntunganDua($column)
        {
            
            $Count = DB::table('datalatih')
                        ->where('kelas', 'B')
                        ->count();
    
            
            $kelasCount = DB::table('datalatih')
                        ->where('keuntungan', 'Lebih dari Rp 500.000')
                        ->where('kelas', 'B')
                        ->count();
    
            
            if ($Count > 0) {
                $nilai = $kelasCount / $Count;
            } else {
                $nilai = 0; 
            }
    
            return $nilai;
    
        }

        public static function getKeuntunganTiga($column)
        {
            
            $Count = DB::table('datalatih')
                        ->where('kelas', 'B')
                        ->count();
    
            
            $kelasCount = DB::table('datalatih')
                        ->where('keuntungan', 'Kurang dari Rp 500.000')
                        ->where('kelas', 'B')
                        ->count();
    
            
            if ($Count > 0) {
                $nilai = $kelasCount / $Count;
            } else {
                $nilai = 0; 
            }
    
            return $nilai;
    
        }
 
        //TB
        public static function getKeuntunganSatuTB($column)
        {
            
            $Count = DB::table('datalatih')
                        ->where('kelas', 'TB')
                        ->count();
    
            
            $kelasCount = DB::table('datalatih')
                        ->where('keuntungan', 'Lebih dari Rp 1.000.000')
                        ->where('kelas', 'TB')
                        ->count();
    
            
            if ($Count > 0) {
                $nilai = $kelasCount / $Count;
            } else {
                $nilai = 0; 
            }
    
            return $nilai;
    
        }

        public static function getKeuntunganDuaTB($column)
        {
            
            $Count = DB::table('datalatih')
                        ->where('kelas', 'TB')
                        ->count();
    
            
            $kelasCount = DB::table('datalatih')
                        ->where('keuntungan', 'Lebih dari Rp 500.000')
                        ->where('kelas', 'TB')
                        ->count();
    
            
            if ($Count > 0) {
                $nilai = $kelasCount / $Count;
            } else {
                $nilai = 0; 
            }
    
            return $nilai;
    
        }

        public static function getKeuntunganTigaTB($column)
        {
            
            $Count = DB::table('datalatih')
                        ->where('kelas', 'TB')
                        ->count();
    
            
            $kelasCount = DB::table('datalatih')
                        ->where('keuntungan', 'Kurang dari Rp 500.000')
                        ->where('kelas', 'TB')
                        ->count();
    
            
            if ($Count > 0) {
                $nilai = $kelasCount / $Count;
            } else {
                $nilai = 0; 
            }
    
            return $nilai;
    
        }
}