@extends('layouts.admin')
@section('title', '| Checkouts')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Table Checkouts : {{ $checkouts->count() }}</h1>
        <form action="" class="d-flex" role="search" method="get">
            <select class="form-select form-control mr-2" name="paid" aria-label="Default select example">
                <option selected disabled>Filter by paid</option>
                <option value="0">Payment Pending</option>
                <option value="1">Payment Success</option>
                {{-- <option value="3">Three</option> --}}
            </select>
            <input class="form-control mr-2" type="search" autofocus value="{{ request()->q }}" placeholder="Search"
                aria-label="Search" name="q">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
    </div>
    <p>Checkout terbaru masuk pada hari<span style="font-weight: 700"> {{ $lastCheckout ?? '-' }} </span></p>

    <!-- Content Row -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Checkout laraList</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th>Title Camp</th>
                            <th class="text-center">Tanggal Checkout</th>
                            <th>Price</th>
                            <th>Status</th>
                            {{-- <th>Total</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($checkouts as $checkout)
                            <tr>
                                <td class="text-center">
                                    {{ $loop->iteration + $checkouts->perPage() * ($checkouts->currentPage() - 1) }}
                                </td>
                                <td>
                                    <div class='position-relative'>
                                        {{ $checkout->user->name }}
                                        @if ($checkout->status == 'on going')
                                            <span style='left: -10px;'
                                                class="position-absolute top-0 translate-middle p-1 bg-warning border border-light rounded-circle">
                                                <span class="visually-hidden"></span>
                                            </span>
                                        @else
                                            <span style='left: -10px;'
                                                class="position-absolute top-0 translate-middle p-1 bg-success border border-light rounded-circle">
                                                <span class="visually-hidden"></span>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $checkout->camp->title }}</td>
                                <td class="text-center">{{ $checkout->created_at->translatedFormat('d/m/Y') }}</td>
                                <td>
                                    <div class='position-relative'>
                                        Rp. @currency($checkout->discount === null ? $checkout->camp->price : $checkout->total)
                                        @if ($checkout->discount != null)
                                            <span style='font-size: 10px;'
                                                class="position-absolute text-white top-0 start-100 translate-middle badge rounded-pill bg-success">
                                                {{ $checkout->discount->percentage }}%
                                            </span>
                                        @elseif($checkout->discount_percentage != null)
                                            <span style='font-size: 10px;'
                                                class="position-absolute text-white top-0 start-100 translate-middle badge rounded-pill bg-success">
                                                {{ $checkout->discount_percentage }}%
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                {{-- <td>{{ $checkout->cvc }}</td> --}}
                                <td>
                                    @if ($checkout->is_paid !== 0)
                                        <span style='font-size: 13px;'
                                            class='badge rounded-pill px-2 text-white bg-success'>Success Payment</span>
                                    @else
                                        <span style='font-size: 13px;'
                                            class='badge rounded-pill px-2 text-white bg-warning'>Pending Payment</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-inline-flex">
                                        <a href="{{ route('checkouts.show', $checkout->id) }}"
                                            class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('checkouts.edit', $checkout->id) }}"
                                            class="btn btn-warning btn-sm mx-1"><i class="far fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteCheckout{{ $checkout->id }}"><i
                                                class="far fa-trash-alt"></i></button>

                                        <!-- Delete Camp Benefit Modal-->
                                        <div class="modal fade" id="deleteCheckout{{ $checkout->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabelCampBenefits"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabelCampBenefits">Delete
                                                            Checkout </h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Apakah anda yakin ingin menghapus checkout
                                                            <b>{{ $checkout->user->name }}</b> dengan camp
                                                            <b>{{ $checkout->camp->title }}</b>?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary btn-sm" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('checkouts.destroy', $checkout->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm"
                                                                type="submit">Delete</button>
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
                                <td colspan="8" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class='px-4 mt-2'>{{ $checkouts->links() }}</div>
        </div>
    </div>

    <!-- Delete Camp Modal-->
    {{-- <div class="modal fade" id="deleteCheckout" tabindex="-1" role="dialog" aria-labelledby="modalCheckout"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCheckout">Delete Checkout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this checkout
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('checkouts.destroy', $checkout->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
