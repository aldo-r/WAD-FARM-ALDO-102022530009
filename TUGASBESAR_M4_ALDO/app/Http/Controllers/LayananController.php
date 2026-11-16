<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    // READ: halaman utama, tabel Kiloan & Self Service
    public function index(){
        $kiloan      = Layanan::with('tarifs')->where('kategori', 'kiloan')->get();
        $selfService = Layanan::with('tarifs')->where('kategori', 'self service')->get();

        return view('layanan.index', compact('kiloan', 'selfService'));
    }

    // CREATE: form tambah
    public function create(){
    
        return view('layanan.kelola');
    }

    // CREATE: simpan ke database, lanjut isi tarif
    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori'     => 'required|in:kiloan,self service',
            'nama_layanan' => 'required|max:30',
            'minimal_kg'   => 'required|numeric|min:0.01',
        ]);

        $layanan = Layanan::create($data);

        return redirect()->route('tarif.index', $layanan->id_layanan)
            ->with('sukses', 'Layanan berhasil ditambahkan. Silakan isi tarifnya.');
    }

    // UPDATE: form edit layanan + semua tarifnya
    public function edit(Layanan $layanan)
    {
        $layanan->load('tarifs');

        return view('layanan.edit', compact('layanan'));
    }

    // UPDATE: simpan perubahan layanan + semua tarif
    public function update(Request $request, Layanan $layanan)
    {
        $data = $request->validate([
            'kategori'       => 'required|in:kiloan,self service',
            'nama_layanan'   => 'required|max:30',
            'minimal_kg'     => 'required|numeric|min:0.01',
            'nama_paket.*'   => 'required|max:50',
            'harga.*'        => 'required|integer|min:0',
            'estimasi_waktu.*' => 'required|max:20',
        ]);

        $layanan->update([
            'kategori'     => $data['kategori'],
            'nama_layanan' => $data['nama_layanan'],
            'minimal_kg'   => $data['minimal_kg'],
        ]);

        // $request->harga berbentuk [id_tarif => harga]
        foreach ($request->input('harga', []) as $idTarif => $harga) {
            $layanan->tarifs()->where('id_tarif', $idTarif)->update([
                'nama_paket'     => $request->input("nama_paket.$idTarif"),
                'harga'          => $harga,
                'estimasi_waktu' => $request->input("estimasi_waktu.$idTarif"),
            ]);
        }

        return redirect()->route('layanan.index')->with('sukses', 'Layanan berhasil diperbarui.');
    }

    // DELETE: hapus layanan (tarif ikut terhapus lewat cascade)
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()->route('layanan.kelola')->with('sukses', 'Layanan berhasil dihapus.');
    }

    // Halaman kelola: daftar layanan + form tambah
    public function kelola()
    {
        $semua = Layanan::orderBy('kategori')->orderBy('id_layanan')->get();

        return view('layanan.kelola', compact('semua'));
    }
}