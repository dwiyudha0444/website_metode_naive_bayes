<?php

namespace App\Http\Controllers\affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use DB;

class BiodataController extends Controller
{
    public function index()
    {
        $biodata = Biodata::orderBy('id','DESC')->get();
        return view('affiliate.biodata.index',compact('biodata'));
    }

    public function create()
    {
        $biodata = Biodata::orderBy('id','DESC')->get();
        return view('affiliate.biodata.form',compact('biodata'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:45',
            'umur' => 'required',
            'produk' => 'required',
            'sosmed' => 'required',
            'penghasilan' => 'required',
            'waktu_bergabung' => 'required',
        ]);
        
        DB::table('biodata')->insert([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'produk' => $request->produk,
            'sosmed' => $request->sosmed,
            'penghasilan' => $request->penghasilan,
            'waktu_bergabung' => $request->waktu_bergabung,
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    
        return redirect()->route('biodata')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $biodata = Biodata::find($id);
        return view('affiliate.biodata.form_edit',compact('biodata'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:45',
            'umur' => 'required',
            'produk' => 'required',
            'sosmed' => 'required',
            'penghasilan' => 'required',
            'waktu_bergabung' => 'required',
        ]);

        DB::table('biodata')->where('id', $id)->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'produk' => $request->produk,
            'sosmed' => $request->sosmed,
            'penghasilan' => $request->penghasilan,
            'waktu_bergabung' => $request->waktu_bergabung,
            'updated_at' => now(),
        ]);

        return redirect()->route('biodata')
            ->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $biodata = Biodata::findOrFail($id);
        $biodata->delete();
        return redirect('biodata')->with('success', 'Berhasil Menghapus User');
    }
}
