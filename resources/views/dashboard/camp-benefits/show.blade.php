@extends('layouts.admin')
@section('title', '| Detail Camp Benefits')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table List Benefits ( {{ $campBenefits->title }} :
            {{ $campBenefits->status }} )</h1>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createCampBenefitsModal"><i
                class="fas fa-plus-circle"></i></button>
    </div>

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
                            <th>Benefit Camps ( {{ $campBenefits->title }} )</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($campBenefits->benefits as $benefit)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $benefit->name }}</td>
                                <td>
                                    <div class="d-inline-flex">
                                        <a href="{{ route('camp-benefits.edit', $benefit->id) }}"
                                            class="btn btn-warning btn-sm mx-2"><i class="far fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteCampBenefits"><i class="far fa-trash-alt"></i></button>
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

    <!-- Create Camp Benefits Modal-->
    <div class="modal fade" id="createCampBenefitsModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabelCampBenefits" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelCampBenefits">Create Camp Amerta</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('camp-benefits.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <select class="form-select form-control" name="camp_id" aria-label="Default select example">
                                <option selected disabled>Select your camps</option>
                                @foreach ($camps as $camp)
                                    <option value="{{ $camp->id }}">{{ $camp->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name Benefits</label>
                            <input type="text" name="name" class="form-control" id="name"
                                aria-describedby="emailHelp" placeholder="Your Name Benefit">
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

    <!-- Delete Camp Benefit Modal-->
    <div class="modal fade" id="deleteCampBenefits" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabelCampBenefits" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelCampBenefits">Delete List {{ $campBenefits->title }}
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @isset($benefit)
                    <div class="modal-body">
                        <p>Are you sure want to delete this camp {{ $benefit->title }}?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('camp-benefits.destroy', $benefit->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-primary" type="submit">Delete</button>
                        </form>
                    </div>
                @endisset
            </div>
        </div>
    </div>
@endsection
