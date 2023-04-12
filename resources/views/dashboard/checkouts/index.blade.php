@extends('layouts.admin')
@section('title', '| Checkouts')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Table Checkouts : {{ $checkouts->count() }}</h1>
        <form action="{{ route('checkouts.search') }}" class="d-flex" role="search" method="get">
            <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search" name="q">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
    </div>
    <p>Checkout terbaru masuk pada tanggal<span style="font-weight: 700"> ( --- ) </span></p>

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
                            <th>Name</th>
                            <th>Title Camp</th>
                            <th>Tanggal Checkout</th>
                            <th>Price</th>
                            <th>Status</th>
                            {{-- <th>Total</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($checkouts as $checkout)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $checkout->user->name }}</td>
                                <td>{{ $checkout->camp->title }}</td>
                                <td>{{ $checkout->created_at->format('D, Y-m') }}</td>
                                <td>
                                    <div class='position-relative'>
                                        Rp. @currency($checkout->camp->price)
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
                                {{-- <td>
                                    @if ($checkout->discount != null)
                                        Rp. @currency($checkout->total)
                                    @elseif($checkout->discount_percentage != null)
                                        Rp. @currency($checkout->total)
                                    @else
                                        Rp. @currency($checkout->camp->price)
                                    @endif
                                </td> --}}
                                <td>
                                    <div class="d-inline-flex">
                                        <a href="{{ route('checkouts.show', $checkout->id) }}"
                                            class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('checkouts.edit', $checkout->id) }}"
                                            class="btn btn-warning btn-sm mx-2"><i class="far fa-edit"></i></a>
                                        <form
                                            onsubmit="return confirm('Apakah anda yakin ingin menghapus checkout {{ $checkout->camp->title }}')"
                                            action="{{ route('checkouts.destroy', $checkout->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
                                        {{-- data-toggle="modal" data-target="#deleteCheckout" --}}
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
