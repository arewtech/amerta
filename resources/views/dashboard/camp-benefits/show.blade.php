@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table List Benefits ( {{ $campBenefits->title }} :
            {{ $campBenefits->benefits->count() }} )</h1>
        <a href="{{ route('camp-benefits.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Create camp benefits </a>
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
                                            class="btn btn-warning btn-sm mr-2">Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteCampBenefits">Delete</button>
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
