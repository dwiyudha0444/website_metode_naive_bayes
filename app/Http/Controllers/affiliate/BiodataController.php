<?php

namespace App\Http\Controllers\affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BiodataController extends Controller
{
    public function index()
    {
        // Menampilkan data biodata sesuai dengan id_user yang sedang login
        $biodata = Biodata::where('id_user', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('affiliate.biodata.index', compact('biodata'));
    }

    public function indexAff()
    {
        $biodata = Biodata::orderBy('id', 'DESC')->get();
        return view('admin.biodata_aff.index', compact('biodata'));
    }


    public function create()
    {
        // Cek apakah user yang sedang login sudah memiliki biodata
        $existingData = Biodata::where('id_user', Auth::user()->id)->first();

        if ($existingData) {
            // Jika sudah ada, kembalikan pesan error
            return redirect()->route('biodata')->with('error', 'Anda hanya bisa membuat satu biodata.');
        }

        // Jika belum ada data, lanjutkan ke form create
        return view('affiliate.biodata.form');
    }

    public function createAff()
    {
        return view('admin.biodata_aff.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'nama' => 'required|max:45',
            'umur' => 'required',
            'waktu_bergabung' => 'required',
        ]);

        DB::table('biodata')->insert([
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'umur' => $request->umur,
            'waktu_bergabung' => $request->waktu_bergabung,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        return redirect()->route('biodata')->with('success', 'Data Berhasil Disimpan');
    }

    public function storeAff(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'nama' => 'required|max:45',
            'umur' => 'required',
            'waktu_bergabung' => 'required',
        ]);

        DB::table('biodata')->insert([
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'umur' => $request->umur,
            'waktu_bergabung' => $request->waktu_bergabung,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        return redirect()->route('biodata_aff')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $biodata = Biodata::find($id);
        return view('affiliate.biodata.form_edit', compact('biodata'));
    }

    public function editAff($id)
    {
        $biodata = Biodata::find($id);
        return view('admin.biodata_aff.form_edit', compact('biodata'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:45',
            'umur' => 'required',
            'waktu_bergabung' => 'required',
        ]);

        DB::table('biodata')->where('id', $id)->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'waktu_bergabung' => $request->waktu_bergabung,
            'updated_at' => now(),
        ]);

        return redirect()->route('biodata_aff')
            ->with('success', 'Data Berhasil Diubah');
    }

    public function updateAff(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:45',
            'umur' => 'required',
            'waktu_bergabung' => 'required',
        ]);

        DB::table('biodata')->where('id', $id)->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
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

    public function destroyAff($id)
    {
        $biodata = Biodata::findOrFail($id);
        $biodata->delete();
        return redirect('biodata_aff')->with('success', 'Berhasil Menghapus User');
    }
}
