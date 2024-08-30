<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataLatih;
use DB;

class DataLatihController extends Controller
{
    public function index()
    {
        $datalatih = DataLatih::orderBy('id','DESC')->get();
        return view('admin.data_latih.index',compact('datalatih'));
    }
}