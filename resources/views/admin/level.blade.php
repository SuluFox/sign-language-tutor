@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 text-center">
                <h4 style="opacity: 70%; display:flex;">Levels</h4>
            </div>
        </div>
        <br>
        <div class="row">
          
            <div class="col-md-3 mb-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addLevelModal">
                    Add Level
                </button>
            </div>
        </div>
        <div class="row">
            @foreach ($levels as $level)
                 <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <h4 class="card-title text-center">{{$level->name}}</h4>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{route('level.category',$level->id)}}" class="btn btn-primary">Category</a>
                        <a href="{{ route('level.delete', $level->id) }}" onclick="confirm('You are about to delete a level')" class="btn btn-danger">Delete</a>

                    </div>
                </div>
            </div>
            @endforeach
           
            {{-- <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <h4 class="card-title text-center">Level 2</h4>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <button class="btn btn-primary">View</button>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div> --}}
        </div>

    </div>


    <!-- Bootstrap Modal for Adding a Level -->
    <div class="modal fade" id="addLevelModal" tabindex="-1" role="dialog" aria-labelledby="addLevelModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLevelModalLabel">Add Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('level.add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Input field for level name -->
                        <div class="mb-3">
                            <label for="levelName" class="form-label">Level Name</label>
                            <input type="text" class="form-control" id="levelName" name="levelName" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Level</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
