<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\NaiveBayesHelpers;

class PrediksiController extends Controller
{
    public function index()
    {
        $probabilitasBerpengaruh = NaiveBayesHelpers::getBerpengaruh('kelas');
        $probabilitasTidakBerpengaruh = NaiveBayesHelpers::getTidakBerpengaruh('kelas');
        $getfacebook = NaiveBayesHelpers::getfacebook('sosmed');
        $gettiktok = NaiveBayesHelpers::gettiktok('sosmed');
        $getinstagram = NaiveBayesHelpers::getinstagram('sosmed');

        return view('admin.prediksi.index', compact(
            'probabilitasBerpengaruh',
            'probabilitasTidakBerpengaruh',
            'getfacebook',
            'gettiktok',
            'getinstagram'
        ));
    } 
}
