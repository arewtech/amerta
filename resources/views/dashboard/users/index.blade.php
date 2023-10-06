@extends('layouts.admin')
@section('title', '| Checkouts')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Table Users : {{ $users->count() }}</h1>
    </div>
    <!-- Content Row -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">Occupation</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->occupation == null)
                                        <span class='text-center d-block'>-</span>
                                    @else
                                        <span class='text-center d-block'>{{ $user->occupation }}</span>
                                    @endif
                                </td>
                                <td class='text-center'>
                                    @if ($user->is_admin !== 'admin')
                                        <span style='font-size: 13px;'
                                            class='badge rounded-pill px-2 text-white bg-primary'>user</span>
                                    @else
                                        <span style='font-size: 13px;'
                                            class='badge rounded-pill px-2 text-white bg-success'>admin</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="#" class="btn btn-info btn-sm"><i class="far fa-eye"></i></a>
                                        <a href="#" class="btn btn-warning btn-sm mx-1"><i
                                                class="far fa-edit"></i></a>
                                        <form
                                            onsubmit="return confirm('Apakah anda yakin ingin menghapus user {{ $user->name }}')"
                                            action="#" method="post">
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
