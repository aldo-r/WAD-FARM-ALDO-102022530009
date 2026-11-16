<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    private function aturan(): array
    {
        return [
            'nama'      => 'required',
            'merek'     => 'required',
            'kapasitas' => 'required',
            'status'    => 'required',
        ];
    }

    public function index()
    {
        $mesin = Mesin::all();
        return view('mesin.index', compact('mesin'));
    }

    public function create()
    {
        return view('mesin.form');
    }

    public function store(Request $request)
    {
        Mesin::create($request->validate($this->aturan()));
        return redirect()->route('mesin.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit(Mesin $mesin)
    {
        return view('mesin.form', compact('mesin'));
    }

    public function update(Request $request, Mesin $mesin)
    {
        $mesin->update($request->validate($this->aturan()));
        return redirect()->route('mesin.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Mesin $mesin)
    {
        $mesin->delete();
        return redirect()->route('mesin.index')->with('success', 'Data berhasil dihapus');
    }
}