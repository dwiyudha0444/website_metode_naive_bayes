<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HasilPrediksi;
use App\Models\Sosmed;
use App\Models\Keuntungan;
use App\Models\PengaruhEvent;
use App\Models\HitungPrediksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HitungPrediksiController extends Controller
{
    public function index()
    {

        // Ambil data tambahan
        $hasil_prediksi = HasilPrediksi::orderBy('id', 'DESC')->get();
        $relasi_sosmed = Sosmed::all();
        $relasi_keuntungan = Keuntungan::all();
        $relasi_pengaruh_event = PengaruhEvent::all();

        // Kirim variabel ke view
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
        return view('admin.hitung_prediksi.index', compact('relasi_sosmed', 'relasi_keuntungan'));
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
            'selectedBulan'
        ));
    }

    public function show($id)
    {
        // Mengambil data prediksi terbaru berdasarkan 'created_at'
        $hasil_prediksi = HitungPrediksi::with('sosmeds')
            ->where('id', $id)
            ->latest('created_at')
            ->firstOrFail();  // Mengambil satu data terbaru

        // Mengambil semua data dari tabel Sosmed
        $relasi_sosmed = Sosmed::all();

        return view('admin.hitung_prediksi.hasil', compact('hasil_prediksi', 'relasi_sosmed'));
    }


    public function destroyAll()
    {
        HitungPrediksi::truncate();  // Menghapus semua data dan reset auto-increment

        return redirect('hasil_hitung_prediksi')->with('success', 'Berhasil Menghapus Semua Data');
    }
}
