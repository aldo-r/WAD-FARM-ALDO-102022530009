<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Tarif</title>
    <link rel="stylesheet" href="{{ asset('css/z_style.css') }}">
</head>
<body>

<h1>Tarif: {{ $layanan->nama_layanan }}</h1>
<p><a href="{{ route('layanan.kelola') }}">&larr; Kembali ke Kelola Layanan</a></p>

@if (session('sukses'))
    <p style="color: green;">{{ session('sukses') }}</p>
@endif

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<!-- ================= DAFTAR TARIF ================= -->
<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <tr>
        <th>No</th>
        <th>Nama Paket</th>
        <th>Harga</th>
        <th>Estimasi Waktu</th>
        <th>Aksi</th>
    </tr>
    @forelse ($layanan->tarifs as $t)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $t->nama_paket }}</td>
            <td>Rp{{ number_format($t->harga, 0, ',', '.') }}</td>
            <td>{{ $t->estimasi_waktu }}</td>
            <td>
                <a href="{{ route('tarif.edit', $t->id_tarif) }}">Edit</a> |
                <form action="{{ route('tarif.destroy', $t->id_tarif) }}" method="post" style="display:inline"
                      onsubmit="return confirm('Hapus tarif ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5" align="center">Belum ada tarif.</td></tr>
    @endforelse
</table>

<!-- ================= FORM TAMBAH TARIF ================= -->
<h3>Tambah Tarif Baru</h3>
<form action="{{ route('tarif.store', $layanan->id_layanan) }}" method="post">
    @csrf

    <p>Nama Paket<br>
        <input type="text" name="nama_paket" maxlength="50" placeholder="contoh: Reguler"
               value="{{ old('nama_paket') }}" required>
    </p>

    <p>Harga (Rp)<br>
        <input type="number" name="harga" min="0" value="{{ old('harga') }}" required>
    </p>

    <p>Estimasi Waktu<br>
        <input type="text" name="estimasi_waktu" maxlength="20" placeholder="contoh: 2 Hari"
               value="{{ old('estimasi_waktu') }}" required>
    </p>

    <button type="submit">Simpan Tarif</button>
</form>

</body>
</html>