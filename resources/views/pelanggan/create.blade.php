<!-- resources/views/pelanggan/create.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Pelanggan</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_pelanggan">Nama Pelanggan:</label>
            <input type="text" name="nama_pelanggan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kontak">Kontak:</label>
            <input type="text" name="kontak" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pelanggan.data') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection