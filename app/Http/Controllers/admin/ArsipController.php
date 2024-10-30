<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arsip;
use App\Models\HitungPrediksi;

class ArsipController extends Controller
{
    public function index()
    {
        $arsip = Arsip::all(); 
        $data2 = HitungPrediksi::orderBy('id', 'DESC')->get(); 
        return view('admin.arsip.index', compact('arsip'));
    }
}
