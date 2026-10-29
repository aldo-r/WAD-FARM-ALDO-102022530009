@extends('deterjens.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Deterjen</h2>
        <a class="btn btn-success" href="{{ route('deterjens.create') }}">Tambah Deterjen</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Merek</th>
                        <th>Jenis</th>
                        <th>Supplier</th>
                        <th>Tgl Pembelian</th>
                        <th>Stok</th>
                        <th width="220px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deterjens as $deterjen)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $deterjen->merek }}</td>
                            <td>{{ $deterjen->jenis }}</td>
                            <td>{{ $deterjen->supplier }}</td>
                            <td>{{ $deterjen->tanggal_pembelian}}</td>
                            <td>{{ $deterjen->stok }}</td>
                            <td>
                                <form action="{{ route('deterjens.destroy', $deterjen->id) }}" method="POST">
                                    <a class="btn btn-info btn-sm text-white" href="{{ route('deterjens.show', $deterjen->id) }}">Detail</a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('deterjens.edit', $deterjen->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data deterjen.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {!! $deterjens->links() !!}
    </div>
@endsection