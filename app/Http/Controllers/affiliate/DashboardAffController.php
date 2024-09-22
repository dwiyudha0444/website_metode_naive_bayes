<?php

namespace App\Http\Controllers\affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;

class DashboardAffController extends Controller
{
    public function index()
    {
        // Menghitung total user
        $total = Biodata::count();
    
        // Mengirim total user ke view
        return view('affiliate.dashboard.index', ['total' => $total]);
    }
    
}
