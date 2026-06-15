@extends('layouts.app')

@section('title', 'Laporan Kamar')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 d-print-none">
    <h3>Laporan Status Kamar</h3>
    <div>
        <a href="{{ route('laporan.index') }}" class="btn btn-secondary me-2">Kembali</a>
        <button onclick="window.print()" class="btn btn-success">
            <i class="fas fa-print me-1"></i> Cetak Laporan
        </button>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="text-center mb-4">
            <h4>DAENK KOST KOTA JAMBI</h4>
            <h5>Laporan Status dan Ketersediaan Kamar</h5>
            <hr>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nomor Kamar</th>
                        <th>Harga / Bulan</th>
                        <th>Fasilitas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kamar as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nomor_kamar }}</td>
                        <td>Rp {{ number_format($k->harga, 0, ',', '.') }}</td>
                        <td>{{ $k->fasilitas }}</td>
                        <td>{{ ucfirst($k->status) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4 text-end d-none d-print-block">
            <p>Jambi, {{ date('d F Y') }}</p>
            <br><br>
            <p><strong>Admin Daenk Kost</strong></p>
        </div>
    </div>
</div>
@endsection
