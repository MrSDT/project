@extends('admin.master')

@section('title')
    Admin Panel | KYC
@endsection

@section('location')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">KYC</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="col-md-10">
        <!-- Content -->
        <h2>KYCs</h2>

        <table class="table table-striped table-hover mt-4 table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">KYC Status</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $kyc)
            <tr>
                <th scope="row">
                    {{$kyc->id}}
                </th>
                <td>
                    {{$kyc->fullName}}
                </td>
                <td>
                    {{$kyc->email}}
                </td>
                <td>
                    @if($kyc->verified == 0)
                        <span class="badge rounded-pill text-bg-danger">Not Verified</span>
                    @else
                        <span class="badge rounded-pill text-bg-success">Verified</span>
                    @endif
                </td>
                <td>
                    {{$kyc->created_at}}
                </td>
                <td>
                    <a href="{{ route('admin.kyc_review', $kyc->id) }}">Review</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
