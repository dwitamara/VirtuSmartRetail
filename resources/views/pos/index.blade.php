@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Transaksi</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-4">
        <!-- Tombol untuk tambah transaksi -->
        <a href="{{ route('pos.create') }}" class="btn btn-primary">Tambah Transaksi</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>Pelanggan</th>
                <th>Detail Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $index => $trx)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if ($trx->tanggal_transaksi)
                            {{ $trx->tanggal_transaksi->format('Y-m-d H:i:s') }}
                        @else
                            <span>Tanggal tidak tersedia</span>
                        @endif
                    </td>
                    <td>{{ $trx->pelanggan ? $trx->pelanggan->nama_pelanggan : 'Tanpa Pelanggan' }}</td>
                    <td>
                        <ul>
                            @foreach($trx->detailPenjualan as $detail)
                                <li>{{ $detail->produk->nama_produk }} - {{ $detail->jumlah }} x Rp {{ number_format($detail->produk->harga_jual, 0, ',', '.') }} = Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('pos.edit', $trx->id_penjualan) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                            <!-- Form Delete -->
                            <form action="{{ route('pos.destroy', $trx->id_penjualan) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Delete</button>
                            </form>
                        
                            <!-- Tombol Cetak Struk -->
                            <a href="{{ route('pos.struk', $trx->id_penjualan) }}" class="btn btn-info btn-sm" target="_blank">Cetak Struk</a>
                        </td>                        
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
