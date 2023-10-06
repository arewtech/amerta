@extends('layouts.admin')
@section('title', '| Update Discount')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update {{ $discount->name }}</h1>
    </div>

    <!-- Content Row -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('discounts.update', $discount->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name Discount</label>
                    <input type="text" name="name" value="{{ $discount->name }}" class="form-control" id="name"
                        placeholder="Name Discount">
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Code</label>
                    <input type="text" name="code" value="{{ $discount->code }}" class="form-control" id="code"
                        placeholder="Code Discount">
                </div>
                <div class="mb-3">
                    <label for="percentage" class="form-label">Percentage</label>
                    <input type="number" max="100" name="percentage" value="{{ $discount->percentage }}"
                        class="form-control" id="percentage" placeholder="Percentage">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" value="{{ $discount->description }}" class="form-control"
                        id="description" placeholder="Description">
                </div>
                <div class="d-inline-flex">
                    <a href="{{ route('discounts.index') }}" class="btn btn-secondary btn-sm mr-1" type="button"
                        data-dismiss="modal">Cancel</a>
                    <button class="btn btn-warning btn-sm" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
