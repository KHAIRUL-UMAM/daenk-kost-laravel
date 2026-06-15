<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Penyewa;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('penyewa')->latest()->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $penyewa = Penyewa::all();
        return view('pembayaran.create', compact('penyewa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penyewa_id' => 'required|exists:penyewa,id',
            'tanggal_bayar' => 'required|date',
            'jumlah_bayar' => 'required|numeric',
            'bulan_tahun' => 'required',
            'status' => 'required|in:lunas,pending',
        ]);

        Pembayaran::create($request->all());

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dicatat.');
    }

    public function updateStatus(Request $request, Pembayaran $pembayaran)
    {
        $pembayaran->update(['status' => 'lunas']);
        return back()->with('success', 'Status pembayaran diperbarui menjadi lunas.');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Riwayat pembayaran berhasil dihapus.');
    }
}
