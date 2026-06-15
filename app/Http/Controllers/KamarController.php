<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        return view('kamar.index', compact('kamar'));
    }

    public function create()
    {
        return view('kamar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_kamar' => 'required|unique:kamar',
            'harga' => 'required|numeric',
            'fasilitas' => 'nullable',
        ]);

        Kamar::create($request->all());

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function edit(Kamar $kamar)
    {
        return view('kamar.edit', compact('kamar'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'nomor_kamar' => 'required|unique:kamar,nomor_kamar,' . $kamar->id,
            'harga' => 'required|numeric',
            'fasilitas' => 'nullable',
            'status' => 'required|in:kosong,terisi',
        ]);

        $kamar->update($request->all());

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil diperbarui.');
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil dihapus.');
    }
}
