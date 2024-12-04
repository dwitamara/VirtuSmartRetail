@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Transaksi</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <select name="id_produk" id="id_produk" class="form-select" required>
                <option value="">-- Pilih Produk --</option>
                @foreach($produk as $item)
                    @if($item->detailPenjualan->isNotEmpty()) {{-- Pastikan ada detailPenjualan --}}
                        <option value="{{ $item->id_produk }}" 
                            data-harga="{{ $item->detailPenjualan->first()->harga_satuan }}" 
                            data-stok="{{ $item->stok }}">
                            {{ $item->nama_produk }} (Stok: {{ $item->stok }}, Harga: {{ number_format($item->detailPenjualan->first()->harga_satuan, 0, ',', '.') }})
                        </option>
                    @endif
                @endforeach
            </select>            
        </div>

        <div class="mb-3">
            <label for="jumlah_produk" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah_produk" class="form-control" required min="1" value="1">
        </div>

        <div class="mb-3">
            <label for="subtotal" class="form-label">Subtotal</label>
            <input type="text" id="subtotal" class="form-control" readonly>
        </div>

        <!-- Dropdown untuk memilih pelanggan (opsional) -->
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">Pilih Pelanggan (Opsional)</label>
            <select name="id_pelanggan" id="id_pelanggan" class="form-select">
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggan as $p)
                    <option value="{{ $p->id_pelanggan }}">{{ $p->nama_pelanggan }} ({{ $p->kontak }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan Transaksi</button>
        <a href="{{ route('pos.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil elemen form yang diperlukan
        const produkSelect = document.getElementById('id_produk');
        const jumlahInput = document.getElementById('jumlah_produk');
        const subtotalInput = document.getElementById('subtotal');

        // Fungsi untuk mengupdate subtotal
        function updateSubtotal(harga_jual) {
            const jumlah = parseInt(jumlahInput.value);
            if (!isNaN(jumlah)) {
                subtotalInput.value = new Intl.NumberFormat('id-ID').format(jumlah * harga_jual);
            } else {
                subtotalInput.value = 0;
            }
        }

        // Event listener ketika produk dipilih
        produkSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const harga_jual = parseFloat(selectedOption.getAttribute('data-harga'));
            const stok = parseInt(selectedOption.getAttribute('data-stok'));

            // Set stok maksimal di input jumlah
            jumlahInput.max = stok;

            // Set nilai default jumlah
            jumlahInput.value = 1; // Default jumlah dimulai dari 1

            // Update subtotal saat produk dipilih
            updateSubtotal(harga_jual);

            // Event listener ketika jumlah diubah
            jumlahInput.addEventListener('input', function () {
                const jumlah = parseInt(this.value);
                if (jumlah > stok) {
                    jumlahInput.setCustomValidity('Jumlah melebihi stok!');
                } else {
                    jumlahInput.setCustomValidity('');
                }
                updateSubtotal(harga_jual);
            });
        });
    });
</script>
@endsection
