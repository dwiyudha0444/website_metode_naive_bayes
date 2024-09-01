<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataLatih;
use App\Models\Biodata;
use DB;

class DataLatihController extends Controller
{
    public function index()
    {
        $datalatih = DataLatih::orderBy('id','DESC')->get();
        return view('admin.data_latih.index',compact('datalatih'));
    }

    public function create()
    {
        $rel_biodata = Biodata::all();
        //arahkan ke form input data
        return view('admin.data_latih.form',compact('rel_biodata'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_biodata' => 'required',
            'sosmed' => 'required',
            'keuntungan' => 'required',
            'pengaruh_event' => 'required',
            'produk' => 'required',
            'waktu' => 'required',
        ]);
    
        // Insert data dari request form
        DB::table('datalatih')->insert([
            'id_biodata' => $request->id_biodata,
            'sosmed' => $request->sosmed,
            'keuntungan' => $request->keuntungan,
            'pengaruh_event' => $request->pengaruh_event, 
            'produk' => $request->produk, 
            'waktu' => $request->waktu, 
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    
        return redirect()->route('datalatih')->with('success', 'Data Berhasil Disimpan');
    }
}