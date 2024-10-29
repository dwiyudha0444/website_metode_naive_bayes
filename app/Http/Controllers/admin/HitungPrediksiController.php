<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HasilPrediksi;
use App\Models\Sosmed;
use App\Models\Keuntungan;
use App\Models\PengaruhEvent;
use App\Models\HitungPrediksi;
use App\Models\Produk;
use App\Models\Kelas;
use Carbon\Carbon;
use App\Models\Arsip;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


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

    public function saveSelectedData(Request $request)
    {
        $data = json_decode($request->input('data'), true);
    
        foreach ($data as $item) {
            HitungPrediksi::updateOrCreate(
                ['id' => $item['id']],
                ['nama' => $item['nama'], 'b' => $item['b'], 'tb' => $item['tb']]
            );
        }
    
        // Ambil id dari session
        $id = session('current_id');
        
        // Redirect ke halaman dengan id yang diambil dari session
        return redirect()->route('perhitungan_prediksi', ['id' => $id])->with('success', 'Hasil Prediksi berhasil disimpan');
    }
    

    public function indexDetail($id)
    {
        $dataKelas = Kelas::all();
        
        $hasil_prediksi = HasilPrediksi::with(
            'sosmeds',
            'keuntungan',
            'pengaruh_event',
            'kenaikan_keuntungan',
            'produk',
            'waktu',
            'kelas',
        )->findOrFail($id);

        $hasil_prediksi2 = HasilPrediksi::with(
            'sosmeds',
            'keuntungan',
            'pengaruh_event',
            'kenaikan_keuntungan',
            'produk',
            'waktu',
            'kelas',
        )->findOrFail($id);

        $nilaiB = Kelas::where('id', 1)->pluck('nilai')->first();
        $nilaiTB = Kelas::where('id', 2)->pluck('nilai')->first();

        // Mengambil semua nilai dari kolom b
        $dataB = HitungPrediksi::pluck('b');

        // Mengalikan semua nilai dari kolom b
        $totalPerkalianB = $dataB->reduce(function ($carry, $item) {
            return $carry * $item;
        }, 1);

        $dataTB = HitungPrediksi::pluck('tb');

        // Mengalikan semua nilai dari kolom tb
        $totalPerkalianTB = $dataTB->reduce(function ($carry, $item) {
            return $carry * $item;
        }, 1);

        $totalFinalB = $totalPerkalianB * $nilaiB;
        $totalFinalTB = $totalPerkalianTB * $nilaiTB;


        $data = HitungPrediksi::orderBy('id', 'DESC')->get();
        // $data5 = HitungPrediksi::orderBy('id', 'DESC')->get();
        return view('admin.prediksi.riwayat.hasil', compact('hasil_prediksi','hasil_prediksi2','dataKelas','data','totalFinalB','totalFinalTB','totalPerkalianB','totalPerkalianTB'));
    }

    public function destroyAll()
    {
        HitungPrediksi::truncate();  // Menghapus semua data dan reset auto-increment

        return redirect(session('previous_url'))->with('success', 'Berhasil Riset');


    }

    public function store_data_arsip(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required|array',
        //     'b' => 'required|array',
        //     'tb' => 'required|array',
        // ]);
    
        // // Menyimpan data dari nama, b, tb, dan nilai
        // for ($i = 0; $i < count($request->nama); $i++) {
        //     DB::table('arsip')->insert([
        //         'nama' => $request->nama[$i],
        //         'b' => $request->b[$i],
        //         'tb' => $request->tb[$i],
        //         'updated_at' => now(),
        //         'created_at' => now(),
        //     ]);
        // }

        // $request->validate([
        //     'nama' => 'required|array',
        //     'nilai' => 'required|array',
        // ]);
    
        // // Menyimpan data dari nama, b, tb, dan nilai
        // for ($i = 0; $i < count($request->nama); $i++) {
        //     DB::table('arsip')->insert([
        //         'nama' => $request->nama[$i],
        //         'nilai' => $request->nilai[$i],
        //         'updated_at' => now(),
        //         'created_at' => now(),
        //     ]);
        // }
    
        return redirect()->route('pepe')->with('success', 'Data Berhasil Disimpan');
    }
    
    
    

    public function index_aff()
    {

        // Ambil data tambahan
        $hasil_prediksi = HasilPrediksi::orderBy('id', 'DESC')->get();
        $relasi_sosmed = Sosmed::all();
        $relasi_keuntungan = Keuntungan::all();
        $relasi_pengaruh_event = PengaruhEvent::all();

        // Kirim variabel ke view
        return view('affiliate.hitung_prediksi.index', compact('hasil_prediksi', 'relasi_sosmed', 'relasi_keuntungan', 'relasi_pengaruh_event'));
    }
    

    public function showForm_aff(Request $request)
    {
        // Ambil bulan yang dipilih, jika tidak ada gunakan bulan saat ini
        $bulan = $request->input('bulan', Carbon::now()->month);

        // Filter data sosial media berdasarkan bulan
        $relasi_sosmed = Sosmed::whereMonth('created_at', $bulan)->get();
        $relasi_keuntungan = Keuntungan::whereMonth('created_at', $bulan)->get();

        // Simpan bulan yang dipilih untuk dikirim kembali ke view
        $selectedBulan = $bulan;

        return view('affiliate.hitung_prediksi.index', compact(

            'relasi_sosmed',
            'relasi_keuntungan',
            'selectedBulan'
        ));
    }

    public function create_aff()
    {
        $relasi_sosmed = Sosmed::all();
        $relasi_keuntungan = Keuntungan::all();
        return view('affiliate.hitung_prediksi.index', compact('relasi_sosmed', 'relasi_keuntungan'));
    }

    public function store_aff(Request $request)
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

        return view('affiliate.hitung_prediksi.index', compact(

            'relasi_sosmed',
            'relasi_keuntungan',
            'selectedBulan'
        ));
    }

    public function show_aff($id)
    {
        // Mengambil data prediksi terbaru berdasarkan 'created_at'
        $hasil_prediksi = HitungPrediksi::with('sosmeds')
            ->where('id', $id)
            ->latest('created_at')
            ->firstOrFail();  // Mengambil satu data terbaru

        // Mengambil semua data dari tabel Sosmed
        $relasi_sosmed = Sosmed::all();

        return view('affiliate.hitung_prediksi.hasil', compact('hasil_prediksi', 'relasi_sosmed'));
    }

    public function saveSelectedData_aff(Request $request)
    {
        $data = json_decode($request->input('data'), true);

        foreach ($data as $item) {
            HitungPrediksi::updateOrCreate(
                ['id' => $item['id']],
                ['nama' => $item['nama'], 'b' => $item['b'], 'tb' => $item['tb']]
            );
        }

        return redirect('perhitungan_prediksi_aff')->with('success', 'Hasil Prediksi');
    }

    public function indexDetail_aff()
    {
        $dataKelas = Kelas::all();

        $nilaiB = Kelas::where('id', 1)->pluck('nilai')->first();
        $nilaiTB = Kelas::where('id', 2)->pluck('nilai')->first();

        // Mengambil semua nilai dari kolom b
        $dataB = HitungPrediksi::pluck('b');

        // Mengalikan semua nilai dari kolom b
        $totalPerkalianB = $dataB->reduce(function ($carry, $item) {
            return $carry * $item;
        }, 1);

        $dataTB = HitungPrediksi::pluck('tb');

        // Mengalikan semua nilai dari kolom tb
        $totalPerkalianTB = $dataTB->reduce(function ($carry, $item) {
            return $carry * $item;
        }, 1);

        $totalFinalB = $totalPerkalianB * $nilaiB;
        $totalFinalTB = $totalPerkalianTB * $nilaiTB;


        $data = HitungPrediksi::orderBy('id', 'DESC')->get();
        return view('affiliate.prediksi.riwayat.hasil', compact('dataKelas','data','totalFinalB','totalFinalTB','totalPerkalianB','totalPerkalianTB'));
    }

    public function destroyAll_aff()
    {
        HitungPrediksi::truncate();  // Menghapus semua data dan reset auto-increment

        return redirect(session('previous_url'))->with('success', 'Berhasil Riset');


    }

    public function saveDataPrediksi(Request $request)
    {
        // Data untuk di-render ke PDF
        $data = [
            'id_user' => $request->id_user,
        ];
    
        // Generate PDF menggunakan library DomPDF
        $pdf = PDF::loadView('pdf_template', $data);
    
        // Tentukan path ke folder public
        $pdfPath = 'prediksi/pdf/' . time() . '_hasil_prediksi.pdf';
    
        // Simpan file PDF di folder public
        file_put_contents(public_path($pdfPath), $pdf->output());
    
        // Simpan path PDF ke database
        Arsip::create([
            'nama' => 'nama',
            'id_user' => 'id_user',
            'pdf_path' => $pdfPath,
        ]);
    
        return redirect()->back()->with('success', 'Data prediksi berhasil disimpan sebagai PDF');
    }
    
}
