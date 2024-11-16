@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Akun</h1>
    <form action="{{ route('akuns.update', $akun->id_akun) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_akun">Nama Akun</label>
            <input type="text" class="form-control" id="nama_akun" name="nama_akun" value="{{ $akun->nama_akun }}" required>
        </div>
        <div class="form-group">
            <label for="tipe">Tipe</label>
            <select class="form-control" id="tipe" name="tipe" required>
                <option value="Asset" {{ $akun->tipe == 'Asset' ? 'selected' : '' }}>Asset</option>
                <option value="Kewajiban" {{ $akun->tipe == 'Kewajiban' ? 'selected' : '' }}>Kewajiban</option>
                <option value="Ekuitas" {{ $akun->tipe == 'Ekuitas' ? 'selected' : '' }}>Ekuitas</option>
                <option value="Pendapatan" {{ $akun->tipe == 'Pendapatan' ? 'selected' : '' }}>Pendapatan</option>
                <option value="Beban" {{ $akun->tipe == 'Beban' ? 'selected' : '' }}>Beban</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
