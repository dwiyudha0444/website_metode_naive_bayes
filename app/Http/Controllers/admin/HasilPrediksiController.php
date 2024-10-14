<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HasilPrediksi;
use App\Models\KenaikanKeuntungan;
use App\Models\Keuntungan;
use App\Models\PengaruhEvent;
use App\Models\Sosmed;
use App\Models\Produk;
use App\Models\Waktu;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;


class HasilPrediksiController extends Controller
{
    public function index_aff()
    {
        // Mengambil data hasil_prediksi beserta relasi sosmed
        $hasil_prediksi = HasilPrediksi::orderBy('id', 'DESC')->get();

        return view('affiliate.prediksi.riwayat.index', compact('hasil_prediksi'));
    }

    public function show_aff($id)
    {
        
        session(['current_id2' => $id]);
        session(['previous_url2' => url()->previous()]);

        $hasil_prediksi = HasilPrediksi::with(
            'sosmeds',
            'keuntungan',
            'pengaruh_event',
            'kenaikan_keuntungan',
            'produk',
            'waktu',
            'kelas',
        )->findOrFail($id);


        $relasi_sosmed = Sosmed::all();
        $relasi_keuntungan = Keuntungan::all();
        $relasi_pengaruh_event = PengaruhEvent::all();
        $relasi_kenaikan_keuntungan = KenaikanKeuntungan::all();
        $relasi_produk = Produk::all();
        $relasi_waktu = Waktu::all();
        $relasi_kelas = Kelas::all();
        return view('affiliate.prediksi.riwayat.detail', compact(
            'hasil_prediksi',
            'relasi_sosmed',
            'relasi_keuntungan',
            'relasi_pengaruh_event',
            'relasi_kenaikan_keuntungan',
            'relasi_produk',
            'relasi_waktu',
            'relasi_kelas',
        ));
    }

    public function destroy_aff($id)
    {
        $datalatih = HasilPrediksi::findOrFail($id);
        $datalatih->delete();
        return redirect('riwayat_prediksi_aff')->with('success', 'Berhasil Menghapus User');
    }

    public function addData_aff(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'b' => 'required',
            'tb' => 'required',
        ]);

        // Insert data dari request form
        DB::table('hitung_prediksi')->insert([
            'nama' => $request->nama,
            'b' => $request->b,
            'tb' => $request->tb,
            'updated_at' => now(),
            'created_at' => now(),
        ]);


        return redirect('perhitungan_prediksi')->with('success', 'Berhasil');
    }

    public function index()
    {
        // Mengambil data hasil_prediksi beserta relasi sosmed
        $hasil_prediksi = HasilPrediksi::orderBy('id', 'DESC')->get();

        return view('admin.prediksi.riwayat.index', compact('hasil_prediksi'));
    }

    public function show($id)
    {
        session(['current_id' => $id]);
        session(['previous_url' => url()->previous()]);

        $hasil_prediksi = HasilPrediksi::with(
            'sosmeds',
            'keuntungan',
            'pengaruh_event',
            'kenaikan_keuntungan',
            'produk',
            'waktu',
            'kelas',
        )->findOrFail($id);


        $relasi_sosmed = Sosmed::all();
        $relasi_keuntungan = Keuntungan::all();
        $relasi_pengaruh_event = PengaruhEvent::all();
        $relasi_kenaikan_keuntungan = KenaikanKeuntungan::all();
        $relasi_produk = Produk::all();
        $relasi_waktu = Waktu::all();
        $relasi_kelas = Kelas::all();
        return view('admin.prediksi.riwayat.detail', compact(
            'hasil_prediksi',
            'relasi_sosmed',
            'relasi_keuntungan',
            'relasi_pengaruh_event',
            'relasi_kenaikan_keuntungan',
            'relasi_produk',
            'relasi_waktu',
            'relasi_kelas',
        ));
    }

    public function destroy($id)
    {
        $datalatih = HasilPrediksi::findOrFail($id);
        $datalatih->delete();
        return redirect('riwayat_prediksi')->with('success', 'Berhasil Menghapus User');
    }

    public function addData(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'b' => 'required',
            'tb' => 'required',
        ]);

        // Insert data dari request form
        DB::table('hitung_prediksi')->insert([
            'nama' => $request->nama,
            'b' => $request->b,
            'tb' => $request->tb,
            'updated_at' => now(),
            'created_at' => now(),
        ]);


        return redirect('perhitungan_prediksi')->with('success', 'Berhasil');
    }
}
