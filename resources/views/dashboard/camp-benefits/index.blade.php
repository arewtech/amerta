@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Camp Benefits</h1>
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
                            <th>Title Camps</th>
                            <th>Min Camp Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($benefits as $benefit)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $benefit->title }}</td>
                                <td>
                                    Punya 4 benefits jika ingin camp active</td>
                                {{-- <td>
                                    @if ($benefit->benefits->count() == 0)
                                        <span style='font-size: 13px;'
                                            class='badge rounded-pill px-2 text-white bg-danger'>inactive</span>
                                    @else
                                        <span style='font-size: 13px;'
                                            class='badge rounded-pill px-2 text-white bg-success'>active</span>
                                    @endif
                                </td> --}}
                                <td>
                                    <div class="d-inline-flex align-items-center">
                                        <a href="{{ route('camp-benefits.show', $benefit->id) }}"
                                            class="btn btn-sm mr-4 btn-primary position-relative">
                                            Detail
                                            @if ($benefit->benefits->count() == 4)
                                                <span
                                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                                    {{ $benefit->benefits->count() }}
                                                    <span class="visually-hidden"></span>
                                                </span>
                                            @else
                                                <span
                                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                    {{ $benefit->benefits->count() }}
                                                    <span class="visually-hidden"></span>
                                                </span>
                                            @endif
                                        </a>
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
@endsection
