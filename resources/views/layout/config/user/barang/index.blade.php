@extends('app')
@section('title', 'table barang')
@section('content')
    <div class="pagetitle">
        <h1>Data Barang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Barang</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg12">

                <div class="card ">
                    <div class="card-body pt-3">
                        {{-- <h5 class="card-title">Datatables</h5> --}}
                        @if (Auth::check() && Auth::user()->role != 'admin')
                            <a href="{{ route('barang.create') }}" class="btn btn-primary mt-3">tambah data</a>
                        @endif
                        <!-- Table with stripped rows -->
                        @if ($data->isEmpty())
                            <div class="alert alert-warning mt-3" role="alert">
                                Tidak ada data barang saat ini.
                            </div>
                        @else
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gudang</th>
                                        <th>Ruangan</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Code Barang</th>
                                        <th>Register</th>
                                        <th>Kondisi Barang</th>
                                        <th>Lokasi Barang</th>
                                        <th>Harga Barang</th>
                                        <th>image</th>
                                        <th>QR</th>
                                        @if (Auth::check() && Auth::user()->role != 'admin')
                                            <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->gudang }}</td>
                                            <td>{{ $d->ruangan }}</td>
                                            <td>{{ $d->nama_barang }}</td>
                                            <td>{{ $d->jenis_barang }}</td>
                                            <td>{{ $d->kode_barang }}</td>
                                            <td>{{ $d->register }}</td>
                                            <td>{{ $d->kondisi_barang }}</td>
                                            <td>{{ $d->lokasi }}</td>
                                            <td>{{ $d->harga_barang }}</td>
                                            <td>
                                                <button type="button" class="btn" data-bs-toggle="modal"
                                                    data-bs-target="#modalImage{{ $d->id }}">
                                                    <img src="{{ asset('storage/photo-image/' . $d->image) }}"
                                                        alt="" width="90">
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn" data-bs-toggle="modal"
                                                    data-bs-target="#modalQR{{ $d->id }}">
                                                    <img src="{{ asset('storage/photo-qr/' . $d->qr) }}" alt=""
                                                        width="90">
                                                </button>
                                            </td>
                                            @if (Auth::check() && Auth::user()->role != 'admin')
                                            <td>
                                                <a href="{{ route('barang.edit', ['id' => $d->id]) }}"
                                                    class="btn btn-warning me-2"><i class="bi bi-pencil-fill"></i></a>
                                                <a data-bs-toggle="modal" data-bs-target="#ModalHapus{{ $d->id }}"
                                                    class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                            </td>
                                            @endif
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
                                                        Apakah Anda yakin ingin menghapus data barang
                                                        <b class="text-warning">{{ $d->nama_barang }} ini?</b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('barang.delete', ['id' => $d->id]) }}"
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
                            <!-- End Table with stripped rows -->
                        @endif <!-- penutupan -->
                    </div><!-- penutupan .card-body -->
                </div><!-- penutupan .card -->

                <!-- Modal Gambar -->
                @foreach ($data as $d)
                    <div class="modal fade" id="modalImage{{ $d->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Gambar Barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="{{ asset('storage/photo-image/' . $d->image) }}" alt="Gambar Barang"
                                        width="200">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End Modal Gambar -->

                <!-- Modal QR -->
                @foreach ($data as $d)
                    <div class="modal fade" id="modalQR{{ $d->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">QR Code Barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="{{ asset('storage/photo-qr/' . $d->qr) }}" alt="QR Code" width="200">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End Modal QR -->

            </div><!-- penutupan .col-lg-12 -->
        </div><!-- penutupan .row -->
    </section><!-- penutupan .section -->
@endsection <!-- penutupan  -->
