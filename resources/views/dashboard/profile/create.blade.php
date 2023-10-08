@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile User {{ auth()->user()->name }}</h1>
    </div>
    <!-- Content Row -->
    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-0 text-gray-800 font-weight-bolder">Form Profile</h1>
            </div>
            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control "
                            id="name" placeholder="Name">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" value="{{ auth()->user()->username }}" class="form-control "
                            id="username" placeholder="Username">
                        <small><b>PS*</b> : Username tidak boleh menggunakan spasi</small>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" value="{{ auth()->user()->email }}" class="form-control "
                            id="email" placeholder="Email">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control " id="password" placeholder="Password">
                    </div>
                </div>
                <div class="row mb-4"><label for="occupation" class="col-sm-2 col-form-label">Occupation</label>
                    <div class="col-sm-10">
                        <input type="text" name="occupation" value="{{ auth()->user()->occupation }}"
                            class="form-control" id="occupation" placeholder="Occupation">
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="inputFoto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10 d-flex align-items-center">
                        <img class="img-profile rounded-circle mr-3" id="img-live-preview"
                            style="width: 80px; height: 80px; object-fit: cover; object-position: center;"
                            src="http://arsip-app.test/storage/files/profiles/q8WFqoK1b21YXuiwjQ8xLbQn6dsT56qqUDLxnYyS.jpg"
                            alt="image">
                        <div>
                            <input type="file" name="avatar" class="form-control " id="inputFoto" placeholder="file">
                            <small><b>PS*</b> : Boleh di kosongkan </small>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="deskripsi" class="col-sm-2 py-0 col-form-label">Bio</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="4" placeholder="Bio...">
                            {{ auth()->user()->bio }}
                        </textarea>
                        <small><b>PS*</b> : Bio boleh tidak di isi </small>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-sm px-3 btn-primary rounded-pill">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
