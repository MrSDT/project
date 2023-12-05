@extends('admin.master')

@section('title')
    Admin Panel | Advertise List
@endsection

@section('location')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Advertise List</li>
        </ol>
    </nav>

@endsection
@section('content')

    <div class="col-md-9">
        <!-- Content -->
        @if(session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif
        <table class="table table-striped table-hover mt-4 table-bordered">
            <thead>
            <tr>
                <th scope="col">Advertise ID</th>
                <th scope="col">Advertise Name</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($advertise as $ad)
            <tr>
                <th scope="row">{{$ad->id}}</th>
                <td>{{$ad->title}}</td>
                <td>{{$ad->user->firstName}} {{$ad->user->lastName}}</td>
                <td>
                    @if($ad->verified == 0)
                        <span class="badge text-bg-warning">Pending</span>
                    @else
                    <span class="badge text-bg-primary">Verified</span>

                    @endif
                </td>
                <td>
                    <a class="badge text-bg-primary" href="{{ route('admin.advertise_review', $ad->id) }}">Review Advertise</a>
                </td>
            </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@endsection
