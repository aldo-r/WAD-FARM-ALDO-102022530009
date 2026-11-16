<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Mesin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/p_style.css') }}">
</head>
<body>
<div class="container">
    <h1>Daftar Mesin Laundry</h1>
    <hr>
    <p>Tugas Modul Mesin &amp; Peralatan</p>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('mesin.create') }}" class="btn">+ Tambah Mesin</a>

    <table class="table">
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
                    <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                            data-bs-target="#detail{{ $m->id }}">Lihat Detail</button>
                    <a href="{{ route('mesin.edit', $m->id) }}" class="btn btn-sm">Edit</a>
                    <form action="{{ route('mesin.destroy', $m->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Yakin hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center">Belum ada data mesin.</td></tr>
        @endforelse
        </tbody>
    </table>

    @foreach ($mesin as $m)
        <div class="modal fade" id="detail{{ $m->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background:#2f4858; color:#fff;">
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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>