@extends('layouts.admin')
@section('title', '| Update Camp Benefits')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update List Benefits {{ $benefits[0]->title }}</h1>
    </div>

    <!-- Content Row -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('camp-benefits.update', $campBenefit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <select class="form-select form-control" name="camp_id" aria-label="Default select example">
                        <option selected disabled>Select your camps</option>
                        @foreach ($benefits as $camps)
                            <option {{ $campBenefit->camp_id == $camps->id ? 'selected' : '' }} value="{{ $camps->id }}">
                                {{ $camps->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name Benefits</label>
                    <input type="text" name="name" value="{{ $campBenefit->name }}" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Name Benefit">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
