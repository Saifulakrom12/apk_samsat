@extends('app')
@section('title', 'edit data user')
@section('content')

    <div class="pagetitle">
        <h1>Data User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Update User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Update User</h5>
                        <!-- Horizontal Form -->
                        <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Your Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputText" name="nama"
                                        value="{{ $user->name }}">
                                </div>
                                @error('nama')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" name="email"
                                        value="{{ $user->email }}">
                                </div>
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select id="inputState" class="form-select" name="role">
                                        <option selected value="{{ $user->role }}">Pilih...</option>
                                        <option>User</option>
                                        <option>Admin</option>
                                    </select>
                                </div>
                                @error('role')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" name="password">
                                </div>
                                @error('password')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Horizontal Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
