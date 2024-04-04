@extends('app')
@section('title', 'create barang')
@section('content')

    <div class="pagetitle">
        <h1>Data Barang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Barang</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body justify-content-center">
                        <h5 class="card-title text-center"><b>Form Tambah Barang</b></h5>
                        <form action="{{ route('barang.simpan') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Gudang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputText" name="gudang">
                                </div>
                                @error('gudang')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ruangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputText" name="ruangan">
                                </div>
                                @error('ruangan')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputText" name="nama_barang">
                                </div>
                                @error('nama_barang')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail" name="jenis_barang">
                                </div>
                                @error('jenis_barang')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputText" name="kode_barang">
                                </div>
                                @error('kode_barang')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Register</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputText" name="register">
                                </div>
                                @error('register')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kondisi Barang</label>
                                <div class="col-sm-10">
                                    <select id="inputState" class="form-select" name="kondisi_barang">
                                        <option selected>Pilih...</option>
                                        <option>Baik</option>
                                        <option>Kurang Baik</option>
                                        <option>Rusak Berat</option>
                                    </select>
                                </div>
                                @error('kondisi_barang')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">lokasi Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail" name="lokasi">
                                </div>
                                @error('lokasi')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Harga Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail" name="harga_barang">
                                </div>
                                @error('harga_barang')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="inputText" name="image">
                                </div>
                                @error('image')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">QR Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="inputText" name="qr">
                                </div>
                                @error('qr')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
