@extends('layouts.app')

@section('title', 'Edit Kamar')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Edit Kamar</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('kamar.update', $kamar->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nomor Kamar</label>
                        <input type="text"
                               name="nomor_kamar"
                               class="form-control"
                               value="{{ $kamar->nomor_kamar }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga per Bulan</label>
                        <input type="number"
                               name="harga"
                               class="form-control"
                               value="{{ $kamar->harga }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fasilitas</label>
                        <textarea name="fasilitas"
                                  class="form-control"
                                  rows="3">{{ $kamar->fasilitas }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="kosong"
                                {{ $kamar->status == 'kosong' ? 'selected' : '' }}>
                                Kosong
                            </option>

                            <option value="terisi"
                                {{ $kamar->status == 'terisi' ? 'selected' : '' }}>
                                Terisi
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>

                    <a href="{{ route('kamar.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
