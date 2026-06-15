@extends('layouts.app')

@section('title', 'Edit Penyewa')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Edit Data Penyewa</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('penyewa.update', $penyewa->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                   value="{{ old('nama', $penyewa->nama) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp"
                                   value="{{ old('no_hp', $penyewa->no_hp) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Asal</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="2" required>{{ old('alamat', $penyewa->alamat) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tanggal_masuk"
                                       name="tanggal_masuk"
                                       value="{{ old('tanggal_masuk', $penyewa->tanggal_masuk) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="kamar_id" class="form-label">Pilih Kamar</label>
                                <select class="form-select" id="kamar_id" name="kamar_id" required>
                                    @foreach($kamar as $k)
                                        <option value="{{ $k->id }}"
                                            {{ $penyewa->kamar_id == $k->id ? 'selected' : '' }}>
                                            Kamar {{ $k->nomor_kamar }}
                                            (Rp {{ number_format($k->harga, 0, ',', '.') }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('penyewa.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Update Data Penyewa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
