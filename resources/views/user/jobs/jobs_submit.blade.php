@extends('user.master')

@section('title')
    Jobs Page | Submit Job
@endsection

@section('content')

    <div class="card p-3">
        <div class="card-header text-center">
            <h2>Submit Job</h2>
        </div>
<form action="{{route('user.jobs_store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
        <select name="categoryName" class="form-select mt-3 mb-3" aria-label="categoryName">
            <option selected>Open this select menu</option>
            @foreach($category as $cat)
            <option value="{{$cat->categoryName}}">{{$cat->categoryName}}</option>
            @endforeach
        </select>

        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Write a Title Here">
        </div>

        <div class="form-group">
            <label for="jobImage_path">Upload Image</label>
            <input type="file" accept="image/*" class="form-control" id="jobImage_path" placeholder="Choose Image"
                   name="jobImage_path">
        </div>

        <div class="mb-3">
            <label for="phoneNumber" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Your Phone Number"
                   value="{{$user->phoneNumber}}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Your email address"
                   value="{{$user->email}}">
        </div>

        <div class="mb-3">
            <label for="workingHours" class="form-label">Working Hours</label>
            <input type="text" class="form-control" id="workingHours" name="workingHours" placeholder="09:00 AM to 10:00 PM">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>


@endsection
