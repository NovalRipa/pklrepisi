<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Pembayaran;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = Laporan::with('pembayaran')->get();
        return view('admin.laporan.index', compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembayaran = Pembayaran::all();
        return view('admin.laporan.create', compact('pembayaran'));
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
            'nama_barang_keluar' => 'required',
            'tanggal_keluar' => 'required',
            'pemasukan' => 'required',
            'pembayaran_id' => 'required',
            'status' => 'required',
        ]);

        $laporan = new Laporan;
        $laporan->nama_barang_keluar = $request->nama_barang_keluar;
        $laporan->tanggal_keluar = $request->tanggal_keluar;
        $laporan->pemasukan = $request->pemasukan;
        $laporan->pembayaran_id = $request->pembayaran_id;
        $laporan->status = $request->status;
        $laporan->save();
        Alert::success('Berhasil', 'Menambahkan Data');
        return redirect()->route('laporan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('admin.laporan.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        $pembayaran = Pembayaran::all();
        return view('admin.laporan.edit', compact('laporan', 'pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang_keluar' => 'required',
            'tanggal_keluar' => 'required',
            'pemasukan' => 'required',
            'pembayaran_id' => 'required',
            'status' => 'required',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->nama_barang_keluar = $request->nama_barang_keluar;
        $laporan->tanggal_keluar = $request->tanggal_keluar;
        $laporan->pemasukan = $request->pemasukan;
        $laporan->pembayaran_id = $request->pembayaran_id;
        $laporan->status = $request->status;
        $laporan->save();
        Alert::success('Berhasil', 'Update Data');
        return redirect()->route('laporan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();
        Alert::success('Berhasil', 'Hapus Data');
        return redirect()->route('laporan.index');
    }
}
