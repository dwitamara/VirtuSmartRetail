<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        $akuns = Akun::all();
        return view('akuns.index', compact('akuns'));
    }

    public function create()
    {
        return view('akuns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_akun' => 'required',
            'tipe' => 'required',
        ]);

        Akun::create($request->all());

        return redirect()->route('akuns.index')->with('success', 'Akun berhasil ditambahkan.');
    }

    public function edit(Akun $akun)
    {
        return view('akuns.edit', compact('akun'));
    }

    public function update(Request $request, Akun $akun)
    {
        $request->validate([
            'nama_akun' => 'required',
            'tipe' => 'required',
        ]);

        $akun->update($request->all());

        return redirect()->route('akuns.index')->with('success', 'Akun berhasil diperbarui.');
    }

    public function destroy(Akun $akun)
    {
        $akun->delete();

        return redirect()->route('akuns.index')->with('success', 'Akun berhasil dihapus.');
    }
}
