@extends('layouts.app')

@section('title', 'Riwayat Pembayaran')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Riwayat Pembayaran</h3>
    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Catat Pembayaran
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penyewa</th>
                        <th>Bulan/Tahun</th>
                        <th>Tgl Bayar</th>
                        <th>Nominal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pembayaran as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->penyewa->nama }}</td>
                        <td>{{ $p->bulan_tahun }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal_bayar)->format('d/m/Y') }}</td>
                        <td>Rp {{ number_format($p->jumlah_bayar, 0, ',', '.') }}</td>
                        <td>
                            @if($p->status == 'lunas')
                                <span class="badge bg-success">Lunas</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                @if($p->status == 'pending')
                                <form action="{{ route('pembayaran.updateStatus', $p->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success" title="Tandai Lunas">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                @endif
                                <form action="{{ route('pembayaran.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus riwayat pembayaran ini?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada riwayat pembayaran.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
