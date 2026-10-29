@extends('deterjens.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Tambah Deterjen Baru</h2>
        <a class="btn btn-secondary" href="{{ route('deterjens.index') }}">Kembali</a>
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

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('deterjens.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Merek:</label>
                    <input type="text" name="merek" class="form-control" placeholder="Contoh: Rinso">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis:</label>
                    <input type="text" name="jenis" class="form-control" placeholder="Contoh: Deterjen / Pelembut / Pewangi">
                </div>
                <div class="mb-3">
                    <label class="form-label">Supplier:</label>
                    <input type="text" name="supplier" class="form-control" placeholder="Contoh: PT Unilever">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Pembelian:</label>
                    <input type="date" name="tanggal_pembelian" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok:</label>
                    <input type="number" name="stok" class="form-control" placeholder="0">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection