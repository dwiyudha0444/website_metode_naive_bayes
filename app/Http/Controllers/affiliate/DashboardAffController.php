<?php

namespace App\Http\Controllers\affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAffController extends Controller
{
    public function index()
    {
        return view('affiliate.dashboard.index');
    } 
}
