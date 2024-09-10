<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HasilPrediksi;
use App\Models\Sosmed;


class HasilPrediksiController extends Controller
{
    public function index()
    {
        // Mengambil data hasil_prediksi beserta relasi sosmed
        $hasil_prediksi = HasilPrediksi::orderBy('id', 'DESC')->get();
        
        return view('admin.prediksi.riwayat.index', compact('hasil_prediksi'));
    }

    public function show($id)
    {
        $hasil_prediksi = HasilPrediksi::with('sosmeds')->findOrFail($id);
        $relasi_sosmed = Sosmed::all();
        return view('admin.prediksi.riwayat.detail',compact('hasil_prediksi','relasi_sosmed'));
    }

    public function destroy($id)
    {
        $datalatih = HasilPrediksi::findOrFail($id);
        $datalatih->delete();
        return redirect('riwayat_prediksi')->with('success', 'Berhasil Menghapus User');
    }
    
}
