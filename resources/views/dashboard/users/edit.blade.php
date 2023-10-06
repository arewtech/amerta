@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User {{ $user->name }}</h1>
    </div>

    <!-- Content Row -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="d-flex justify-content-between card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
            <h6
                class="m-0 font-weight-bold text-capitalize badge {{ $user->status == 'active' ? 'badge-success' : 'badge-danger' }}">
                {{ $user->status == 'active' ? 'active' : 'inactive' }}</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3 my-4">
                        <div class='d-flex justify-content-center align-items-center'>
                            <img style="width: 120px; height: 120px; object-fit: cover; object-position: center;"
                                class="img-profile rounded-circle mr-3"
                                src="{{ $user->avatar !== null ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . $user->name . '&color=7F9CF5&background=EBF4FF' }}">
                            <div>
                                <input type="file" name="avatar" value="{{ $user->avatar }}" class="form-control"
                                    id="avatar" placeholder="Avatar">
                            </div>
                        </div>
                    </div>
                    <hr style="width: 90%" class="mb-5">
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ $user->name }}" id="name" placeholder="Name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            value="{{ $user->username }}" id="username" placeholder="Username">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ $user->email }}" id="email" placeholder="Email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tagline" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="occupation" class="form-label">Occupation</label>
                        <input type="text" name="occupation"
                            class="form-control @error('occupation') is-invalid @enderror" id="occupation"
                            value="{{ $user->occupation }}" placeholder="Occupation">
                        @error('occupation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control" name="bio" placeholder="Your bio.." id="bio" rows="3">
                            {{ $user->bio ?? 'Bio...' }}
                        </textarea>
                        @error('bio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12 d-flex justify-content-center align-items-center mb-3">
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="status" value="active"
                                {{ $user->status == 'active' ? 'checked' : '' }} id="active">
                            <label class="form-check-label" for="active">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="inactive"
                                {{ $user->status == 'inactive' ? 'checked' : '' }} id="inactive">
                            <label class="form-check-label" for="inactive">
                                Inactive
                            </label>
                        </div>
                    </div>
                </div>
                {{-- create button cencel --}}
                <div class="d-flex mt-4 justify-content-end">
                    <a href="{{ route('users.index') }}" class="btn mr-1 btn-secondary btn-sm">Cancel</a>
                    <button type="submit" class="btn btn-warning btn-sm" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
