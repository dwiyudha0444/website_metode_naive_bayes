<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arsip;
use App\Models\HitungPrediksi;

class ArsipController extends Controller
{
    public function index()
    {
        $arsip = Arsip::all();
        $data2 = HitungPrediksi::orderBy('id', 'DESC')->get();
        return view('admin.arsip.index', compact('arsip'));
    }

    public function destroy($id)
    {
        // Temukan arsip berdasarkan ID
        $arsip = Arsip::findOrFail($id);

        // Periksa apakah file PDF ada dan hapus
        if ($arsip->pdf_path && file_exists(public_path($arsip->pdf_path))) {
            unlink(public_path($arsip->pdf_path)); // Menghapus file PDF dari publik
        }

        // Hapus entri dari database
        $arsip->delete();

        return redirect()->route('pdf_arsip')->with('success', 'Arsip berhasil dihapus.');
    }

    public function index_aff()
    {
        $userId = auth()->id(); // Mendapatkan ID dari user yang sedang login
        $arsip = Arsip::where('id_user', $userId)->get(); // Menampilkan data arsip sesuai dengan id_user
        
        return view('affiliate.arsip.index', compact('arsip'));
    }
    

    public function destroy_aff($id)
    {
        // Temukan arsip berdasarkan ID
        $arsip = Arsip::findOrFail($id);

        // Periksa apakah file PDF ada dan hapus
        if ($arsip->pdf_path && file_exists(public_path($arsip->pdf_path))) {
            unlink(public_path($arsip->pdf_path)); // Menghapus file PDF dari publik
        }

        // Hapus entri dari database
        $arsip->delete();

        return redirect()->route('pdf_arsip_aff')->with('success', 'Arsip berhasil dihapus.');
    }
}
