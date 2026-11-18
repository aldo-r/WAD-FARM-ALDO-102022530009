@extends('layouts.app')

@section('title', 'Kelola Layanan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-sliders me-2"></i>Kelola Layanan</h2>
    <a href="{{ route('layanan.index') }}" class="btn btn-secondary">
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

{{-- ── Daftar Layanan ── --}}
<div class="card mb-4">
    <div class="card-header"><h6 class="mb-0">Daftar Layanan</h6></div>
    <div class="card-body p-0">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Layanan</th>
                    <th>Minimal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($semua as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucfirst($row->kategori) }}</td>
                    <td>{{ $row->nama_layanan }}</td>
                    <td>{{ (float) $row->minimal_kg }} Kg</td>
                    <td>
                        <a href="{{ route('tarif.index', $row->id_layanan) }}" class="btn btn-info btn-sm text-white">
                            <i class="bi bi-currency-dollar me-1"></i>Tarif
                        </a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('layanan.edit', $row->id_layanan) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </a>
                            <form action="{{ route('layanan.destroy', $row->id_layanan) }}" method="post" class="d-inline"
                                  onsubmit="return confirm('Hapus layanan ini beserta semua tarifnya?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash me-1"></i>Hapus
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Belum ada layanan.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ── Form Tambah Layanan (admin only) ── --}}
@if(auth()->user()->isAdmin())
<div class="card">
    <div class="card-header"><h6 class="mb-0"><i class="bi bi-plus-circle me-1"></i>Tambah Layanan Baru</h6></div>
    <div class="card-body">
        <form action="{{ route('layanan.store') }}" method="post">
            @csrf
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="kiloan" @selected(old('kategori') == 'kiloan')>Kiloan</option>
                        <option value="self service" @selected(old('kategori') == 'self service')>Self Service</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Nama Layanan</label>
                    <input type="text" name="nama_layanan" class="form-control"
                           maxlength="30" value="{{ old('nama_layanan') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Minimal (Kg)</label>
                    <input type="number" name="minimal_kg" class="form-control"
                           step="0.01" min="0.01" value="{{ old('minimal_kg') }}" required>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save me-1"></i>Simpan Layanan
                </button>
            </div>
        </form>
    </div>
</div>
@endif
@endsection
