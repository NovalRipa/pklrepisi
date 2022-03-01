<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;

class FronendController extends Controller
{
    //
    public function index()
    {
        $barang = Barang::all();
        return view('layouts.frontend', compact('barang'));
    }

    public function show($id)
    {
        $barang = Barang::findOrFaill($id);
        return view('layouts.frontend', compact('barang'));
    }
}
