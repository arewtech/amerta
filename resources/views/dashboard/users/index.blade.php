@extends('layouts.admin')
@section('title', '| Checkouts')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Table Users : {{ $users->count() }}</h1>
        <button type="button" class="d-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#createUserModal"><i class="fas fa-plus-circle"></i></button>
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
                            <th class="text-center">Role</th>
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
                                    <span class='text-center d-block text-capitalize'>{{ $user->occupation ?? '-' }}</span>
                                </td>
                                <td class='text-center'>
                                    <span style='font-size: 13px;'
                                        class='badge rounded-pill px-2 text-white bg-primary'>{{ $user->is_admin }}</span>
                                </td>
                                <td class='text-center'>
                                    <span style='font-size: 13px;'
                                        class='badge rounded-pill px-2 text-white {{ $user->status == 'active' ? 'bg-success' : 'bg-danger' }}'>{{ $user->status }}</span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button type="button" data-toggle="modal"
                                            data-target="#showUser{{ $user->username }}" class="btn btn-info btn-sm"><i
                                                class="far fa-eye"></i>
                                        </button>

                                        @include('includes.modal.modal-detail-user', $user)

                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm mx-1"><i
                                                class="far fa-edit"></i></a>
                                        <button type="button" data-toggle="modal"
                                            data-target="#deleteUser{{ $user->id }}" class="btn btn-danger btn-sm"><i
                                                class="far fa-trash-alt"></i></button>
                                        <a href="#" class="btn btn-primary btn-sm mx-1 position-relative"><i
                                                class="fas fa-cart-arrow-down"></i>
                                            <span style="top: -8px"
                                                class="position-absolute start-100 translate-middle badge rounded-pill {{ $user->checkouts->count() > 0 ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $user->checkouts->count() }}
                                                <span class="visually-hidden"></span>
                                            </span>
                                        </a>
                                        <div class="modal fade" id="deleteUser{{ $user->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modalCamp" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalCamp">Delete User
                                                            {{ $user->name }}</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <p>Apakah anda yakin ingin menghapus user
                                                            <b>{{ $user->name }}</b>?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary btn-sm" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('users.destroy', $user) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm"
                                                                type="submit">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

    <!-- Create Camp Modal-->
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabelCampBenefits" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelCampBenefits">Create User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="Name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Username</label>
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror" id="username"
                                placeholder="Username">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Email</label>
                            <input type="text" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="Email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tagline" class="form-label">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Password">
                            @error('password')
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
                var myModal = new bootstrap.Modal(document.getElementById('createUserModal'), {
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
