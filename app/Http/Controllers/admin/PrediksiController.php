<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\NaiveBayesHelpers;
use App\Helpers\SosmedHelpers;
use App\Helpers\KeuntunganHelpers;
use App\Helpers\PengaruhEventHelpers;
use App\Helpers\KenaikanKeuntunganHelpers;

class PrediksiController extends Controller
{
    public function index()
    {
        $probabilitasBerpengaruh = NaiveBayesHelpers::getBerpengaruh('kelas');
        $probabilitasTidakBerpengaruh = NaiveBayesHelpers::getTidakBerpengaruh('kelas');

        $facebookData = NaiveBayesHelpers::getfacebook('kelas');
        $tiktokData = NaiveBayesHelpers::getTiktok('kelas');
        $instagramData = NaiveBayesHelpers::getinstagram('kelas');

        $facebookDataTB = SosmedHelpers::getfacebook('kelas');
        $tiktokDataTB = SosmedHelpers::getTiktok('kelas');
        $instagramDataTB = SosmedHelpers::getinstagram('kelas');

        $keuntunganSatuB = KeuntunganHelpers::getKeuntunganSatu('kelas');
        $keuntunganDuaB = KeuntunganHelpers::getKeuntunganDua('kelas');
        $keuntunganTigaB = KeuntunganHelpers::getKeuntunganTiga('kelas');

        $keuntunganSatuTB = KeuntunganHelpers::getKeuntunganSatuTB('kelas');
        $keuntunganDuaTB = KeuntunganHelpers::getKeuntunganDuaTB('kelas');
        $keuntunganTigaTB = KeuntunganHelpers::getKeuntunganTigaTB('kelas');

        $pengaruhEventSatuB = PengaruhEventHelpers::getPengaruhEventSatu('kelas');
        $pengaruhEventDuaB = PengaruhEventHelpers::getPengaruhEventDua('kelas');

        $pengaruhEventSatuTB = PengaruhEventHelpers::getPengaruhEventSatuTB('kelas');
        $pengaruhEventDuaTB = PengaruhEventHelpers::getPengaruhEventDuaTB('kelas');

        $kenaikanKeuntunganSatuB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganSatu('kelas');
        $kenaikanKeuntunganDuaB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganDua('kelas');
        $kenaikanKeuntunganTigaB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganTiga('kelas');

        $kenaikanKeuntunganSatuTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganSatuTB('kelas');
        $kenaikanKeuntunganDuaTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganDuaTB('kelas');
        $kenaikanKeuntunganTigaTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganTigaTB('kelas');

        return view('admin.prediksi.index', compact(
            'probabilitasBerpengaruh',
            'probabilitasTidakBerpengaruh',
            'facebookData',
            'tiktokData',
            'instagramData',
            'facebookDataTB',
            'tiktokDataTB',
            'instagramDataTB',
            'keuntunganSatuB',
            'keuntunganDuaB',
            'keuntunganTigaB',
            'keuntunganSatuTB',
            'keuntunganDuaTB',
            'keuntunganTigaTB',
            'pengaruhEventSatuB',
            'pengaruhEventDuaB',
            'pengaruhEventSatuTB',
            'pengaruhEventDuaTB',
            'kenaikanKeuntunganSatuB',
            'kenaikanKeuntunganDuaB',
            'kenaikanKeuntunganTigaB',
            'kenaikanKeuntunganSatuTB',
            'kenaikanKeuntunganDuaTB',
        ));
    }
}
