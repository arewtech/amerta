@extends('layouts.admin')
@section('title', '| Camps')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Table Camp : {{ $camps->count() }}</h1>
        <button type="button" class="d-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#createCampModal"><i class="fas fa-plus-circle"></i></button>
    </div>
    <p><span style="font-weight: 700">PS :</span> Punya 4 benefits jika ingin camp active</p>

    <!-- Content Row -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title Camp</th>
                            <th>Tagline</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($camps as $camp)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $camp->title }}</td>
                                <td>{{ $camp->tagline }}</td>
                                <td>
                                    @if ($camp->benefits->count() !== 4)
                                        <span style='font-size: 13px;'
                                            class='badge rounded-pill px-2 text-white bg-danger'>inactive</span>
                                    @else
                                        <span style='font-size: 13px;'
                                            class='badge rounded-pill px-2 text-white bg-success'>active</span>
                                    @endif
                                </td>
                                <td>Rp. @currency($camp->price)</td>
                                <td>
                                    <div class="d-inline-flex">
                                        <a href="{{ route('camps.edit', $camp->slug) }}"
                                            class="btn btn-warning btn-sm mx-2"><i class="far fa-edit"></i></a>
                                        <button type="button" data-toggle="modal"
                                            data-target="#deleteCamp{{ $camp->slug }}" class="btn btn-danger btn-sm"><i
                                                class="far fa-trash-alt"></i></button>
                                        <div class="modal fade" id="deleteCamp{{ $camp->slug }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modalCamp" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalCamp">Delete Camp</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure want to delete this
                                                            {{ $camp->title }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('camps.destroy', $camp->slug) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-primary" type="submit">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Camp Modal-->
    <div class="modal fade" id="createCampModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabelCampBenefits" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelCampBenefits">Create Camp Amerta</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('camps.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Camp Title</label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Camp title">
                        </div>
                        {{-- <div class="mb-3">
                            <label for="slug" class="form-label">Camp slug</label>
                            <input type="text" name="slug" class="form-control" id="slug"
                                placeholder="your-camp-slug">
                        </div> --}}
                        <div class="mb-3">
                            <label for="tagline" class="form-label">Camp Tagline</label>
                            <input type="text" name="tagline" class="form-control" id="tagline"
                                placeholder="Camp tagline">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="Price">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" placeholder="Your desc.." id="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Camp Modal-->
@endsection
