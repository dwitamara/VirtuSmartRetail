<!-- resources/views/auth/change-password.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Ganti Password</h2>

    <!-- Tampilkan pesan error jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <form action="{{ route('ubah-password') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="current_password">Password Lama</label>
            <div class="input-group">
                <input type="password" name="current_password" id="current_password" class="form-control" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-secondary" id="toggle-current-password">
                        <i class="fa fa-eye"></i> <!-- Icon mata untuk toggle -->
                    </button>
                </div>
            </div>
        </div>

        <input type="hidden" name="id_karyawan" value="{{ Auth::user()->id_karyawan }}">

        <div class="form-group">
            <label for="new_password">Password Baru</label>
            <div class="input-group">
                <input type="password" name="new_password" id="new_password" class="form-control" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-secondary" id="toggle-new-password">
                        <i class="fa fa-eye"></i> <!-- Icon mata untuk toggle -->
                    </button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="new_password_confirmation">Konfirmasi Password Baru</label>
            <div class="input-group">
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-secondary" id="toggle-confirm-password">
                        <i class="fa fa-eye"></i> <!-- Icon mata untuk toggle -->
                    </button>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Ganti Password</button>
    </form>
</div>
<script>
    // Toggle password visibility
    document.getElementById('toggle-current-password').addEventListener('click', function () {
        var passwordField = document.getElementById('current_password');
        var icon = this.querySelector('i');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    document.getElementById('toggle-new-password').addEventListener('click', function () {
        var passwordField = document.getElementById('new_password');
        var icon = this.querySelector('i');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    document.getElementById('toggle-confirm-password').addEventListener('click', function () {
        var passwordField = document.getElementById('new_password_confirmation');
        var icon = this.querySelector('i');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>


@endsection
