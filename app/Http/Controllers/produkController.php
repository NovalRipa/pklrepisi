<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Session;


class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produk = produk::all();
         return view('vendor.adminlte.produk.index', compact('produk'));
        
        // return response()->json([
        //     'success' => true,
        //     'message' => 'harga',
        //     'data' => $produk

        // ],200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vendor.adminlte.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/produk', $name);
            $produk->image = $name;
        }
        $produk->save();
        session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data saved successfully",
        ]);
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $produk = produk::findOrFail($id);
        return view('vendor.adminlte.produk.show', compact('produk'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $produk = produk::findOrFail($id);
        return view('vendor.adminlte.produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'total' => 'required',
            'deskripsi' => 'required',
        ]);

        $produk = produk::findOrFail($id);
        $produk->nama_produk = $request->nama;
        $produk->harga_produk = $request->harga;
        $produk->total_item = $request->total;
        $produk->deskripsi = $request->deskripsi;
        if ($request->hasFile('image')) {
            $produk->deleteImage();
            $image = $request->file('image');
            $name = rand(1000, 9999). $image->getClientOriginalName();
            $image->move('images/produk/', $name);
            $produk->image = $name;
        }
        $produk->save();
        session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data saved successfully",
        ]);
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $produk = produk::findOrFail($id);
        $produk->delete();
        session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data delete successfully",
        ]);
        return redirect()->route('produk.index');
    }
}
