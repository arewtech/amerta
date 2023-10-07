@extends('layouts.admin')
@section('title', '| Update Camp Benefits')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Checkout User {{ $checkout->user->name }}</h1>
    </div>

    <!-- Content Row -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Checkout</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('checkouts.update', $checkout->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input style="background-color: #eaecf4; pointer-events: none" type="text" name="name"
                        value="{{ $checkout->user->name }}" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Your Name Benefit">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title Camp</label>
                    <input style="background-color: #eaecf4; pointer-events: none" type="text" name="title"
                        value="{{ $checkout->camp->title }}" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Your Name Benefit">
                </div>
                <div class="mb-3">
                    <label for="select" class="form-label">Update Payment</label>
                    <select class="form-select form-control" name="is_paid" aria-label="Default select example">
                        <option selected disabled>Select your payment</option>
                        <option {{ $checkout->is_paid == 0 ? 'selected' : '' }} value="0">
                            Pending Payment</option>
                        <option {{ $checkout->is_paid == 1 ? 'selected' : '' }} value="1">
                            Success Payment</option>
                    </select>
                </div>
                <a href="{{ route('checkouts.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
                <button type="submit" class="btn btn-warning btn-sm">Edit</button>
            </form>
        </div>
    </div>
@endsection
