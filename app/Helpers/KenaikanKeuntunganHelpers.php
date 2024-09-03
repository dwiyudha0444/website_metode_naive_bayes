<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class KenaikanKeuntunganHelpers
{
    public static function getKenaikanKeuntunganSatu($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('kenaikan_keuntungan', 'Lebih dari Rp 200.000')
            ->where('kelas', 'B')
            ->count();


        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }

    public static function getKenaikanKeuntunganDua($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('kenaikan_keuntungan', 'Lebih dari Rp 50.000')
            ->where('kelas', 'B')
            ->count();


        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }

    public static function getKenaikanKeuntunganTiga($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('kenaikan_keuntungan', 'Kurang dari Rp 150.000')
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
    public static function getKenaikanKeuntunganSatuTB($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('kenaikan_keuntungan', 'Lebih dari Rp 200.000')
            ->where('kelas', 'TB')
            ->count();


        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }

    public static function getKenaikanKeuntunganDuaTB($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('kenaikan_keuntungan', 'Lebih dari Rp 50.000')
            ->where('kelas', 'TB')
            ->count();


        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }

    public static function getKenaikanKeuntunganTigaTB($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('kenaikan_keuntungan', 'Kurang dari Rp 150.000')
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
