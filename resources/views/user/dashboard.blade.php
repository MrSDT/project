@extends('user.master')

@section('title')

    User Profile

@endsection

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <!-- Profile Picture -->
                <img src="https://via.placeholder.com/150" alt="Profile Picture" class="img-fluid rounded-circle mb-3">
            </div>
            <div class="col-md-8">
                <!-- User Information -->
                <h2>User Profile</h2>
                <p><strong>Name:</strong> {{$userinfo->firstName}} {{$userinfo->lastName}}</p>
                <p><strong>Email:</strong> {{$userinfo->email}}</p>
                <p><strong>Phone Number:</strong> {{$userinfo->phoneNumber}}</p>
                <p><strong>User Group:</strong> {{$userinfo->userGroup}}</p>
                <p><strong>Online Status:</strong> {{$userinfo->onlineStatus}}</p>
                <p><strong>Phone Number Verified:</strong> {{$userinfo->phoneNumber_verified}}</p>
            </div>
        </div>
    </div>

@endsection
