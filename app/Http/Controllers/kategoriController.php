<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use RealRashid\SweetAlert\Facades\Alert;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
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
            'kategori' => 'required',
            'gambar' => 'required|image|max:2048',
        ]);

        $kategori = new Kategori;
        $kategori->kategori = $request->kategori;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = rand(1000, 9999) . "" . $request->gambar->getClientOriginalName();
            $image->move('image/kategoris/', $name);
            $kategori->gambar = $name;
        }
        $kategori->save();
        Alert::success('Berhasil', 'Menambahkan Data');
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori' => 'required',
            'gambar' => 'required|image|max:2048',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->kategori = $request->kategori;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = rand(1000, 9999) . "" . $request->gambar->getClientOriginalName();
            $image->move('image/kategoris/', $name);
            $kategori->gambar = $name;
        }
        $kategori->save();
        Alert::success('Berhasil', 'Update Data');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->deleteImage();
        $kategori->delete();
        Alert::success('Berhasil', 'Mengapus Data ');
        return redirect()->route('kategori.index');
    }
}
