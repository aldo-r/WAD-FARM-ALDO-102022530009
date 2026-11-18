@extends('layouts.app')

@section('title', 'Data Pelanggan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-people-fill me-2"></i>Data Pelanggan</h2>
    @if(auth()->user()->isAdmin())
        <a href="{{ route('pelanggan.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i>Tambah Data
        </a>
    @endif
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. Telpon</th>
                        <th>Catatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($pelanggan as $p)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->notelp }}</td>
                        <td>{{ $p->catatan }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-info btn-sm text-white"
                                data-bs-toggle="modal" data-bs-target="#detail{{ $p->id_pelanggan }}">
                                <i class="bi bi-eye me-1"></i>Detail
                            </button>
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('pelanggan.edit', $p->id_pelanggan) }}"
                                   class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </a>
                                <form action="{{ route('pelanggan.destroy', $p->id_pelanggan) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash me-1"></i>Hapus
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>

                    {{-- Modal Detail --}}
                    <div class="modal fade" id="detail{{ $p->id_pelanggan }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header" style="background:#1e3a5f; color:#fff;">
                                    <h5 class="modal-title">Detail Pelanggan</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Nama:</strong> {{ $p->nama }}</p>
                                    <p><strong>Alamat:</strong> {{ $p->alamat }}</p>
                                    <p><strong>No. Telpon:</strong> {{ $p->notelp }}</p>
                                    <p><strong>Catatan:</strong> {{ $p->catatan }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
