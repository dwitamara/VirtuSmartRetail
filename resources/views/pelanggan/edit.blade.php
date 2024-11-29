<!-- resources/views/pelanggan/edit.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Pelanggan</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_pelanggan">Nama Pelanggan:</label>
            <input type="text" name="nama_pelanggan" class="form-control" value="{{ $pelanggan->nama_pelanggan }}" required>
        </div>
        <div class="form-group">
            <label for="kontak">Kontak:</label>
            <input type="text" name="kontak" class="form-control" value="{{ $pelanggan->kontak }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" class="form-control" required>{{ $pelanggan->alamat }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pelanggan.data') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection