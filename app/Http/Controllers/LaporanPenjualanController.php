<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPenjualan;
use App\Models\DetailPenjualan;

class LaporanPenjualanController extends Controller
{
    /**
     * Tampilkan laporan penjualan.
     */
    public function index(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Query transaksi berdasarkan filter tanggal, bulan, atau tahun
        $transaksi = TransaksiPenjualan::query();

        if ($tanggal) {
            $transaksi->whereDate('tanggal_penjualan', $tanggal);
        }

        if ($bulan) {
            $transaksi->whereMonth('tanggal_penjualan', $bulan);
        }

        if ($tahun) {
            $transaksi->whereYear('tanggal_penjualan', $tahun);
        }

        $transaksi = $transaksi->with('detailPenjualan.produk')->get();

        return view('laporan.index', compact('transaksi', 'tanggal', 'bulan', 'tahun'));
    }
}
