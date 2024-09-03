<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class ProdukHelpers
{
    public static function getProdukSatu($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('produk', 'FAF')
            ->where('kelas', 'B')
            ->count();


        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }

    public static function getProdukDua($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('produk', 'KPD')
            ->where('kelas', 'B')
            ->count();


        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }

    public static function getProdukTiga($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('produk', 'PSH')
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
    public static function getProdukSatuTB($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('produk', 'FAF')
            ->where('kelas', 'TB')
            ->count();


        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }

    public static function getProdukDuaTB($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('produk', 'KPD')
            ->where('kelas', 'TB')
            ->count();


        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }

    public static function getProdukTigaTB($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->count();


        $kelasCount = DB::table('datalatih')
            ->where('produk', 'PSH')
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
