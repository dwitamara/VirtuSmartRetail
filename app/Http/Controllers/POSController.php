<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\TransaksiPenjualan;
use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class POSController extends Controller
{
    /**
     * Tampilkan halaman POS
     */
    public function index()
    {
        $transaksi = TransaksiPenjualan::with('detailPenjualan.produk', 'pelanggan') // Memuat relasi detailPenjualan dan produk
                                    ->latest() // Mengurutkan berdasarkan tanggal terbaru
                                    ->get();
        
        return view('pos.index', compact('transaksi'));
    }
    

    /**
     * Tampilkan form tambah transaksi
     */
    public function create()
    {
        $produk = Produk::all(); // Ambil semua produk untuk dropdown
        $pelanggan = Pelanggan::all();
    
        return view('pos.create', compact('produk', 'pelanggan'));
    }
    

    /**
     * Simpan transaksi
     */
    public function store(Request $request)
{
    // Validasi dan simpan data transaksi
    $transaksi = TransaksiPenjualan::create([
        'id_pelanggan' => $request->id_pelanggan,
        'tanggal_transaksi' => now(), // Menyimpan tanggal transaksi saat ini
    ]);

    // Simpan detail transaksi (produk yang dibeli)
    foreach ($request->produk as $produk) {
        DetailPenjualan::create([
            'id_penjualan' => $transaksi->id_penjualan,
            'id_produk' => $produk['id'],
            'jumlah' => $produk['jumlah'],
            'subtotal' => $produk['subtotal'],
        ]);
    }

    return redirect()->route('pos.index');
}

    
     

    /**
     * Tampilkan hasil transaksi
     */
    public function result($id)
    {
        $transaksi = TransaksiPenjualan::with('detail_penjualan.produk')->findOrFail($id);
        return view('pos.result', compact('transaksi'));
    }

    /**
     * Cetak struk transaksi
     */
    public function cetakStruk($id)
    {
        $transaksi = TransaksiPenjualan::with('detail_penjualan.produk')->findOrFail($id);
        return view('pos.struk', compact('transaksi'));
    }

    /**
     * Hapus transaksi
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $transaksi = TransaksiPenjualan::findOrFail($id);

            // Kembalikan stok produk
            foreach ($transaksi->detail_penjualan as $detail) {
                $detail->produk->increment('stok', $detail->jumlah);
            }

            // Hapus detail dan transaksi
            $transaksi->detail_penjualan()->delete();
            $transaksi->delete();

            DB::commit();
            return redirect()->route('pos.index')->with('success', 'Transaksi berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
