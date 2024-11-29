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

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
        </div>
        <div class="card-body" style="max-height: 400px; overflow-y: scroll;">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="thead-light">
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
        </div>
    </div>
</div>
@endsection