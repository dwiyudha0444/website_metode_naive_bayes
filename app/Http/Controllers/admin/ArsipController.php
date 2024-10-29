<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arsip;

class ArsipController extends Controller
{
    public function index()
    {
        $arsip = Arsip::all();  // Ambil semua data prediksi
        return view('admin.arsip.index', compact('arsip'));
    }
}
