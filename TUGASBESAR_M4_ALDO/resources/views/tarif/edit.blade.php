@extends('layouts.app')

@section('title', 'Edit Tarif')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Tarif</h5>
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

                <form action="{{ route('tarif.update', $tarif->id_tarif) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control"
                               maxlength="50" value="{{ old('nama_paket', $tarif->nama_paket) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control"
                               min="0" value="{{ old('harga', $tarif->harga) }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Estimasi Waktu</label>
                        <input type="text" name="estimasi_waktu" class="form-control"
                               maxlength="20" value="{{ old('estimasi_waktu', $tarif->estimasi_waktu) }}" required>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-save me-1"></i>Simpan Perubahan
                        </button>
                        <a href="{{ route('tarif.index', $tarif->id_layanan) }}" class="btn btn-secondary w-100">
                            <i class="bi bi-x-circle me-1"></i>Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
