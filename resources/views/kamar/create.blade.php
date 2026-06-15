@extends('layouts.app')

@section('title', 'Tambah Kamar')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Tambah Kamar Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kamar.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nomor_kamar" class="form-label">Nomor Kamar</label>
                        <input type="text" class="form-control @error('nomor_kamar') is-invalid @enderror" id="nomor_kamar" name="nomor_kamar" value="{{ old('nomor_kamar') }}" required>
                        @error('nomor_kamar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga per Bulan (Rp)</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas</label>
                        <textarea class="form-control" id="fasilitas" name="fasilitas" rows="3">{{ old('fasilitas') }}</textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('kamar.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Kamar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
