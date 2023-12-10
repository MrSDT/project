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
                <p><strong>Name:</strong> {{$user->firstName}} {{$user->lastName}}</p>
                <p><strong>Email:</strong> {{$user->email}}</p>
                <p><strong>Phone Number:</strong> {{$user->phoneNumber}}</p>
                <p><strong>User Group:</strong> {{$user->userGroup}}</p>
                <p><strong>Online Status:</strong> {{$user->onlineStatus}}</p>
                <p><strong>Phone Number Verified:</strong> {{$user->phoneNumber_verified}}</p>
{{--                <p><strong>Number of Advertises:</strong> {{$adcount}}</p>--}}
                <p><strong><a href="#">Send Message</a></strong></p>
            </div>
        </div>
    </div>

@endsection
