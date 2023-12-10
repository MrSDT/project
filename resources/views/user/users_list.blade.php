@extends('user.master')

@section('title')
    User | Users List
@endsection

@section('content2')

    <div class="col-md-12">
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
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number Verified</th>
                <th scope="col">User Group</th>
                <th scope="col">Online Status</th>
                <th scope="col">Registered</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    <a href="{{route('user.user_profile', $user->id)}}">
                    {{$user->firstName}} {{$user->lastName}}
                    </a>
                </td>
                <td>
                    {{$user->email}}
                </td>

                <td>
                    <span class="badge text-bg-warning">{{optional($user->kyc)->verified ? 'Verified' : 'Not Verified'}}</span>
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
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
