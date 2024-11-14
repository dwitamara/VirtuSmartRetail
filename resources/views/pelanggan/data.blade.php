<!-- resources/views/pelanggan/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Pelanggan</h2>
    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">Tambah Pelanggan</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>Kontak</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggan as $p)
            <tr>
                <td>{{ $p->id_pelanggan }}</td>
                <td>{{ $p->nama_pelanggan }}</td>
                <td>{{ $p->kontak }}</td>
                <td>{{ $p->alamat }}</td>
                <td>
                    <a href="{{ route('pelanggan.edit', $p->id_pelanggan) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pelanggan.destroy', $p->id_pelanggan) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection