@extends('user.master')

@section('title')
    Main Page | Index
@endsection

@section('content')

    <div class="card">
        <div class="card-header text-center">
            <h2>Welcome to Your App</h2>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                <p>Choose an option:</p>
            </div>

            <div class="text-center">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg mr-3">Login</a>
                <a href="{{ route('register') }}" class="btn btn-success btn-lg">Register</a>
            </div>
        </div>
    </div>


@endsection
