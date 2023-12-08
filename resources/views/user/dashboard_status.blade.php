@extends('user.master')

@section('title')
    Dashboard | Status
@endsection

@section('content')

    <div class="card">
        <div class="card-header text-center">
            <h2>Your Status</h2>
        </div>
        <div class="card-body">

            <div class="text-center">

                <p>{{$userinfo->firstName}} {{$userinfo->lastName}}</p>
                <p>Total Number of Advertises: {{$ads->count()}}</p>
                <p>Number of Verified Advertises: {{$verifiedads}}</p>
                <p>Number of Not Verified Advertises: {{$notverifiedads}}</p>
                <p>Total Number of jobs: {{$jobs->count()}}</p>
                <p>Number of Verified jobs: {{$verifiedjobs}}</p>
                <p>Number of Not Verified jobs: {{$notverifiedjobs}}</p>
                <p>KYC Status:
                @if($verifiedkyc)
                        <span class="badge text-bg-success">Verified</span>
                    @else
                        <span class="badge text-bg-warning">Not Verified</span>
                @endif
                </p>

            </div>

        </div>
    </div>


@endsection
