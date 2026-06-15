@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <h3>Selamat Datang, {{ Auth::user()->name }}</h3>
        <p class="text-muted">Ringkasan statistik sistem pengelolaan Daenk Kost Jambi.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1">Total Kamar</h6>
                        <h2 class="mb-0">{{ $totalKamar }}</h2>
                    </div>
                    <i class="fas fa-door-open fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1">Kamar Kosong</h6>
                        <h2 class="mb-0">{{ $kamarKosong }}</h2>
                    </div>
                    <i class="fas fa-check-circle fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-warning text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1">Kamar Terisi</h6>
                        <h2 class="mb-0">{{ $kamarTerisi }}</h2>
                    </div>
                    <i class="fas fa-user-friends fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-info text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1">Penyewa Aktif</h6>
                        <h2 class="mb-0">{{ $totalPenyewa }}</h2>
                    </div>
                    <i class="fas fa-users fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-white font-weight-bold">
                Total Pendapatan (Lunas)
            </div>
            <div class="card-body d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <h1 class="display-4 text-primary">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</h1>
                    <p class="text-muted">Total akumulasi pembayaran yang berstatus lunas.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-white font-weight-bold">
                Aksi Cepat
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="{{ route('kamar.create') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-plus-circle me-2"></i> Tambah Kamar Baru
                    </a>
                    <a href="{{ route('penyewa.create') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-user-plus me-2"></i> Daftarkan Penyewa Baru
                    </a>
                    <a href="{{ route('pembayaran.create') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-receipt me-2"></i> Catat Pembayaran
                    </a>
                    <a href="{{ route('laporan.index') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-print me-2"></i> Lihat Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
