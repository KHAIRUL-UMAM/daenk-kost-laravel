@extends('layouts.app')

@section('title', 'Catat Pembayaran')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Catat Pembayaran Bulanan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('pembayaran.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="penyewa_id" class="form-label">Pilih Penyewa</label>
                        <select class="form-select @error('penyewa_id') is-invalid @enderror" id="penyewa_id" name="penyewa_id" required>
                            <option value="">-- Pilih Penyewa --</option>
                            @foreach($penyewa as $p)
                                <option value="{{ $p->id }}" {{ old('penyewa_id') == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }} (Kamar {{ $p->kamar->nomor_kamar ?? '-' }})
                                </option>
                            @endforeach
                        </select>
                        @error('penyewa_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="bulan_tahun" class="form-label">Untuk Bulan/Tahun</label>
                            <input type="text" class="form-control @error('bulan_tahun') is-invalid @enderror" id="bulan_tahun" name="bulan_tahun" placeholder="Contoh: Januari 2024" value="{{ old('bulan_tahun') }}" required>
                            @error('bulan_tahun')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                            <input type="date" class="form-control @error('tanggal_bayar') is-invalid @enderror" id="tanggal_bayar" name="tanggal_bayar" value="{{ old('tanggal_bayar', date('Y-m-d')) }}" required>
                            @error('tanggal_bayar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jumlah_bayar" class="form-label">Nominal Pembayaran (Rp)</label>
                            <input type="number" class="form-control @error('jumlah_bayar') is-invalid @enderror" id="jumlah_bayar" name="jumlah_bayar" value="{{ old('jumlah_bayar') }}" required>
                            @error('jumlah_bayar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="lunas" {{ old('status') == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Pembayaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
