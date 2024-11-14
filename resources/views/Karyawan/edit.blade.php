@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Karyawan</h1>
            <a href="{{ route('karyawan.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali ke Daftar Karyawan
            </a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Karyawan</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('karyawan.update', $karyawan->id_karyawan) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Nama Karyawan -->
                            <div class="form-group">
                                <label for="nama">Nama Karyawan</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $karyawan->nama) }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Posisi -->
                            <div class="form-group">
                                <label for="posisi">Posisi</label>
                                <input type="text" class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi" value="{{ old('posisi', $karyawan->posisi) }}" required>
                                @error('posisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Gaji Pokok -->
                            <div class="form-group">
                                <label for="gaji_pokok">Gaji Pokok</label>
                                <input type="number" class="form-control @error('gaji_pokok') is-invalid @enderror" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok', $karyawan->gaji_pokok) }}" required>
                                @error('gaji_pokok')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Username -->
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $karyawan->username) }}" required>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $karyawan->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password (Kosongkan jika tidak ingin mengubah) -->
                            <div class="form-group">
                                <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="Active" {{ old('status', $karyawan->status) == 'Active' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Inactive" {{ old('status', $karyawan->status) == 'Inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Karyawan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Page Content -->
@endsection
