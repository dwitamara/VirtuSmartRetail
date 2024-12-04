@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Transaksi</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pos.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="produk_id" class="form-label">Pilih Produk</label>
            <select name="produk_id" id="produk_id" class="form-select" required>
                <option value="">-- Pilih Produk --</option>
                @foreach($produk as $item)
                    <option value="{{ $item->id }}" data-harga="{{ $item->harga }}" data-stok="{{ $item->stok }}"
                        {{ $item->id == $transaksi->detailPenjualan->first()->produk_id ? 'selected' : '' }}>
                        {{ $item->nama_produk }} (Stok: {{ $item->stok }}, Harga: {{ number_format($item->harga, 0, ',', '.') }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" 
                   value="{{ $transaksi->detailPenjualan->first()->jumlah }}" required>
        </div>

        <div class="mb-3">
            <label for="subtotal" class="form-label">Subtotal</label>
            <input type="text" id="subtotal" class="form-control" 
                   value="{{ number_format($transaksi->detailPenjualan->first()->subtotal, 0, ',', '.') }}" readonly>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('pos.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
    // Mengupdate subtotal ketika jumlah berubah
    document.getElementById('jumlah').addEventListener('input', function() {
        let produkSelect = document.getElementById('produk_id');
        let harga = produkSelect.options[produkSelect.selectedIndex].dataset.harga;
        let jumlah = this.value;
        let subtotal = harga * jumlah;

        // Update subtotal di form
        document.getElementById('subtotal').value = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
        }).format(subtotal);
    });
</script>

@endsection
