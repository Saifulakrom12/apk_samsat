@extends('app')
@section('title', 'data user')
@section('content')

    <div class="pagetitle">
        <h1>Data User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Data User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary mt-3">Tambah Data User</a>

                        <!-- Table with stripped rows -->
                        @if ($users->isEmpty())
                            <div class="alert alert-warning mt-3" role="alert">
                                Tidak ada data user saat ini.
                            </div>
                        @else
                            <table class="table datatable">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> <!-- Memindahkan <tbody> di luar perulangan -->
                                    @foreach ($users as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->name }}</td>
                                            <td>{{ $d->email }}</td>
                                            <td>{{ $d->role }}</td>
                                            <td>
                                                <a href="{{ route('admin.user.edit', ['id' => $d->id]) }}"
                                                    class="btn btn-warning">edit</a>
                                                @if (auth()->user()->role != 'admin' || (auth()->user()->role == 'admin' && $d->id != auth()->user()->id))
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#ModalHapus{{ $d->id }}"
                                                        class="btn btn-danger">Hapus</a>
                                                @endif
                                            </td>
                                        </tr>
                                        {{-- modal notif delet --}}
                                        <div class="modal fade" id="ModalHapus{{ $d->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Konfirmasi Delete Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data User
                                                        <b>{{ $d->name }}</b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('admin.user.delete', ['id' => $d->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Ya,
                                                                Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- End Modal-->
                                    @endforeach
                                </tbody>
                            </table>
                        @endif <!-- penutupan -->
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
