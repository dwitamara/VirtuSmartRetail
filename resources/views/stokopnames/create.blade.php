@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Stok Opname</h1>
    <form action="{{ route('stokopnames.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_produk">Produk</label>
            <select class="form-control" id="id_produk" name="id_produk" required>
                @foreach($produks as $produk)
                <option value="{{ $produk->id_produk }}">{{ $produk->nama_produk }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_opname">Tanggal Opname</label>
            <input type="date" class="form-control" id="tanggal_opname" name="tanggal_opname" value="{{ date('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="jumlah_sebenarnya">Jumlah Sebenarnya</label>
            <input type="number" class="form-control" id="jumlah_sebenarnya" name="jumlah_sebenarnya" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
