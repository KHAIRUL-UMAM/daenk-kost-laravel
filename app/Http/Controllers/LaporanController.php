<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penyewa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function penyewa()
    {
        $penyewa = Penyewa::with('kamar')->get();
        return view('laporan.penyewa', compact('penyewa'));
    }

    public function pembayaran()
    {
        $pembayaran = Pembayaran::with('penyewa')->get();
        return view('laporan.pembayaran', compact('pembayaran'));
    }

    public function kamar()
    {
        $kamar = Kamar::all();
        return view('laporan.kamar', compact('kamar'));
    }
}
