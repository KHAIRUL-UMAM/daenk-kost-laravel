@extends('layouts.app')

@section('title', 'Manajemen Penyewa')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Daftar Penyewa</h3>
    <a href="{{ route('penyewa.create') }}" class="btn btn-primary">
        <i class="fas fa-user-plus me-1"></i> Tambah Penyewa
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Kamar</th>
                        <th>Tgl Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penyewa as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->no_hp }}</td>
                        <td>{{ $p->kamar->nomor_kamar ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal_masuk)->format('d M Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('penyewa.edit', $p->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('penyewa.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus penyewa ini?')">
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
                        <td colspan="6" class="text-center">Belum ada data penyewa.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
