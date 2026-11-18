@extends('layouts.app')

@section('title', isset($mesin) ? 'Edit Mesin' : 'Tambah Mesin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-gear-fill me-2"></i>
                    {{ isset($mesin) ? 'Edit' : 'Tambah' }} Mesin Laundry
                </h5>
            </div>
            <div class="card-body">

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
                            <label class="form-label fw-semibold">{{ $label }}</label>
                            <input type="text" name="{{ $field }}" class="form-control"
                                   value="{{ old($field, $mesin->$field ?? '') }}" required>
                        </div>
                    @endforeach

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-save me-1"></i>{{ isset($mesin) ? 'Perbarui' : 'Simpan' }}
                        </button>
                        <a href="{{ route('mesin.index') }}" class="btn btn-secondary w-100">
                            <i class="bi bi-x-circle me-1"></i>Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
