{{-- Partial: tabel layanan. Dipakai untuk Kiloan dan Self Service --}}
<table class="table table-bordered table-striped mb-0">
    <thead>
        <tr>
            <th>No</th>
            <th>Layanan</th>
            <th>Minimal</th>
            <th>Harga</th>
            <th>Estimasi Waktu</th>
            @if(auth()->user()->isAdmin())
                <th>Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>
    @forelse ($daftar as $layanan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $layanan->nama_layanan }}</td>
            <td>{{ (float) $layanan->minimal_kg }} Kg</td>
            <td>
                @forelse ($layanan->tarifs as $t)
                    Rp{{ number_format($t->harga, 0, ',', '.') }} ({{ $t->nama_paket }})<br>
                @empty
                    -
                @endforelse
            </td>
            <td>
                @forelse ($layanan->tarifs as $t)
                    {{ $t->estimasi_waktu }}<br>
                @empty
                    -
                @endforelse
            </td>
            @if(auth()->user()->isAdmin())
                <td>
                    <a href="{{ route('layanan.edit', $layanan->id_layanan) }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                </td>
            @endif
        </tr>
    @empty
        <tr><td colspan="6" class="text-center">Belum ada layanan.</td></tr>
    @endforelse
    </tbody>
</table>
