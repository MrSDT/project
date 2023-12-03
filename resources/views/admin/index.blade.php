@extends('admin.master')

@section('title')
    Admin Panel | Dashboard
@endsection

@section('location')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="col-md-9">
        <!-- Content -->
        <h2>Dashboard</h2>
        <p>Welcome to the admin panel!</p>
    </div>

@endsection
