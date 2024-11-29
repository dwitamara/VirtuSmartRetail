<?php

namespace App\Http\Controllers;

use App\Models\StokOpname;
use App\Models\Produk;
use Illuminate\Http\Request;

class StokOpnameController extends Controller
{
    public function index()
    {
        $stokopnames = StokOpname::with('produk')->get();
        return view('stokopnames.index', compact('stokopnames'));
    }

    public function create()
    {
        $produks = Produk::all();
        return view('stokopnames.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required',
            'tanggal_opname' => 'required',
            'jumlah_sebenarnya' => 'required|integer',
        ]);

        $produk = Produk::find($request->id_produk);
        $selisih = $request->jumlah_sebenarnya - $produk->stok;

        $produk->update(['stok' => $request->jumlah_sebenarnya]);

        StokOpname::create([
            'id_produk' => $request->id_produk,
            'tanggal_opname' => $request->tanggal_opname,
            'jumlah_sebenarnya' => $request->jumlah_sebenarnya,
            'selisih' => $selisih,
        ]);

        return redirect()->route('stokopnames.create')->with('success', 'Stok Opname berhasil ditambahkan.');
    }

    public function edit(StokOpname $stokopname)
    {
        $produks = Produk::all();
        return view('stokopnames.edit', compact('stokopname', 'produks'));
    }

    public function update(Request $request, StokOpname $stokopname)
    {
        $request->validate([
            'id_produk' => 'required',
            'tanggal_opname' => 'required',
            'jumlah_sebenarnya' => 'required|integer',
        ]);

        $produk = Produk::find($request->id_produk);
        $selisih = $request->jumlah_sebenarnya - $produk->stok;

        $stokopname->update([
            'id_produk' => $request->id_produk,
            'tanggal_opname' => $request->tanggal_opname,
            'jumlah_sebenarnya' => $request->jumlah_sebenarnya,
            'selisih' => $selisih,
        ]);

        return redirect()->route('stokopnames.index')->with('success', 'Stok Opname berhasil diperbarui.');
    }

    public function destroy(StokOpname $stokopname)
    {
        $stokopname->delete();

        return redirect()->route('stokopnames.index')->with('success', 'Stok Opname berhasil dihapus.');
    }
}
