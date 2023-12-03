@extends('admin.master')

@section('title')
    Admin Panel | Review KYC
@endsection

@section('location')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Review KYC ID {{$kycDetails->id}}</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="col-md-10">
        <!-- Content -->
        <h2>Review KYC {{$kycDetails->id}}</h2>

        <table class="table table-striped table-success table-hover mt-4 table-bordered">
            <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Home Address</th>
                <th scope="col">Date Of Birth</th>
                <th scope="col">Document Image</th>
                <th scope="col">KYC Status</th>
                <th scope="col">Created At</th>
                <th scope="col">Update Status</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">
                        {{$kycDetails->userid}}
                    </th>
                    <td>
                        {{$kycDetails->fullName}}
                    </td>
                    <td>
                        {{$kycDetails->email}}
                    </td>
                    <td>
                        {{$kycDetails->phoneNumber}}
                    </td>
                    <td>
                        {{$kycDetails->homeAddress}}
                    </td>
                    <td>
                        {{$kycDetails->dateOfBirth}}
                    </td>
                    <td>
                        <img src="{{$kycDetails->documentImage_path}}">
                    </td>
                    <td>
                        @if($kycDetails->verified == 0)
                            <span class="badge rounded-pill text-bg-danger">Not Verified</span>
                        @else
                            <span class="badge rounded-pill text-bg-success">Verified</span>
                        @endif
                    </td>
                    <td>
                        {{$kycDetails->created_at}}
                    </td>
                    <td>
                        <span class="badge text-bg-success">Verified</span>
                        <span class="badge text-bg-warning">Not Verified</span>
                        <span class="badge text-bg-danger">Delete KYC</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
