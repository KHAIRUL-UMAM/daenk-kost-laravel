@extends('layouts.app')

@section('title', 'Tambah Penyewa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Daftarkan Penyewa Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('penyewa.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Asal</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="2" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                            <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk', date('Y-m-d')) }}" required>
                            @error('tanggal_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kamar_id" class="form-label">Pilih Kamar</label>
                            <select class="form-select @error('kamar_id') is-invalid @enderror" id="kamar_id" name="kamar_id" required>
                                <option value="">-- Pilih Kamar Kosong --</option>
                                @foreach($kamar as $k)
                                    <option value="{{ $k->id }}" {{ old('kamar_id') == $k->id ? 'selected' : '' }}>
                                        Kamar {{ $k->nomor_kamar }} (Rp {{ number_format($k->harga, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            </select>
                            @error('kamar_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('penyewa.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Data Penyewa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
