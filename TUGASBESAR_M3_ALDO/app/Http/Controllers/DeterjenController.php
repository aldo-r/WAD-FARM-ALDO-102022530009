<?php

namespace App\Http\Controllers;

use App\Models\Deterjen;
use Illuminate\Http\Request;

class DeterjenController extends Controller
{
    public function index()
    {
        $deterjens = Deterjen::latest()->paginate(10);
        return view('deterjens.index', compact('deterjens'));
    }

    public function create()
    {
        return view('deterjens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'supplier' => 'required|string|max:255',
            'tanggal_pembelian' => 'required|date',
            'stok' => 'required|integer|min:0',
        ]);

        Deterjen::create($request->all());

        return redirect()->route('deterjens.index')
                         ->with('success', 'Data deterjen berhasil ditambahkan.');
    }

    public function show(Deterjen $deterjen)
    {
        return view('deterjens.show', compact('deterjen'));
    }

    public function edit(Deterjen $deterjen)
    {
        return view('deterjens.edit', compact('deterjen'));
    }

    public function update(Request $request, Deterjen $deterjen)
    {
        $request->validate([
            'merek' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'supplier' => 'required|string|max:255',
            'tanggal_pembelian' => 'required|date',
            'stok' => 'required|integer|min:0',
        ]);

        $deterjen->update($request->all());

        return redirect()->route('deterjens.index')
                         ->with('success', 'Data deterjen berhasil diperbarui.');
    }

    public function destroy(Deterjen $deterjen)
    {
        $deterjen->delete();

        return redirect()->route('deterjens.index')
                         ->with('success', 'Data deterjen berhasil dihapus.');
    }
}
