<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit {{ $layanan->nama_layanan }}</title>
    <link rel="stylesheet" href="{{ asset('css/z_style.css') }}">
</head>
<body>

<h1>Edit Layanan: {{ $layanan->nama_layanan }}</h1>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('layanan.update', $layanan->id_layanan) }}" method="post">
    @csrf
    @method('PUT')

    <h3>Data Layanan</h3>

    <p>Kategori<br>
        <select name="kategori">
            <option value="kiloan" @selected($layanan->kategori == 'kiloan')>Kiloan</option>
            <option value="self service" @selected($layanan->kategori == 'self service')>Self Service</option>
        </select>
    </p>

    <p>Nama Layanan<br>
        <input type="text" name="nama_layanan" maxlength="30"
               value="{{ old('nama_layanan', $layanan->nama_layanan) }}" required>
    </p>

    <p>Minimal (Kg)<br>
        <input type="number" name="minimal_kg" step="0.01" min="0.01"
               value="{{ old('minimal_kg', (float) $layanan->minimal_kg) }}" required>
    </p>

    <h3>Tarif</h3>

    @if ($layanan->tarifs->count() > 0)
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Nama Paket</th>
                <th>Harga (Rp)</th>
                <th>Estimasi Waktu</th>
            </tr>
            @foreach ($layanan->tarifs as $t)
                <tr>
                    {{-- name="harga[5]"artinya:hargauntuktarifdenganid5 --}}
                    <td><input type="text" name="nama_paket[{{ $t->id_tarif }}]" maxlength="50"
                               value="{{ $t->nama_paket }}" required></td>
                    <td><input type="number" name="harga[{{ $t->id_tarif }}]" min="0"
                               value="{{ $t->harga }}" required></td>
                    <td><input type="text" name="estimasi_waktu[{{ $t->id_tarif }}]" maxlength="20"
                               value="{{ $t->estimasi_waktu }}" required></td>
                </tr>
            @endforeach
        </table>
    @else
        <p><i>Layanan ini belum punya tarif.</i></p>
    @endif

    <p><a href="{{ route('tarif.index', $layanan->id_layanan) }}">Tambah / hapus paket tarif</a></p>

    <button type="submit">Simpan Perubahan</button>
    <a href="{{ route('layanan.index') }}">Batal</a>
</form>

</body>
</html>