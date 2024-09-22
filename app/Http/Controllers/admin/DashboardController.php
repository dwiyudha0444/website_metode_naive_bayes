<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total user
        $total = Biodata::count();
    
        // Mengirim total user ke view
        return view('admin.dashboard.index', ['total' => $total]);
    }

    public function indexAff()
    {
        // Menghitung total user
        $total = Biodata::count();
    
        // Mengirim total user ke view
        return view('affiliate.dashboard.index', ['total' => $total]);
    }
}
