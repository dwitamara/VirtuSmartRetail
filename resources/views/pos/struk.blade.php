@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Struk Transaksi</h1>

    <div class="mb-4">
        <p><strong>ID Transaksi:</strong> {{ $transaksi->id_penjualan }}</p>
        <p><strong>Tanggal:</strong> {{ $transaksi->tanggal_transaksi ? $transaksi->tanggal_transaksi->format('Y-m-d H:i:s') : 'Tanggal tidak tersedia' }}</p>
        <p><strong>Pelanggan:</strong> {{ $transaksi->pelanggan ? $transaksi->pelanggan->nama_pelanggan : 'Tanpa Pelanggan' }}</p>
        <hr>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksi->detailPenjualan as $detail)
                    <tr>
                        <td>{{ $detail->produk->nama_produk ?? 'Produk Tidak Diketahui' }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                        <!-- Hitung subtotal sebagai jumlah * harga_satuan -->
                        <td>Rp {{ number_format($detail->jumlah * $detail->harga_satuan, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr>
        <div class="text-right">
            <!-- Hitung total harga dengan menjumlahkan subtotal setiap item -->
            <h4>Total Harga: Rp {{ number_format($transaksi->detailPenjualan->sum(function($detail) {
                return $detail->jumlah * $detail->harga_satuan;
            }), 0, ',', '.') }}</h4>
        </div>
    </div>
</div>
@endsection
