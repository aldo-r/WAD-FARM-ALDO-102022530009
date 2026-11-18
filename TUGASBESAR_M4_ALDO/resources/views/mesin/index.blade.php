@extends('layouts.app')

@section('title', 'Daftar Mesin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-gear-fill me-2"></i>Daftar Mesin Laundry</h2>
    @if(auth()->user()->isAdmin())
        <a href="{{ route('mesin.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i>Tambah Mesin
        </a>
    @endif
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-body p-0">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mesin</th>
                    <th>Merek</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($mesin as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->merek }}</td>
                    <td>{{ $m->status }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm text-white"
                                data-bs-toggle="modal" data-bs-target="#detail{{ $m->id }}">
                            <i class="bi bi-eye me-1"></i>Detail
                        </button>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('mesin.edit', $m->id) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </a>
                            <form action="{{ route('mesin.destroy', $m->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
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
                <tr><td colspan="5" class="text-center">Belum ada data mesin.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Detail --}}
@foreach ($mesin as $m)
    <div class="modal fade" id="detail{{ $m->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background:#1e3a5f; color:#fff;">
                    <h5 class="modal-title">{{ $m->nama }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><b>Merek:</b> {{ $m->merek }}</p>
                    <p><b>Kapasitas:</b> {{ $m->kapasitas }}</p>
                    <p class="mb-0"><b>Kondisi:</b> <span class="text-success">● {{ $m->status }}</span></p>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
