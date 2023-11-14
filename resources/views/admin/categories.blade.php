@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4 style="opacity: 70%; display:flex">{{ $level->name }} Level Categories</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <button type="button" class="btn btn-dark" onclick="history.back()">
                    Back
                </button>
            </div>
            <div class="col-md-3 mb-3 ms-auto">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addCategoryModal">
                    Add Category
                </button>
            </div>
        </div>
        <br>
        <div class="row">
            @foreach ($level->categories as $category)
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <h4 class="card-title text-center">{{ $category->name }}</h4>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('contents', $category->id) }}" class="btn btn-primary">Contents</a>
                            {{-- <button href="#" class="btn btn-danger delete-button" data-toggle="modal"
                                data-target="#deleteModal1" data-item-id="{{ $category->id }}" data-droute="{{ route('category.delete', ':itemId') }}">
                                Delete
                            </button> --}}
                            <a href="{{ route('category.delete', $category->id) }}" onclick="confirm('You are about to delete a category')" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <!-- Bootstrap Modal for Adding a Level -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('category.add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Input field for level name -->
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="categoryName" name="CategoryName" required>
                            <input type="hidden" name="levelId" value="{{ $level->id }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteModal1" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel1">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteImageForm" action="#" method="POST">
                    @csrf
                   @method('DELETE')
                    <div class="modal-body">
                        Are you sure you want to delete this category?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="deleteImage1">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.delete-button').click(function() {
                var itemId = $(this).data('item-id');
                var modal = $('#deleteModal1');
                var routeName = $(this).data('droute');

                var actionURL = routeName.replace(':itemId', itemId);

                // Update the form's action attribute with the generated URL
                $('#deleteImageForm').attr('action', actionURL);

                // Update the modal content based on the image ID
                modal.find('.modal-body').html('Are you sure you want to delete this category?');

                // Update the 'data-image-id' attribute of the "Delete" button in the modal
                modal.find('#deleteImage1').data('item-id', itemId);
            });
        });
    </script>
@endsection
