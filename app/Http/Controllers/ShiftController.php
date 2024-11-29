<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    // Menampilkan daftar shift
    public function index()
    {
        $shifts = Shift::all();
        return view('shift.index', compact('shifts'));
    }

    // Menampilkan form untuk membuat shift
    public function create()
    {
        return view('shift.create');
    }

    // Menyimpan data shift baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_shift' => 'required|string|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
        ]);

        Shift::create($request->all());

        return redirect()->route('shift.index')->with('success', 'Shift berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit shift
    public function edit(Shift $shift)
    {
        return view('shift.edit', compact('shift'));
    }

    // Mengupdate data shift
    public function update(Request $request, Shift $shift)
    {
        $request->validate([
            'nama_shift' => 'required|string|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
        ]);

        $shift->update($request->all());

        return redirect()->route('shift.index')->with('success', 'Shift berhasil diperbarui');
    }

    // Menghapus shift
    public function destroy(Shift $shift)
    {
        $shift->delete();

        return redirect()->route('shift.index')->with('success', 'Shift berhasil dihapus');
    }

    // Jika ada method data yang tidak didefinisikan, pastikan Anda tidak memanggilnya
}

