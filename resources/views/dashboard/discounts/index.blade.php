@extends('layouts.admin')
@section('title', '| Detail Camp Benefits')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Discounts</h1>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createDiscountCamps"><i
                class="fas fa-plus-circle"></i></button>
    </div>

    <!-- Content Row -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Discount List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Discount Name</th>
                            <th>Code</th>
                            <th>Percentage</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($discounts as $discount)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $discount->name }}</td>
                                <td>{{ $discount->code }}</td>
                                <td>{{ $discount->percentage }}%</td>
                                <td>{{ $discount->description }}</td>
                                <td>
                                    <div class="d-inline-flex">
                                        <a href="{{ route('discounts.edit', $discount->id) }}"
                                            class="btn btn-warning btn-sm mx-2"><i class="far fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteDiscount{{ $discount->id }}"><i
                                                class="far fa-trash-alt"></i></button>

                                        <!-- Delete Camp Benefit Modal-->
                                        <div class="modal fade" id="deleteDiscount{{ $discount->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabelCampBenefits"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabelCampBenefits">Delete
                                                            List {{ $discount->name }}
                                                        </h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure want to delete this discount {{ $discount->name }}?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('discounts.destroy', $discount->id) }}"
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
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Camp Benefits Modal-->
    <div class="modal fade" id="createDiscountCamps" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabelCampBenefits" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelCampBenefits">Create Camp Amerta</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('discounts.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name Discount</label>
                            <input type="text" name="name" class="form-control" id="name"
                                aria-describedby="emailHelp" placeholder="Name Discount">
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" name="code" class="form-control" id="code"
                                aria-describedby="emailHelp" placeholder="Code Discount">
                        </div>
                        <div class="mb-3">
                            <label for="percentage" class="form-label">Percentage</label>
                            <input type="number" max="100" name="percentage" class="form-control" id="percentage"
                                aria-describedby="emailHelp" placeholder="Percentage">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" id="description"
                                aria-describedby="emailHelp" placeholder="Description">
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

@endsection
