@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 style="opacity: 70%">Dashboard</h4>
            </div>
        </div>
        @php
            $level = App\Models\Level::all()->count();
            $users = App\Models\User::where('id', '!=', 1)->count();

        @endphp
        <div class="row row-center">
            <div class="col-md-6 mb-3">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body text-center py-5"><h1 style="color: #fff">{{$level}}</h1></div>
                    <div class="card-footer d-flex">
                        Number of levels
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body text-center py-5"><h1 style="color: #fff">{{$users}}</h1></div>
                    <div class="card-footer d-flex">
                        Number of users
                    </div>
                </div>
            </div>

        </div>
        <style>
            .row-center{
                margin-top: 30px;
                
            }
        </style>


    </div>
@endsection
