@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <h3>Laporan Administrasi Kost</h3>
        <p class="text-muted">Pilih jenis laporan yang ingin dilihat atau dicetak.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card h-100 text-center p-4">
            <div class="card-body">
                <i class="fas fa-users fa-4x text-primary mb-3"></i>
                <h5>Laporan Data Penyewa</h5>
                <p class="text-muted small">Daftar seluruh penyewa yang pernah dan sedang menempati kost.</p>
                <a href="{{ route('laporan.penyewa') }}" class="btn btn-outline-primary">Lihat Laporan</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100 text-center p-4">
            <div class="card-body">
                <i class="fas fa-money-bill-wave fa-4x text-success mb-3"></i>
                <h5>Laporan Pembayaran</h5>
                <p class="text-muted small">Rekapitulasi transaksi pembayaran sewa dari seluruh penyewa.</p>
                <a href="{{ route('laporan.pembayaran') }}" class="btn btn-outline-success">Lihat Laporan</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100 text-center p-4">
            <div class="card-body">
                <i class="fas fa-door-open fa-4x text-info mb-3"></i>
                <h5>Laporan Status Kamar</h5>
                <p class="text-muted small">Informasi ketersediaan dan status kamar kost saat ini.</p>
                <a href="{{ route('laporan.kamar') }}" class="btn btn-outline-info">Lihat Laporan</a>
            </div>
        </div>
    </div>
</div>
@endsection
