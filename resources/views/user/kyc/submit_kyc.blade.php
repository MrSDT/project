@extends('user.master')

@section('title')
    KYC Page | Submit KYC
@endsection

@section('content')

    <div class="card">
        <div class="card-header text-center">
            <h2>Submit KYC</h2>
        </div>
        <form class="m-3" action="{{route('users.store_kyc')}}" method="post">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName"
                       placeholder="Your Full Name" value="{{$user->firstName}} {{$user->lastName}}"
                       name="fullName">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Your Email Address" value="{{$user->email}}"
                       name="email">
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" placeholder="Your Phone Number"
                       value="{{$user->phoneNumber}}"  name="phoneNumber">
            </div>
            <div class="form-group">
                <label for="homeAddress">Home Address</label>
                <input type="text" class="form-control" id="homeAddress" placeholder="Enter Home Address"
                       name="homeAddress" value="123 Blv 19 Ave New York City">
            </div>
            <div class="form-group">
                <label for="dateOfBirth">Date Of Birth</label>
                <input type="date" class="form-control" id="dateOfBirth" placeholder="Date Of Birth"
                       name="dateOfBirth">
            </div>
            <div class="form-group">
                <label for="documentImage_path">Upload Document</label>
                <input type="file" accept="image/*" class="form-control" id="documentImage_path" placeholder="Choose Document"
                       name="documentImage_path">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
