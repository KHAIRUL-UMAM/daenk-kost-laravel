@extends('layouts.app')

@section('title', 'Laporan Pembayaran')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 d-print-none">
    <h3>Laporan Pembayaran</h3>
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
            <h5>Laporan Riwayat Pembayaran</h5>
            <hr>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Penyewa</th>
                        <th>Bulan/Tahun</th>
                        <th>Tgl Bayar</th>
                        <th>Nominal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($pembayaran as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->penyewa->nama }}</td>
                        <td>{{ $p->bulan_tahun }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal_bayar)->format('d/m/Y') }}</td>
                        <td>Rp {{ number_format($p->jumlah_bayar, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($p->status) }}</td>
                    </tr>
                    @php if($p->status == 'lunas') $total += $p->jumlah_bayar; @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-light">
                        <th colspan="4" class="text-end">Total Pendapatan (Lunas):</th>
                        <th colspan="2">Rp {{ number_format($total, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
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
