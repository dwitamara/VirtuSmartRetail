@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Akun</h1>
    <form action="{{ route('akuns.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_akun">Nama Akun</label>
            <input type="text" class="form-control" id="nama_akun" name="nama_akun" required>
        </div>
        <div class="form-group">
            <label for="tipe">Tipe</label>
            <select class="form-control" id="tipe" name="tipe" required>
                <option value="Asset">Asset</option>
                <option value="Kewajiban">Kewajiban</option>
                <option value="Ekuitas">Ekuitas</option>
                <option value="Pendapatan">Pendapatan</option>
                <option value="Beban">Beban</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
