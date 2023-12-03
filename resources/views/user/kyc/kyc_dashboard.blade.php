@extends('user.master')

@section('title')
    KYC Page | Dashboard
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-danger">

            {{ session('message') }}

        </div>
    @endif
    <div class="card">
        <div class="card-header text-center">
            <h2>Your KYC</h2>
        </div>

            @if($hasSubmittedKYC and $verifiedkyc == 0)
            <!--KYC Not Verified Alert-->
            <div class="alert alert-warning m-2" role="alert">
                Your KYC Has Not Been Verified Yet
            </div>
            @elseif($verifiedkyc == 1)
            <!-- KYC Submitted Alert -->
            <div class="card-body">
                <div class="alert alert-success m-2" role="alert">
                    Your KYC Has Been Verified
                </div>
                @else
            <!--KYC Not Submitted Alert-->
            <div class="alert alert-danger m-2" role="alert">
                You did not Submit KYC Yet
            </div>

            <div class="text-center">
                <a href="{{ route('users.submit_kyc') }}" class="btn btn-primary btn-lg mr-3 mb-2">Submit KYC</a>
                @endif
            </div>
        </div>
    </div>


@endsection
