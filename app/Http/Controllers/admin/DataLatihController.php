<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataLatih;
use App\Models\Biodata;
use Illuminate\Support\Facades\DB;

class DataLatihController extends Controller
{
    public function index()
    {
        $datalatih = DataLatih::orderBy('id', 'DESC')->get();
        return view('admin.data_latih.index', compact('datalatih'));
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
}
