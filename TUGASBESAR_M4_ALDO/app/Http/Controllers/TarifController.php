<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    // READ: daftar tarif milik satu layanan + form tambah
    public function index(Layanan $layanan)
    {
        $layanan->load('tarifs');

        return view('tarif.index', compact('layanan'));
    }

    // CREATE
    public function store(Request $request, Layanan $layanan)
    {
        $data = $request->validate([
            'nama_paket'     => 'required|max:50',
            'harga'          => 'required|integer|min:0',
            'estimasi_waktu' => 'required|max:20',
        ]);

        $layanan->tarifs()->create($data);

        return redirect()->route('tarif.index', $layanan->id_layanan)->with('sukses', 'Tarif berhasil ditambahkan.');
    }

    // UPDATE: form edit satu tarif
    public function edit(Tarif $tarif)
    {
        return view('tarif.edit', compact('tarif'));
    }

    // UPDATE: simpan
    public function update(Request $request, Tarif $tarif)
    {
        $data = $request->validate([
            'nama_paket'     => 'required|max:50',
            'harga'          => 'required|integer|min:0',
            'estimasi_waktu' => 'required|max:20',
        ]);

        $tarif->update($data);

        return redirect()->route('tarif.index', $tarif->id_layanan)->with('sukses', 'Tarif berhasil diperbarui.');
    }

    // DELETE
    public function destroy(Tarif $tarif)
    {
        $idLayanan = $tarif->id_layanan;
        $tarif->delete();

        return redirect()->route('tarif.index', $idLayanan)->with('sukses', 'Tarif berhasil dihapus.');
    }
}