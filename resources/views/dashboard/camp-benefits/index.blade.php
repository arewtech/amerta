@extends('layouts.admin')
@section('title', '| Camp Benefits')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">
            Benefits {{ $camp->title }}
        </h1>
        <button type="button" class="d-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#createCampBenefit"><i class="fas fa-plus-circle"></i></button>
    </div>
    <p><span style="font-weight: 700">PS :</span> Min 4 - 8 benefits untuk di tampilkan di website!</p>
    <!-- Content Row -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Camp Benefit List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Title Camp Benefits</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($benefits as $benefit)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center" class='text-capitalize'>{{ $benefit->name }}</td>
                                <td class="text-center">
                                    <span style='font-size: 13px;'
                                        class='badge rounded-pill px-2 text-white {{ $benefit->camp->status == 'active' ? 'bg-success' : 'bg-danger' }} '>
                                        {{ $benefit->camp->status == 'active' ? 'active' : 'inactive' }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="d-inline-flex align-items-center">
                                        <button type="button" data-toggle="modal"
                                            data-target="#editCampBenefit{{ $benefit->id }}"
                                            class="btn btn-warning btn-sm mr-1"><i class="far fa-edit"></i>
                                        </button>
                                        <button type="button" data-toggle="modal"
                                            data-target="#deleteCampBenefit{{ $benefit->id }}"
                                            class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                        <div class="modal fade" id="deleteCampBenefit{{ $benefit->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modalCamp" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalCamp">Delete Camp Benefit</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <p>Apakah anda yakin ingin menghapus benefit
                                                            <b>{{ $benefit->name }}</b>?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary btn-sm" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form
                                                            action="{{ route('camp-benefits.destroy', [$camp, $benefit->id]) }}"
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

                                    @include('includes.modal.modal-edit-benefit', [$camp, $benefit])
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
    <div class="modal fade" id="createCampBenefit" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabelCampBenefits" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelCampBenefits">Create Camp Benefit</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('camp-benefits.store', $camp) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        @foreach ($errors->all() as $item)
                            {{ $item }}
                        @endforeach
                        <div class="mb-3">
                            <label for="title" class="form-label">Name Camp Benefit</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="Camp benefit..">
                            @error('name')
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
                var myModal = new bootstrap.Modal(document.getElementById('createCampBenefit'), {
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
