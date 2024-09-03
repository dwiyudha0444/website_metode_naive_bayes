<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class PengaruhEventHelpers
{
    public static function getPengaruhEventSatu($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->count();

        $kelasCount = DB::table('datalatih')
            ->where('pengaruh_event', 'ya')
            ->where('kelas', 'B')
            ->count();

        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }
    public static function getPengaruhEventDua($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'B')
            ->count();

        $kelasCount = DB::table('datalatih')
            ->where('pengaruh_event', 'mungkin')
            ->where('kelas', 'B')
            ->count();

        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }

    public static function getPengaruhEventSatuTB($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->count();

        $kelasCount = DB::table('datalatih')
            ->where('pengaruh_event', 'ya')
            ->where('kelas', 'TB')
            ->count();

        if ($Count > 0) {
            $nilai = $kelasCount / $Count;
        } else {
            $nilai = 0;
        }

        return $nilai;
    }
    public static function getPengaruhEventDuaTB($column)
    {

        $Count = DB::table('datalatih')
            ->where('kelas', 'TB')
            ->count();

        $kelasCount = DB::table('datalatih')
            ->where('pengaruh_event', 'mungkin')
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
