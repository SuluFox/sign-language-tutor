@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="my-wrapper">
                <div class="welcome-box">
                    <h3>Welcome<span style="color: rgb(52, 239, 176);">{{ $category->name }} contents</span></h3>
                </div>
            </div>
        </div>

        <div class="container cards" style="background-color: rgba(0, 0, 0, 0.5);">
            @foreach ($category->contents as $content)
                <div class="card" style="width: 18rem;">
                    <img src="{{ route('storage.content.show', ['filename' => $content->image_url]) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3>{{ $content->name }}</h3>
                        <p class="card-text">{{ $content->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
