<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan & Tarif</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<h1>Layanan &amp; Tarif</h1>

@if (session('sukses'))
    <p style="color: green;">{{ session('sukses') }}</p>
@endif

<p><a href="{{ route('layanan.kelola') }}">+ Kelola Layanan</a></p>

<h3>Layanan Kiloan</h3>
@include('layanan._tabel', ['daftar' => $kiloan])

<h3>Self Service</h3>
@include('layanan._tabel', ['daftar' => $selfService])

</body>
</html>