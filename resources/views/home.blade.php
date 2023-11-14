@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="my-wrapper">
                <div class="welcome-box">
                    <h3>Welcome<span style="color: rgb(52, 239, 176);">Choose a level</span></h3>
                </div>
            </div>

            @foreach ($levels as $level)
                <div class="card" style="width: 18rem;">
                    {{-- <img src="levels.html" class="card-img-top"> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{$level->name}}</h5>
                        <p class="card-text">Begin your Journey into Dimensions of Communication <br> <br> </p>
                        <a href="{{route('user.category',$level->id)}}" class="btn btn-primary">Lets Go!!!</a>
                    </div>
                </div>
            @endforeach
            {{-- <div class="card" style="width: 18rem;">
                <img src="levels.html" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Beginner</h5>
                    <p class="card-text">Begin your Journey into Dimensions of Communication <br> <br> </p>
                    <a href="category.blade.php" class="btn btn-primary">Lets Go!!!</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="levels.html" class="card-img-top">
                <div class="card-body disabled">
                    <h5 class="card-title">Intermediate</h5>
                    <p class="card-text" style="color: #4f4f4f;">Comming Soon <br> <br> <br> <br> </p>
                    <a href="#" class="btn btn-primary disabled">Lets Go!!!</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="levels.html" class="card-img-top">
                <div class="card-body disabled">
                    <h5 class="card-title">Advanced</h5>
                    <p class="card-text" style="color: #4f4f4f;">Comming Soon <br> <br> <br> <br> </p>
                    <a href="#" class="btn btn-primary disabled">Lets Go!!!</a>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
