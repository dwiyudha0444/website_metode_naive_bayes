<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HasilPrediksi;
use App\Models\Sosmed;
use App\Models\Keuntungan;
use App\Models\PengaruhEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HitungPrediksiController extends Controller
{
    public function index()
    {
        // Mengambil data hasil_prediksi beserta relasi sosmed
        $hasil_prediksi = HasilPrediksi::orderBy('id', 'DESC')->get();
        $relasi_sosmed = Sosmed::all();
        $relasi_keuntungan = Keuntungan::all();
        $relasi_pengaruh_event = PengaruhEvent::all();
        return view('admin.hitung_prediksi.index', compact('hasil_prediksi', 'relasi_sosmed', 'relasi_keuntungan', 'relasi_pengaruh_event'));
    }

    public function showForm(Request $request)
    {
        // Ambil bulan yang dipilih, jika tidak ada gunakan bulan saat ini
        $bulan = $request->input('bulan', Carbon::now()->month);

        // Filter data sosial media berdasarkan bulan
        $relasi_sosmed = Sosmed::whereMonth('created_at', $bulan)->get();
        $relasi_keuntungan = Keuntungan::whereMonth('created_at', $bulan)->get();

        // Simpan bulan yang dipilih untuk dikirim kembali ke view
        $selectedBulan = $bulan;

        return view('admin.hitung_prediksi.index', compact(

            'relasi_sosmed',
            'relasi_keuntungan',
            'selectedBulan'
        ));
    }

    public function create()
    {
        $relasi_sosmed = Sosmed::all();
        $relasi_keuntungan = Keuntungan::all();
        return view('admin.hitung_prediksi.index', compact('relasi_sosmed','relasi_keuntungan'));
    }

    public function store(Request $request)
    {

        // Ambil bulan yang dipilih, jika tidak ada gunakan bulan saat ini
        $bulan = $request->input('bulan', Carbon::now()->month);

        // Filter data sosial media berdasarkan bulan
        $relasi_sosmed = Sosmed::whereMonth('created_at', $bulan)->get();
        $relasi_keuntungan = Keuntungan::whereMonth('created_at', $bulan)->get();

        // Simpan bulan yang dipilih untuk dikirim kembali ke view
        $selectedBulan = $bulan;
        
        $request->validate([
            'bulan' => 'required',
            'id_sosmed' => 'required',
            'id_keuntungan' => 'required',
        ]);

        // Insert data dari request form
        DB::table('hitung_prediksi')->insert([
            'bulan' => $request->bulan,
            'id_sosmed' => $request->id_sosmed,
            'id_keuntungan' => $request->id_keuntungan,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        return view('admin.hitung_prediksi.index', compact(

            'relasi_sosmed',
            'relasi_keuntungan',
            'selectedBulan'));
    }
}
