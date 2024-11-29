@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <h1 class="text-xl font-bold mb-4">Laporan Penjualan</h1>
    <div class="flex justify-between items-center mb-4">
        <div></div> <!-- Ruang kosong untuk menjaga posisi di kiri -->
        <form method="GET" action="{{ route('laporan.index') }}" class="flex items-center space-x-2">
            <label for="tanggal" class="text-sm">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" class="border rounded p-2" value="{{ request('tanggal') }}">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Filter</button>
            <a href="{{ route('laporan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Reset Filter</a>
        </form>
    </div>

    <div class="table-responsive mt-4" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksi as $trx)
                    @foreach($trx->detailPenjualan as $detail)
                    <tr>
                        <td>{{ $trx->tanggal_penjualan }}</td>
                        <td>{{ $detail->produk->nama_produk ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>{{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                        <td>{{ number_format($detail->jumlah * $detail->harga_satuan, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data penjualan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
