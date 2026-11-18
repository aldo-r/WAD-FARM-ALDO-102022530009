@extends('layouts.app')

@section('title', 'Layanan & Tarif')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-tags-fill me-2"></i>Layanan & Tarif</h2>
    @if(auth()->user()->isAdmin())
        <a href="{{ route('layanan.kelola') }}" class="btn btn-success">
            <i class="bi bi-sliders me-1"></i>Kelola Layanan
        </a>
    @endif
</div>

@if (session('sukses'))
    <div class="alert alert-success">{{ session('sukses') }}</div>
@endif

<h5 class="mt-4 mb-2">Layanan Kiloan</h5>
<div class="card mb-4">
    <div class="card-body p-0">
        @include('layanan._tabel', ['daftar' => $kiloan])
    </div>
</div>

<h5 class="mb-2">Self Service</h5>
<div class="card">
    <div class="card-body p-0">
        @include('layanan._tabel', ['daftar' => $selfService])
    </div>
</div>
@endsection
