<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\HitungPrediksi;
use App\Models\Kelas;

class downloadPdfController extends Controller
{


    public function downloadPdf()
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


        $data = HitungPrediksi::all(); // Ambil data yang ingin dimasukkan ke PDF
        $dataKelas = Kelas::all(); // Ambil data kelas

        $pdf = Pdf::loadView('pdf', compact('dataKelas','data','totalFinalB','totalFinalTB','totalPerkalianB','totalPerkalianTB'));

        return $pdf->download('hasil_prediksi.pdf'); // Nama file PDF yang diunduh
    }

    public function indexDetail()
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
        return view('admin.prediksi.riwayat.hasil', compact('dataKelas','data','totalFinalB','totalFinalTB','totalPerkalianB','totalPerkalianTB'));
    }
}
