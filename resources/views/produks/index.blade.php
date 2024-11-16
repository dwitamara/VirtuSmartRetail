@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Produk List</h1>
        <a href="{{ route('produks.create') }}" class="btn btn-primary">Add Produk</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                {{ $message }}
            </div>
        @endif
        <table class="table mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                    <tr>
                        <td>{{ $produk->id_produk }}</td>
                        <td>{{ $produk->nama_produk }}</td>
                        <td>{{ $produk->kategori }}</td>
                        <td>{{ $produk->stok }}</td>
                        <td>{{ $produk->harga_beli }}</td>
                        <td>{{ $produk->harga_jual }}</td>
                        <td>
                            <a href="{{ route('produks.edit', $produk->id_produk) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('produks.destroy', $produk->id_produk) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
