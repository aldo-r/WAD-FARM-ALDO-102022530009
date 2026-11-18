@extends('layouts.app')

@section('title', 'Kelola Tarif')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-currency-dollar me-2"></i>Tarif: {{ $layanan->nama_layanan }}</h2>
    <a href="{{ route('layanan.kelola') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i>Kembali
    </a>
</div>

@if (session('sukses'))
    <div class="alert alert-success">{{ session('sukses') }}</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- ── Daftar Tarif ── --}}
<div class="card mb-4">
    <div class="card-header"><h6 class="mb-0">Daftar Tarif</h6></div>
    <div class="card-body p-0">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Estimasi Waktu</th>
                    @if(auth()->user()->isAdmin())
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
            @forelse ($layanan->tarifs as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->nama_paket }}</td>
                    <td>Rp{{ number_format($t->harga, 0, ',', '.') }}</td>
                    <td>{{ $t->estimasi_waktu }}</td>
                    @if(auth()->user()->isAdmin())
                        <td>
                            <a href="{{ route('tarif.edit', $t->id_tarif) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </a>
                            <form action="{{ route('tarif.destroy', $t->id_tarif) }}" method="post" class="d-inline"
                                  onsubmit="return confirm('Hapus tarif ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash me-1"></i>Hapus
                                </button>
                            </form>
                        </td>
                    @endif
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Belum ada tarif.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ── Form Tambah Tarif (admin only) ── --}}
@if(auth()->user()->isAdmin())
<div class="card">
    <div class="card-header"><h6 class="mb-0"><i class="bi bi-plus-circle me-1"></i>Tambah Tarif Baru</h6></div>
    <div class="card-body">
        <form action="{{ route('tarif.store', $layanan->id_layanan) }}" method="post">
            @csrf
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control"
                           maxlength="50" placeholder="contoh: Reguler"
                           value="{{ old('nama_paket') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control"
                           min="0" value="{{ old('harga') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Estimasi Waktu</label>
                    <input type="text" name="estimasi_waktu" class="form-control"
                           maxlength="20" placeholder="contoh: 2 Hari"
                           value="{{ old('estimasi_waktu') }}" required>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save me-1"></i>Simpan Tarif
                </button>
            </div>
        </form>
    </div>
</div>
@endif
@endsection
