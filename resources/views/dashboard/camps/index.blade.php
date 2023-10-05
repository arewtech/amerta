@extends('layouts.admin')
@section('title', '| Camps')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Table Camp : {{ $camps->count() }}</h1>
        <button type="button" class="d-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#createCampModal"><i class="fas fa-plus-circle"></i></button>
    </div>
    <p><span style="font-weight: 700">PS :</span> default camp inactive, update camp jika ingin menjadi active</p>

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
                            <th class='text-center'>No</th>
                            <th>Title Camp</th>
                            <th class='text-center'>Price</th>
                            <th class='text-center'>Status</th>
                            {{-- <th class='text-center'>Image</th> --}}
                            <th class='text-center'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($camps as $camp)
                            <tr>
                                <td class='text-center'>{{ $loop->iteration }}</td>
                                <td>{{ $camp->title }}</td>
                                <td class='text-center'>Rp. @currency($camp->price)</td>
                                <td class='text-center'>
                                    <span style='font-size: 13px;'
                                        class='badge rounded-pill px-2 text-white {{ $camp->status == 'active' ? 'bg-success' : 'bg-danger' }} '>
                                        {{ $camp->status == 'active' ? 'active' : 'inactive' }}</span>
                                </td>
                                {{-- <td class='text-center'>
                                    <img style="width: 50px; height: 50px; object-fit: cover; object-position: center;"
                                        class="img-profile rounded-circle"
                                        src="{{ $camp->image !== null ? asset('storage/' . $camp->image) : 'https://ui-avatars.com/api/?name=' . $camp->title . '&color=7F9CF5&background=EBF4FF' }}">
                                </td> --}}
                                <td class='text-center'>
                                    <div class="d-inline-flex">
                                        <a href="#" class="btn btn-info btn-sm"><i class="far fa-eye"></i></a>
                                        <a href="{{ route('camps.edit', $camp->slug) }}"
                                            class="btn btn-warning btn-sm mx-1"><i class="far fa-edit"></i></a>
                                        <button type="button" data-toggle="modal"
                                            data-target="#deleteCamp{{ $camp->slug }}" class="btn btn-danger btn-sm"><i
                                                class="far fa-trash-alt"></i></button>
                                        <a href="{{ route('camp-benefits.index', $camp) }}"
                                            class="btn btn-primary btn-sm mx-1 position-relative"><i
                                                class="far fa-list-alt"></i>
                                            <span style="top: -8px"
                                                class="position-absolute start-100 translate-middle badge rounded-pill {{ $camp->benefits->count() >= 4 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $camp->benefits->count() }}
                                                <span class="visually-hidden"></span>
                                            </span></a>
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
                <form action="{{ route('camps.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Camp Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="title" placeholder="Camp title">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tagline" class="form-label">Camp Tagline</label>
                            <input type="text" name="tagline"
                                class="form-control @error('tagline') is-invalid @enderror" id="tagline"
                                placeholder="Camp tagline">
                            @error('tagline')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price"
                                class="form-control rupiah @error('price') is-invalid @enderror" id="price"
                                placeholder="Price">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" name="image"
                                type="file" id="formFile">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                placeholder="Your desc.." id="description" rows="3"></textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary btn-sm" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Camp Modal-->
    @push('modal-js')
        @if ($errors->any())
            <script>
                var myModal = new bootstrap.Modal(document.getElementById('createCampModal'), {
                    keyboard: false
                })
                // refresh page
                myModal.show()
                // $('.modal').on('hidden.bs.modal', function() {
                //     window.location.reload();
                // });
                // refresh page
            </script>
        @endif
    @endpush
@endsection
