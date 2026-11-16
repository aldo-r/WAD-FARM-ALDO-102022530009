<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Layanan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<h1>Kelola Layanan</h1>
<p><a href="{{ route('layanan.index') }}">&larr; Kembali ke halaman Layanan</a></p>

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

<!-- ================= DAFTAR LAYANAN ================= -->
<h3>Daftar Layanan</h3>
<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Layanan</th>
        <th>Minimal</th>
        <th>Aksi</th>
    </tr>
    @forelse ($semua as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->kategori }}</td>
            <td>{{ $row->nama_layanan }}</td>
            <td>{{ (float) $row->minimal_kg }} Kg</td>
            <td>
                <a href="{{ route('tarif.index', $row->id_layanan) }}">Tarif</a> |
                <a href="{{ route('layanan.edit', $row->id_layanan) }}">Edit</a> |
                <form action="{{ route('layanan.destroy', $row->id_layanan) }}" method="post" style="display:inline"
                      onsubmit="return confirm('Hapus layanan ini beserta semua tarifnya?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5" align="center">Belum ada layanan.</td></tr>
    @endforelse
</table>

<!-- ================= FORM TAMBAH LAYANAN ================= -->
<h3>Tambah Layanan Baru</h3>
<form action="{{ route('layanan.store') }}" method="post">
    @csrf

    <p>Kategori<br>
        <select name="kategori">
            <option value="kiloan" @selected(old('kategori') == 'kiloan')>Kiloan</option>
            <option value="self service" @selected(old('kategori') == 'self service')>Self Service</option>
        </select>
    </p>

    <p>Nama Layanan<br>
        <input type="text" name="nama_layanan" maxlength="30" value="{{ old('nama_layanan') }}" required>
    </p>

    <p>Minimal (Kg)<br>
        <input type="number" name="minimal_kg" step="0.01" min="0.01" value="{{ old('minimal_kg') }}" required>
    </p>

    <button type="submit">Simpan Layanan</button>
</form>

</body>
</html>