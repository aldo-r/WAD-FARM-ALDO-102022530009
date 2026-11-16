@extends('deterjens.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Detail Deterjen</h2>
        <a class="btn btn-secondary" href="{{ route('deterjens.index') }}">Kembali</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="mb-3">
                <strong>Merek:</strong> {{ $deterjen->merek }}
            </div>
            <div class="mb-3">
                <strong>Jenis:</strong> {{ $deterjen->jenis }}
            </div>
            <div class="mb-3">
                <strong>Supplier:</strong> {{ $deterjen->supplier }}
            </div>
            <div class="mb-3">
                <strong>Tanggal Pembelian:</strong> {{ \Carbon\Carbon::parse($deterjen->tanggal_pembelian)->format('d F Y') }}
            </div>
            <div class="mb-3">
                <strong>Stok:</strong> {{ $deterjen->stok }}
            </div>
        </div>
    </div>
@endsection