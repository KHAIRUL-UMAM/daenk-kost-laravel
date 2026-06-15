@extends('layouts.app')

@section('title', 'Laporan Penyewa')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 d-print-none">
    <h3>Laporan Data Penyewa</h3>
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
            <h5>Laporan Data Penyewa</h5>
            <hr>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Penyewa</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Kamar</th>
                        <th>Tgl Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penyewa as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->no_hp }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->kamar->nomor_kamar ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal_masuk)->format('d/m/Y') }}</td>
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
