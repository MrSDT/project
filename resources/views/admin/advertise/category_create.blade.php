@extends('admin.master')

@section('title')
    Admin Panel | Category List
@endsection

@section('location')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.categories')}}">Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Category</li>
        </ol>
    </nav>

@endsection
@section('content')

    <div class="col-md-9">
        <!-- Content -->
        <form action="{{route('admin.categories_store')}}" method="post">
            @csrf
            @method('POST')
        <div class="mb-3">
            <label for="categoryName" class="form-label">Create Category</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Category Name">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection
