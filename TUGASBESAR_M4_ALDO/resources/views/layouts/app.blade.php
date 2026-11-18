<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WAD Farm Laundry')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
    @stack('styles')
</head>
<body>

{{-- Navbar Simpel Standar --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('deterjens.index') }}">Laundry Farm</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('deterjens.*') ? 'active fw-semibold' : '' }}"
                       href="{{ route('deterjens.index') }}">Deterjen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('mesin.*') ? 'active fw-semibold' : '' }}"
                       href="{{ route('mesin.index') }}">Mesin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active fw-semibold' : '' }}"
                       href="{{ route('pelanggan.index') }}">Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('layanan.*') || request()->routeIs('tarif.*') ? 'active fw-semibold' : '' }}"
                       href="{{ route('layanan.index') }}">Layanan & Tarif</a>
                </li>
            </ul>

            @auth
            <div class="d-flex align-items-center gap-3">
                <span class="text-muted small">
                    {{ auth()->user()->name }} ({{ auth()->user()->role }})
                </span>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                </form>
            </div>
            @endauth
        </div>
    </div>
</nav>

{{-- Konten Utama --}}
<div class="container mb-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
