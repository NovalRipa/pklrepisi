<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Session;


class ReportController extends Controller
{
    public function laporan()
    {
        return view('admin.report.form');
    }

    public function cetaklaporan(Request $request)
    {
        $start = $request->tanggalAwal;
        $end = $request->tanggalAkhir;

        if ($start > $end) {
            Session::flash("flash_notification", [
                "level" => "danger",
                "message" => "Maaf tanggal yang anda masukan tidak sesuai",
            ]);
            return back();

        } else {
            $pesanan = Pesanan::whereBetween('tanggal_pesan', [$start, $end])
                ->get();
            $totalMasukan = Pesanan::whereBetween('tanggal_pesan', [$start, $end])
                ->selectRaw('sum(total) as totalMasukan')
                ->first();
            return view('admin.report.cetak_laporan', ['pesanan' => $pesanan, 'totalMasukan' => $totalMasukan]);
        }
    }
}