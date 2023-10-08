@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">App Settings</h1>
    </div>
    <!-- Content Row -->
    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-0 text-gray-800 font-weight-bolder">Form Pengaturan</h1>
            </div>
            <form action="{{ route('settings.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <label for="website" class="col-sm-2 col-form-label">Title Website</label>
                    <div class="col-sm-10">
                        <input type="text" name="app_title" value="{{ setting('app_title') }}" class="form-control "
                            id="website" placeholder="Title / Nama website">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="email" class="col-sm-2 col-form-label">Email PT</label>
                    <div class="col-sm-10">
                        <input type="email" name="app_email" value="{{ setting('app_email') }}" class="form-control "
                            id="email" placeholder="Example@amerta.com">
                        <small><b>PS*</b> : Email asli PT / Kantor, email akan di tampilkan di halaman dashboard
                            utama</small>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="inputHp" class="col-sm-2 col-form-label">Nomer Hp</label>
                    <div class="col-sm-10">
                        <input type="number" name="app_phone" value="{{ setting('app_phone') }}" class="form-control "
                            id="inputHp" placeholder="Phone">
                        <small><b>PS*</b> : Nomer Hp PT / Kantor, Nomer Hp akan di tampilkan di halaman dashboard
                            utama </small>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="inputFoto" class="col-sm-2 col-form-label">Logo Website</label>
                    <div class="col-sm-10 d-flex align-items-center">
                        <img class="img-profile rounded-circle mr-3" id="img-live-preview"
                            style="width: 80px; height: 80px; object-fit: cover; object-position: center;"
                            src="{{ setting('app_logo') !== null ? asset('storage/' . setting('app_logo')) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&color=7F9CF5&background=EBF4FF' }}">
                        <div>
                            <input type="file" name="app_logo" class="form-control " id="inputFoto" placeholder="file">
                            <small><b>PS*</b> : Logo Website </small>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="deskripsi" class="col-sm-2 py-0 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control " name="app_alamat" id="exampleFormControlTextarea1" rows="4"
                            placeholder="Alamat...">
                            {{ setting('app_alamat') }}
                            </textarea>
                        <small><b>PS*</b> : Tulikan alamat sesuai lokasi PT / Kantor, alamat akan di tampilkan di halaman
                            dashboard
                            utama</small>
                    </div>
                </div>
                <div class="row mb-4"><label for="inputHp" class="col-sm-2 col-form-label">Set Pagination</label>
                    <div class="col-sm-10">
                        <input type="number" name="app_pagination" value="{{ setting('app_pagination') }}"
                            class="form-control" id="inputHp" placeholder="Pagination">
                        <small><b>PS*</b> : Set Pagination, atur jumlah data yang akan di tampilkan di table </small>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-sm px-3 btn-primary rounded-pill">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
