@extends('admin.master')

@section('title')
    Admin Panel | Jobs List
@endsection

@section('location')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jobs List</li>
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
                <th scope="col">Job ID</th>
                <th scope="col">Job Name</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($jobs as $job)
            <tr>
                <th scope="row">{{$job->id}}</th>
                <td>{{$job->title}}</td>
                <td>{{$job->user->firstName}} {{$job->user->lastName}}</td>
                <td>
                    @if($job->verified == 0)
                        <span class="badge text-bg-warning">Pending</span>
                    @else
                    <span class="badge text-bg-primary">Verified</span>

                    @endif
                </td>
                <td>
                    <a class="badge text-bg-primary" href="{{ route('admin.jobs_review', $job->id) }}">Review Job</a>
                </td>
            </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@endsection
