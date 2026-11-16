<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tarif</title>
    <link rel="stylesheet" href="{{ asset('css/z_style.css') }}">
</head>
<body>

<h1>Edit Tarif</h1>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('tarif.update', $tarif->id_tarif) }}" method="post">
    @csrf
    @method('PUT')

    <p>Nama Paket<br>
        <input type="text" name="nama_paket" maxlength="50"
               value="{{ old('nama_paket', $tarif->nama_paket) }}" required>
    </p>

    <p>Harga (Rp)<br>
        <input type="number" name="harga" min="0"
               value="{{ old('harga', $tarif->harga) }}" required>
    </p>

    <p>Estimasi Waktu<br>
        <input type="text" name="estimasi_waktu" maxlength="20"
               value="{{ old('estimasi_waktu', $tarif->estimasi_waktu) }}" required>
    </p>

    <button type="submit">Simpan Perubahan</button>
    <a href="{{ route('tarif.index', $tarif->id_layanan) }}">Batal</a>
</form>

</body>
</html>