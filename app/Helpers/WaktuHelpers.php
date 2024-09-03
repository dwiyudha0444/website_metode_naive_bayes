<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class WaktuHelpers
{
    public static function getWaktuSatu($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('waktu', '1')
            ->where('kelas', 'B')
            ->count();


        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }

    public static function getWaktuDua($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('waktu', '2')
            ->where('kelas', 'B')
            ->count();


        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }

    public static function getWaktuTiga($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('waktu', '3')
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
    public static function getWaktuSatuTB($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('waktu', '1')
            ->where('kelas', 'TB')
            ->count();


        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }

    public static function getWaktuDuaTB($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('waktu', '2')
            ->where('kelas', 'TB')
            ->count();


        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }

    public static function getWaktuTigaTB($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('waktu', '3')
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
