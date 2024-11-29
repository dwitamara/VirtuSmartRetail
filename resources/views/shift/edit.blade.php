@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Shift</h2>
    <form action="{{ route('shift.update', $shift->id_shift) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_shift">Nama Shift</label>
            <input type="text" class="form-control" id="nama_shift" name="nama_shift" value="{{ $shift->nama_shift }}" required>
        </div>

        <div class="form-group">
            <label for="jam_mulai">Jam Mulai</label>
            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="{{ $shift->jam_mulai }}" required>
        </div>

        <div class="form-group">
            <label for="jam_selesai">Jam Selesai</label>
            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="{{ $shift->jam_selesai }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Shift</button>
    </form>
</div>
@endsection
