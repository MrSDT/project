@extends('admin.master')

@section('title')
    Admin Panel | Category List
@endsection

@section('location')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Category List</li>
        </ol>
    </nav>

@endsection
@section('content')

    <div class="col-md-9">
        <!-- Content -->
        @if(session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif
        <table class="table table-striped table-hover mt-4 table-bordered">
            <thead>
            <tr>
                <th scope="col">Category ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($category as $cat)
            <tr>
                <th scope="row">{{$cat->id}}</th>
                <td>{{$cat->categoryName}}</td>
                <td>
                    <a class="badge text-bg-primary" href="{{ route('admin.categories_edit', $cat->id) }}">Edit Category</a>
                    <form action="{{route('admin.categories_delete', $cat->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="badge text-bg-danger">Delete Category</button>
                    </form>
                </td>
            </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@endsection
