@extends('admin.master')

@section('title')
    Admin Panel | Review {{$jobs->title}}
@endsection

@section('location')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.jobs')}}">Jobs List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Review {{$jobs->title}}</li>
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
                <th scope="col">Description</th>
                <th scope="col">Job Image</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Working Hours</th>
                <th scope="col">Category Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                <th scope="col">KYC Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{$jobs->id}}</th>
                <td>{{$jobs->title}}</td>
                <td>{{$jobs->user->firstName}} {{$jobs->user->lastName}}</td>
                <td>{{$jobs->description}}</td>
                <td>
                <img width="150px" height="150px" src="{{asset('jobImages/'.$jobs->jobImage_path)}}">
                </td>
                <td>{{$jobs->phoneNumber}}</td>
                <td>{{$jobs->email}}</td>
                <td>{{$jobs->workingHours}}</td>
                <td>{{$jobs->categoryName}}</td>
                <td>
                    @if($jobs->verified == 0)
                        <span class="badge text-bg-warning">Pending</span>
                    @else
                    <span class="badge text-bg-primary">Verified</span>

                    @endif
                </td>
                <td>
                    @if($jobs->verified == 0)
                        <form action="{{route('admin.jobs_update', $jobs->id)}}" method="post">
                            @csrf
                            @method('POST')
                            <button class="badge text-bg-success">Make Verify</button>
                        </form>
                    @else
                        <form action="{{route('admin.jobs_update', $jobs->id)}}" method="post">
                            @csrf
                            @method('POST')
                            <button class="badge text-bg-warning">Make Pending</button>
                        </form>
                    @endif
                    <form action="{{route('admin.jobs_update', $jobs->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="badge text-bg-danger">Delete Advertise</button>
                    </form>

                </td>
                <td>
                    @if($hasSubmittedKYC and $verifiedkyc)
                        <span class="badge text-bg-primary">Verified</span>
                    @else
                        <span class="badge text-bg-danger">Not Verified</span>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
