{{-- Partial: tabel layanan. Dipakai untuk Kiloan dan Self Service --}}
<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <tr>
        <th>No</th>
        <th>Layanan</th>
        <th>Minimal</th>
        <th>Harga</th>
        <th>Estimasi Waktu</th>
        <th>Edit</th>
    </tr>
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
            <td>
                <a href="{{ route('layanan.edit', $layanan->id_layanan) }}">Edit</a>
            </td>
        </tr>
    @empty
        <tr><td colspan="6" align="center">Belum ada layanan.</td></tr>
    @endforelse
</table>