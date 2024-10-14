<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataLatih;
use App\Models\Biodata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataLatihController extends Controller
{
    public function index()
    {
        $sosmedTotals = DB::table('datalatih')
            ->select('sosmed', DB::raw('count(*) as total'))
            ->groupBy('sosmed')
            ->get();

        $keuntungan = DB::table('datalatih')
            ->select('keuntungan', DB::raw('count(*) as total'))
            ->groupBy('keuntungan')
            ->get();

        $pengaruh_event = DB::table('datalatih')
            ->select('pengaruh_event', DB::raw('count(*) as total'))
            ->groupBy('pengaruh_event')
            ->get();

        $kenaikan_keuntungan = DB::table('datalatih')
            ->select('kenaikan_keuntungan', DB::raw('count(*) as total'))
            ->groupBy('kenaikan_keuntungan')
            ->get();


        $produk = DB::table('datalatih')
            ->select('produk', DB::raw('count(*) as total'))
            ->groupBy('produk')
            ->get();

        $waktu = DB::table('datalatih')
            ->select('waktu', DB::raw('count(*) as total'))
            ->groupBy('waktu')
            ->get();

        $kelas = DB::table('datalatih')
            ->select('kelas', DB::raw('count(*) as total'))
            ->groupBy('kelas')
            ->get();

        $datalatih = DataLatih::all();
        $rel_biodata = Biodata::all();
        return view('admin.data_latih.index', compact(
            'datalatih',
            'rel_biodata',
            'sosmedTotals',
            'keuntungan',
            'pengaruh_event',
            'kenaikan_keuntungan',
            'produk',
            'waktu',
            'kelas'
        ));
    }

    public function create()
    {
        $rel_biodata = Biodata::all();
        //arahkan ke form input data
        return view('admin.data_latih.form', compact('rel_biodata'));
    }

    public function store(Request $request)
    {
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

        // Insert data dari request form
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

        return redirect()->route('datalatih')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $rel_biodata = Biodata::all();
        $datalatih = DataLatih::find($id);
        return view('admin.data_latih.form_edit', compact('datalatih', 'rel_biodata'));
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

        return redirect()->route('datalatih')
            ->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $datalatih = DataLatih::findOrFail($id);
        $datalatih->delete();
        return redirect('datalatih')->with('success', 'Berhasil Menghapus User');
    }

    public function getSosmedData()
    {
        // Mengelompokkan berdasarkan nilai kolom 'sosmed' dan menghitung totalnya
        $sosmedTotals = DB::table('datalatih')
            ->select('sosmed', DB::raw('count(*) as total'))
            ->groupBy('sosmed')
            ->get();

        return view('datalatih', compact('sosmedTotals'));
    }
}
