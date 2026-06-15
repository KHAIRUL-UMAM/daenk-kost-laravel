<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use App\Models\Kamar;
use Illuminate\Http\Request;

class PenyewaController extends Controller
{
    public function index()
    {
        $penyewa = Penyewa::with('kamar')->get();
        return view('penyewa.index', compact('penyewa'));
    }

    public function create()
    {
        $kamar = Kamar::where('status', 'kosong')->get();
        return view('penyewa.create', compact('kamar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tanggal_masuk' => 'required|date',
            'kamar_id' => 'required|exists:kamar,id',
        ]);

        $penyewa = Penyewa::create($request->all());

        // Update status kamar menjadi terisi
        $kamar = Kamar::find($request->kamar_id);
        $kamar->update(['status' => 'terisi']);

        return redirect()->route('penyewa.index')->with('success', 'Penyewa berhasil ditambahkan.');
    }

    public function edit(Penyewa $penyewa)
    {
        $kamar = Kamar::all();
        return view('penyewa.edit', compact('penyewa', 'kamar'));
    }

    public function update(Request $request, Penyewa $penyewa)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tanggal_masuk' => 'required|date',
            'kamar_id' => 'required|exists:kamar,id',
        ]);

        // Jika kamar berubah
        if ($penyewa->kamar_id != $request->kamar_id) {
            // Kosongkan kamar lama
            if ($penyewa->kamar_id) {
                Kamar::where('id', $penyewa->kamar_id)->update(['status' => 'kosong']);
            }
            // Isi kamar baru
            Kamar::where('id', $request->kamar_id)->update(['status' => 'terisi']);
        }

        $penyewa->update($request->all());

        return redirect()->route('penyewa.index')->with('success', 'Data penyewa berhasil diperbarui.');
    }

    public function destroy(Penyewa $penyewa)
    {
        // Kosongkan kamar sebelum menghapus penyewa
        if ($penyewa->kamar_id) {
            Kamar::where('id', $penyewa->kamar_id)->update(['status' => 'kosong']);
        }
        $penyewa->delete();
        return redirect()->route('penyewa.index')->with('success', 'Data penyewa berhasil dihapus.');
    }
}
