@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Shift</h2>
    <a href="{{ route('shift.create') }}" class="btn btn-primary mb-3">Tambah Shift</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Shift</th>
                <th>Nama Shift</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shifts as $shift)
                <tr>
                    <td>{{ $shift->id_shift }}</td>
                    <td>{{ $shift->nama_shift }}</td>
                    <td>{{ $shift->jam_mulai }}</td>
                    <td>{{ $shift->jam_selesai }}</td>
                    <td>
                        <a href="{{ route('shift.edit', $shift->id_shift) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('shift.destroy', $shift->id_shift) }}" method="POST" style="display:inline;">
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
