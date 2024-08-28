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
}
