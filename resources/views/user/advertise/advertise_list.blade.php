@extends('user.master')

@section('title')
    Advertise | List
@endsection

@section('content')


    <div class="container text-center">
        <a href="{{route('user.advertises_submit')}}" class="btn btn-primary text-white mb-3">Submit Advertise</a>

        <div class="row">


            <div class="card col p-3 mr-3" style="width: 18rem;">
                <img src="{{asset('/documents/default.jpeg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>


            <div class="card col p-3" style="width: 18rem;">
                <img src="{{asset('/documents/default.jpeg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>



        </div>


    </div>








@endsection
