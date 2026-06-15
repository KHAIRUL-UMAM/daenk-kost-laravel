@extends('layouts.app')

@section('title', 'Manajemen Kamar')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Daftar Kamar</h3>
    <a href="{{ route('kamar.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Kamar
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Kamar</th>
                        <th>Harga / Bulan</th>
                        <th>Fasilitas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kamar as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nomor_kamar }}</td>
                        <td>Rp {{ number_format($k->harga, 0, ',', '.') }}</td>
                        <td>{{ $k->fasilitas }}</td>
                        <td>
                            @if($k->status == 'kosong')
                                <span class="badge bg-success">Kosong</span>
                            @else
                                <span class="badge bg-danger">Terisi</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('kamar.edit', $k->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('kamar.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
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
                        <td colspan="6" class="text-center">Belum ada data kamar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
