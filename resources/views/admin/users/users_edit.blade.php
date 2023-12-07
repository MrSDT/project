@extends('admin.master')

@section('title')
    Admin Panel | Users
@endsection

@section('location')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{$user->firstName}} {{$user->lastName}}</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="col-md-10">
        <!-- Content -->
        @if(session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif
        <h2>Users</h2>

        <table class="table table-striped table-hover mt-4 table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Email Verified</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Phone Number Verified</th>
                <th scope="col">User Group</th>
                <th scope="col">Online Status</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">
                    {{$user->id}}
                </th>
                <td>
                    {{$user->firstName}} {{$user->lastName}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    @if($user->email_verified_at == NULL)
                        <span class="badge rounded-pill text-bg-danger">Not Verified</span>
                    @else
                    {{$user->email_verified_at}}
                    @endif
                </td>
                <td>
                    {{$user->phoneNumber}}
                </td>
                <td>
                    @if($user->phoneNumber_verified == 0)
                        <span class="badge rounded-pill text-bg-danger">Not Verified</span>
                    @else
                        <span class="badge rounded-pill text-bg-success">Verified</span>
                    @endif
                </td>
                <td>
                    {{$user->userGroup}}
                </td>
                <td>
                    {{$user->onlineStatus}}
                </td>
                <td>
                    {{$user->created_at}}
                </td>
                <td>
                    <button class="btn btn-info text-white">Update User Group</button>
                    @if($user->phoneNumber_verified == 0)
                        <form action="{{route('admin.user_update', $user->id)}}" method="post">
                            @csrf
                            @method('POST')
                            <button class="badge text-bg-success">Verify Phone Number</button>
                        </form>
                    @else
                        <form action="{{route('admin.user_update', $user->id)}}" method="post">
                            @csrf
                            @method('POST')
                            <button class="badge text-bg-warning">Make Pending</button>
                        </form>
                    @endif
                    <br/>
                        @if($user->email_verified_at == NULL)
                            <form action="{{route('verification.send')}}" method="post">
                                @csrf
                                @method('POST')
                                <button class="badge text-bg-primary">Send Email Verification</button>
                            </form>
                        @endif
                        <br/>
                    <form action="{{route('admin.user_update', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
