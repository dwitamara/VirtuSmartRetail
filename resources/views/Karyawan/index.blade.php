@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Content Row -->
        <div class="row">
            <div id="page-top">
                <div id="wrapper">
                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">Daftar Karyawan</h1>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="mb-4">
                            <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Karyawan</a>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
                            </div>
                            <div class="card-body" style="max-height: 400px; overflow-y: scroll;">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nama</th>
                                                <th>Posisi</th>
                                                <th>Gaji Pokok</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($karyawan as $k)
                                                <tr>
                                                    <td>{{ $k->nama }}</td>
                                                    <td>{{ $k->posisi }}</td>
                                                    <td>{{ number_format($k->gaji_pokok, 0, ',', '.') }}</td>
                                                    <td>{{ $k->username }}</td>
                                                    <td>{{ $k->email }}</td>
                                                    <td>{{ $k->status }}</td>
                                                    <td class="d-flex gap-2">
                                                        <a href="{{ route('karyawan.edit', $k->id_karyawan) }}"
                                                            class="btn btn-sm btn-warning"
                                                            style="padding: 3px 8px; font-size: 12px;">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('karyawan.destroy', $k->id_karyawan) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                style="padding: 3px 8px; font-size: 12px;"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
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
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

    </div>
    </div>
    <!-- /.container-fluid -->

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk keluar</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Jika yakin keluar maka klik logout.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
