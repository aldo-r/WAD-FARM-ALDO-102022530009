<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($mesin) ? 'Edit' : 'Tambah' }} Mesin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container" style="max-width: 600px;">
    <h1>{{ isset($mesin) ? 'Edit' : 'Tambah' }} Mesin Laundry</h1>
    <hr>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $e)
                <div>{{ $e }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ isset($mesin) ? route('mesin.update', $mesin->id) : route('mesin.store') }}" method="POST">
        @csrf
        @if (isset($mesin))
            @method('PUT')
        @endif

        @foreach (['nama' => 'Nama Mesin', 'merek' => 'Merek', 'kapasitas' => 'Kapasitas', 'status' => 'Status'] as $field => $label)
            <div class="mb-3">
                <label class="form-label">{{ $label }}</label>
                <input type="text" name="{{ $field }}" class="search-box w-100"
                       value="{{ old($field, $mesin->$field ?? '') }}" required>
            </div>
        @endforeach

        <button type="submit" class="btn">{{ isset($mesin) ? 'Perbarui' : 'Simpan' }}</button>
        <a href="{{ route('mesin.index') }}" class="btn btn-danger">Batal</a>
    </form>
</div>
</body>
</html>