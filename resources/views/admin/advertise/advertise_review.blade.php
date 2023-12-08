@extends('admin.master')

@section('title')
    Admin Panel | Review {{$advertise->title}}
@endsection

@section('location')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.advertises')}}">Advertise List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Review {{$advertise->title}}</li>
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
                <th scope="col">Advertise ID</th>
                <th scope="col">Advertise Name</th>
                <th scope="col">Author</th>
                <th scope="col">Description</th>
                <th scope="col">Advertise Image</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Price</th>
                <th scope="col">Category Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                <th scope="col">KYC Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{$advertise->id}}</th>
                <td>{{$advertise->title}}</td>
                <td>{{$advertise->user->firstName}} {{$advertise->user->lastName}}</td>
                <td>{{$advertise->description}}</td>
                <td>
                <img width="150px" height="150px" src="{{asset('advertiseImages/'.$advertise->advertiseImage_path)}}">
                </td>
                <td>{{$advertise->phoneNumber}}</td>
                <td>{{$advertise->email}}</td>
                <td>{{$advertise->startingPrice}}</td>
                <td>{{$advertise->categoryName}}</td>
                <td>
                    @if($advertise->verified == 0)
                        <span class="badge text-bg-warning">Pending</span>
                    @else
                    <span class="badge text-bg-primary">Verified</span>

                    @endif
                </td>
                <td>
                    @if($advertise->verified == 0)
                        <form action="{{route('admin.advertise_update', $advertise->id)}}" method="post">
                            @csrf
                            @method('POST')
                            <button class="badge text-bg-success">Make Verify</button>
                        </form>
                    @else
                        <form action="{{route('admin.advertise_update', $advertise->id)}}" method="post">
                            @csrf
                            @method('POST')
                            <button class="badge text-bg-warning">Make Pending</button>
                        </form>
                    @endif
                    <form action="{{route('admin.advertise_update', $advertise->id)}}" method="POST">
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
