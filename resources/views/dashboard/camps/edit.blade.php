@extends('layouts.admin')
@section('title', '| Update Camp')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Camp {{ $camp->title }}</h1>
    </div>

    <!-- Content Row -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="d-flex justify-content-between card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Camp</h6>
            <h6
                class="m-0 font-weight-bold text-capitalize badge {{ $camp->status == 'active' ? 'badge-success' : 'badge-danger' }}">
                {{ $camp->status == 'active' ? 'active camp pada website!' : 'inactive camp pada website!' }}</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('camps.update', $camp->slug) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Camp Title</label>
                    <input type="text" name="title" value="{{ $camp->title }}" class="form-control" id="title"
                        placeholder="Camp title">
                </div>
                <div class="mb-3">
                    <label for="tagline" class="form-label">Camp Tagline</label>
                    <input type="text" name="tagline" value="{{ $camp->tagline }}" class="form-control" id="tagline"
                        placeholder="Camp tagline">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" value="{{ $camp->price }}" class="form-control rupiah"
                        id="price" placeholder="Price">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" placeholder="Your desc.." id="description" rows="3">
                        {{ $camp->description }}
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <div class='d-flex align-items-center'>
                        <img style="width: 130px; height: 130px; object-fit: cover; object-position: center;"
                            class="img-profile rounded-lg mr-3"
                            src="{{ $camp->image !== null ? asset('storage/' . $camp->image) : 'https://ui-avatars.com/api/?name=' . $camp->title . '&color=7F9CF5&background=EBF4FF' }}">
                        <div>
                            <input type="file" name="image" value="{{ $camp->image }}" class="form-control"
                                id="image" placeholder="Image">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <div class="form-check mr-3">
                        <input class="form-check-input" type="radio" name="status" value="active"
                            {{ $camp->status == 'active' ? 'checked' : '' }} id="active">
                        <label class="form-check-label" for="active">
                            Active
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="inactive"
                            {{ $camp->status == 'inactive' ? 'checked' : '' }} id="inactive">
                        <label class="form-check-label" for="inactive">
                            Inactive
                        </label>
                    </div>
                </div>
                {{-- create button cencel --}}
                <div class="d-flex mt-4 justify-content-end">
                    <a href="{{ route('camps.index') }}" class="btn mr-1 btn-secondary btn-sm">Cancel</a>
                    <button type="submit" class="btn btn-warning btn-sm" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
