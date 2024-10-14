<?php

namespace App\Http\Controllers\affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataLatih;
use App\Models\Biodata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataLatihAffController extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();
    
        // Mengambil data berdasarkan ID pengguna yang sedang login
        $datalatih = DataLatih::where('id_biodata', $userId)
                              ->orderBy('id', 'DESC')
                              ->get();
    
        return view('affiliate.datalatih.index', compact('datalatih'));
    }
    

    public function create()
    {
        // Cek apakah sudah ada data yang dimasukkan oleh pengguna di bulan berjalan
        $existingData = DB::table('datalatih')
            ->where('id_biodata', Auth::user()->id) // Sesuaikan dengan ID biodata pengguna yang login
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->exists();
    
        if ($existingData) {
            // Jika sudah ada data, kembalikan dengan pesan bahwa data sudah terisi
            return redirect()->route('datalatih_aff')->with('error', 'Data sudah terisi, tunggu bulan selanjutnya untuk menambah data.');
        }
    
        // Jika belum ada data, arahkan ke form input data
        $rel_biodata = Biodata::all();
        return view('affiliate.datalatih.form', compact('rel_biodata'));
    }
    

    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'id_biodata' => 'required',
            'sosmed' => 'required',
            'keuntungan' => 'required',
            'pengaruh_event' => 'required',
            'kenaikan_keuntungan' => 'required',
            'produk' => 'required',
            'waktu' => 'required',
            'kelas' => 'required',
        ]);

        // Cek apakah sudah ada data yang dimasukkan oleh pengguna di bulan berjalan
        $existingData = DB::table('datalatih')
            ->where('id_biodata', $request->id_biodata)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->exists();

        if ($existingData) {
            // Jika data sudah ada, tampilkan pesan error
            return redirect()->back()->with('error', 'Anda hanya bisa menambah data satu kali per bulan.');
        }

        // Insert data baru jika belum ada di bulan berjalan
        DB::table('datalatih')->insert([
            'id_biodata' => $request->id_biodata,
            'sosmed' => $request->sosmed,
            'keuntungan' => $request->keuntungan,
            'pengaruh_event' => $request->pengaruh_event,
            'kenaikan_keuntungan' => $request->kenaikan_keuntungan,
            'produk' => $request->produk,
            'waktu' => $request->waktu,
            'kelas' => $request->kelas,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        return redirect()->route('datalatih_aff')->with('success', 'Data Berhasil Disimpan');
    }


    public function edit($id)
    {
        $rel_biodata = Biodata::all();
        $datalatih = DataLatih::find($id);
        return view('affiliate.datalatih.form_edit', compact('datalatih', 'rel_biodata'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_biodata' => 'required',
            'sosmed' => 'required',
            'keuntungan' => 'required',
            'pengaruh_event' => 'required',
            'produk' => 'required',
            'waktu' => 'required',
            'kelas' => 'required',
        ]);

        DB::table('datalatih')->where('id', $id)->update([
            'id_biodata' => $request->id_biodata,
            'sosmed' => $request->sosmed,
            'keuntungan' => $request->keuntungan,
            'pengaruh_event' => $request->pengaruh_event,
            'produk' => $request->produk,
            'waktu' => $request->waktu,
            'kelas' => $request->kelas,
            'updated_at' => now(),
        ]);

        return redirect()->route('datalatih_aff')
            ->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $datalatih = DataLatih::findOrFail($id);
        $datalatih->delete();
        return redirect('datalatih_aff')->with('success', 'Berhasil Menghapus User');
    }
}
