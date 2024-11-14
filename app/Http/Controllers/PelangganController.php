<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;


class PelangganController extends Controller
{
    // Konstruktor untuk pengecekan role dan ID karyawan

    // Fungsi untuk menampilkan semua pelanggan
    public function data()
    {
        $role = Auth::user()->role;

        $pelanggan = Pelanggan::all();
        return view('pelanggan.data', compact('role','pelanggan'));
    }

    // Fungsi untuk menampilkan form tambah pelanggan
    public function create()
    {
        return view('pelanggan.create');
    }

    // Fungsi untuk menyimpan data pelanggan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        Pelanggan::create($request->only('nama_pelanggan', 'kontak', 'alamat'));

        return redirect()->route('pelanggan.data')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Fungsi untuk menampilkan form edit pelanggan
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    // Fungsi untuk memperbarui data pelanggan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->only('nama_pelanggan', 'kontak', 'alamat'));

        return redirect()->route('pelanggan.data')->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    // Fungsi untuk menghapus data pelanggan
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.data')->with('success', 'Pelanggan berhasil dihapus.');
    }
}