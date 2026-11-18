@extends('layouts.app')

@section('title', isset($pelanggan) ? 'Edit Pelanggan' : 'Tambah Pelanggan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-people-fill me-2"></i>
                    {{ isset($pelanggan) ? 'Edit' : 'Tambah' }} Data Pelanggan
                </h5>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                      action="{{ isset($pelanggan) ? route('pelanggan.update', $pelanggan->id_pelanggan) : route('pelanggan.store') }}">
                    @csrf
                    @isset($pelanggan)
                        @method('PUT')
                    @endisset

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control"
                               value="{{ old('nama', $pelanggan->nama ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Alamat</label>
                        <input type="text" name="alamat" class="form-control"
                               value="{{ old('alamat', $pelanggan->alamat ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">No. Telpon</label>
                        <input type="text" name="notelp" class="form-control"
                               value="{{ old('notelp', $pelanggan->notelp ?? '') }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Catatan</label>
                        <input type="text" name="catatan" class="form-control"
                               value="{{ old('catatan', $pelanggan->catatan ?? '') }}">
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-save me-1"></i>{{ isset($pelanggan) ? 'Update Data' : 'Simpan Data' }}
                        </button>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary w-100">
                            <i class="bi bi-x-circle me-1"></i>Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
