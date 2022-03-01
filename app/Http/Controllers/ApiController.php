<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function index(){

        $produk = produk::all();
        //ubah ke Json
        return response()->json([
            'success' => true,
            'message' => 'harga',
            'data' => $produk

        ], 200);
    }

    public function create(){
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'total' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $produk = new produk;
        $produk->nama_produk = $request->nama;
        $produk->harga_produk = $request->harga;
        $produk->total_item = $request->total;
        $produk->deskripsi = $request->deskripsi;
        // $produk->image = $request->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/produk', $name);
            $produk->image = $name;
        }
        $produk->save();

        //ubah ke Json
        return response()->json([
            'success' => true,
            'message' => 'harga',
            'data' => $produk

        ], 200);
      
    }

     public function show($id){

        $produk = produk::find($id);
        //ubah ke Json
        return response()->json([
            'success' => true,
            'message' => 'harga',
            'data' => $produk

        ], 200);
    }

    public function edit(){
        //
    }

    public function update(Request $request, $id){

        $produk = produk::findOrFail($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->total_item = $request->total_item;
        $produk->deskripsi = $request->deskripsi;
        if ($request->hasFile('image')) {
            $produk->deleteImage();
            $image = $request->file('image');
            $name = rand(1000, 9999). $image->getClientOriginalName();
            $image->move('images/produk/', $name);
            $produk->image = $name;
        }
       return response()->json([
            'success' => true,
            'message' => 'harga',
            'data' => $produk

        ], 200);
    }

}
