@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Akun</h1>
    <a href="{{ route('akuns.create') }}" class="btn btn-primary">Tambah Akun</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Akun</th>
                <th>Tipe</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($akuns as $akun)
            <tr>
                <td>{{ $akun->id_akun }}</td>
                <td>{{ $akun->nama_akun }}</td>
                <td>{{ $akun->tipe }}</td>
                <td>
                    <a href="{{ route('akuns.edit', $akun->id_akun) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('akuns.destroy', $akun->id_akun) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
