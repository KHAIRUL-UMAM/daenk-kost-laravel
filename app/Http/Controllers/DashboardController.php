<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penyewa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKamar = Kamar::count();
        $kamarKosong = Kamar::where('status', 'kosong')->count();
        $kamarTerisi = Kamar::where('status', 'terisi')->count();
        $totalPenyewa = Penyewa::count();
        $totalPembayaran = Pembayaran::where('status', 'lunas')->sum('jumlah_bayar');

        return view('dashboard', compact(
            'totalKamar',
            'kamarKosong',
            'kamarTerisi',
            'totalPenyewa',
            'totalPembayaran'
        ));
    }
}
