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
                        <img width="200px" height="200px" src="{{ asset('documents/default.JPEG')}}">
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
                        @if($kycDetails->verified == 0)
                        <form action="{{route('admin.kyc_update', $kycDetails->id)}}" method="post">
                            @csrf
                            @method('POST')
                            <button class="badge text-bg-success">Verify</button>
                        </form>
                        @else
                        <form action="{{route('admin.kyc_update', $kycDetails->id)}}" method="post">
                            @csrf
                            @method('POST')
                            <button class="badge text-bg-warning">pending</button>
                        </form>
                        @endif
                        <form action="{{route('admin.kyc_update', $kycDetails->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button class="badge text-bg-danger">Delete KYC</button>
                        </form>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
