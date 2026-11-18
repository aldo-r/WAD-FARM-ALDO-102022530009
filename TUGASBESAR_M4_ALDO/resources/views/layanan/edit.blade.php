@extends('layouts.app')

@section('title', 'Edit Layanan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-pencil-square me-2"></i>Edit Layanan: {{ $layanan->nama_layanan }}</h2>
    <a href="{{ route('layanan.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i>Batal
    </a>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('layanan.update', $layanan->id_layanan) }}" method="post">
            @csrf
            @method('PUT')

            <h6 class="fw-bold mb-3">Data Layanan</h6>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="kiloan" @selected($layanan->kategori == 'kiloan')>Kiloan</option>
                        <option value="self service" @selected($layanan->kategori == 'self service')>Self Service</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Nama Layanan</label>
                    <input type="text" name="nama_layanan" class="form-control"
                           maxlength="30" value="{{ old('nama_layanan', $layanan->nama_layanan) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Minimal (Kg)</label>
                    <input type="number" name="minimal_kg" class="form-control"
                           step="0.01" min="0.01"
                           value="{{ old('minimal_kg', (float) $layanan->minimal_kg) }}" required>
                </div>
            </div>

            <h6 class="fw-bold mb-3">Tarif</h6>
            @if ($layanan->tarifs->count() > 0)
                <div class="table-responsive mb-3">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Harga (Rp)</th>
                                <th>Estimasi Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($layanan->tarifs as $t)
                            <tr>
                                <td><input type="text" name="nama_paket[{{ $t->id_tarif }}]"
                                           class="form-control form-control-sm"
                                           maxlength="50" value="{{ $t->nama_paket }}" required></td>
                                <td><input type="number" name="harga[{{ $t->id_tarif }}]"
                                           class="form-control form-control-sm"
                                           min="0" value="{{ $t->harga }}" required></td>
                                <td><input type="text" name="estimasi_waktu[{{ $t->id_tarif }}]"
                                           class="form-control form-control-sm"
                                           maxlength="20" value="{{ $t->estimasi_waktu }}" required></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted"><i>Layanan ini belum punya tarif.</i></p>
            @endif

            <a href="{{ route('tarif.index', $layanan->id_layanan) }}" class="btn btn-outline-info btn-sm mb-3">
                <i class="bi bi-currency-dollar me-1"></i>Tambah / Hapus Paket Tarif
            </a>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i>Simpan Perubahan
                </button>
                <a href="{{ route('layanan.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
