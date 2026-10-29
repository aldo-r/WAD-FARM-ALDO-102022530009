@extends('deterjens.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Edit Data Deterjen</h2>
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
            <form action="{{ route('deterjens.update', $deterjen->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Merek:</label>
                    <input type="text" name="merek" value="{{ old('merek', $deterjen->merek) }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis:</label>
                    <input type="text" name="jenis" value="{{ old('jenis', $deterjen->jenis) }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Supplier:</label>
                    <input type="text" name="supplier" value="{{ old('supplier', $deterjen->supplier) }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Pembelian:</label>
                    <input type="date" name="tanggal_pembelian" value="{{ old('tanggal_pembelian', $deterjen->tanggal_pembelian) }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok:</label>
                    <input type="number" name="stok" value="{{ old('stok', $deterjen->stok) }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection