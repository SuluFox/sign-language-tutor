@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="my-wrapper">
                <div class="welcome-box">
                    <h3>A Step in the right Direction<span style="color: rgb(52, 239, 176);">Select a Category</span></h3>
                </div>
            </div>
        

            @foreach ($level->categories as $category)
                <div class=" card" style="width: 18rem;">
                    {{-- <img src="levels.html" class="card-img-top"> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{$category->name}}</h5>
                        <p class="card-text">Start Little, Then Up Scale 😅 <br> <br> </p>
                        <a href="{{route('user.contents',$category->id)}}" class="btn btn-primary">Lets Go!!!</a>
                    </div>
                </div>
            @endforeach

            {{-- <div class="card" style="width: 18rem;">
                <img src="levels.html" class="card-img-top">
                <div class="card-body disabled">
                    <h5 class="card-title">Words</h5>
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
