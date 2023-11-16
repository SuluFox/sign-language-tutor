@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Content Page</h4>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 mb-3">
                <button type="button" class="btn btn-dark" onclick="history.back()">
                    Back
                </button>
            </div>
            <div class="col-md-3 mb-3 ms-auto">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addContentModal">
                    Add Content
                </button>
            </div>


        </div>

        <div class="row row-space">
            @foreach ($category->contents as $content)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 20rem;">
                        <img src="{{ route('storage.content.show', ['filename' => $content->image_url]) }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $content->name }}</h5>
                            <p class="card-text">{{ $content->description }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#editContentModal" data-content-id="{{ $content->id }}"
                                data-content-name="{{ $content->name }}"
                                data-content-description="{{ $content->description }}"
                                data-content-image="{{ route('storage.content.show', ['filename' => $content->image_url]) }}">
                                Edit
                            </button>
                            <a href="{{route('content.delete',$content->id)}}" onclick="confirm('You are about to delete a content')" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach

            <style>
                .row-space {
                    margin-right: 50px;
                    padding-left: 80px;
                    justify-content: space-between;

                }
            </style>

        </div>

    </div>
    <!-- Bootstrap Modal for Adding a Level -->
    <div class="modal fade" id="addContentModal" tabindex="-1" role="dialog" aria-labelledby="addContentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addContentModalLabel">Add Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('content.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <!-- Input field for image -->
                        <div class="mb-3">
                            <label for="levelImage" class="form-label">Level Image</label> <br>
                            <!-- Image previewer -->
                            <img id="imagePreview" class="img-fluid mt-2" style="max-height: 200px;" alt="Image Preview">
                            <input type="file" class="form-control" id="levelImage" name="image" accept="image/*">

                        </div>


                        <!-- Input field for level name -->
                        <div class="mb-3">
                            <label for="levelName" class="form-label">Level Name</label>
                            <input type="text" class="form-control" id="levelName" name="name" required>
                        </div>

                        <!-- Input field for description -->
                        <div class="mb-3">
                            <label for="levelDescription" class="form-label">Level Description</label>
                            <textarea class="form-control" id="levelDescription" name="description" rows="4" required></textarea>
                        </div>

                        <!-- Input field for level owner name -->
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="ownerName" name="category"
                                value="{{ $category->id }}">
                        </div>
                    </div>

                    <!-- JavaScript for image preview -->
                    <script>
                        document.getElementById('levelImage').addEventListener('change', function(event) {
                            let preview = document.getElementById('imagePreview');
                            let file = event.target.files[0];
                            let reader = new FileReader();

                            reader.onload = function() {
                                preview.src = reader.result;
                            };

                            if (file) {
                                reader.readAsDataURL(file);
                            }
                        });
                    </script>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Level</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="modal fade" id="editContentModal" tabindex="-1" role="dialog" aria-labelledby="editContentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addContentModalLabel">Edit Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('content.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Use the correct HTTP method for updating --}}

                    <div class="modal-body">
                        <!-- Input field for image -->
                        <div class="mb-3">
                            <label for="editLevelImage" class="form-label">Level Image</label><br>
                            <!-- Image previewer -->
                            <img id="editImagePreview" class="img-fluid mt-2" style="max-height: 200px;"
                                alt="Image Preview">
                            <input type="file" class="form-control" id="editLevelImage" name="image"
                                accept="image/*">
                        </div>

                        <!-- Input field for level name -->
                        <div class="mb-3">
                            <label for="editLevelName" class="form-label">Level Name</label>
                            <input type="text" class="form-control" id="editLevelName" name="name" required>
                        </div>

                        <!-- Input field for description -->
                        <div class="mb-3">
                            <label for="editLevelDescription" class="form-label">Level Description</label>
                            <textarea class="form-control" id="editLevelDescription" name="description" rows="4"></textarea>
                        </div>

                        <!-- Input field for content ID -->
                        <input type="hidden" id="editContentId" name="content_id" value="">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- JavaScript for image preview -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editModal = document.getElementById('editContentModal');

            // Attach click event to each edit button
            var editButtons = document.querySelectorAll('.btn-primary[data-toggle="modal"]');
            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var contentId = this.getAttribute('data-content-id');
                    var contentName = this.getAttribute('data-content-name');
                    var contentDescription = this.getAttribute('data-content-description');
                    var contentImage = this.getAttribute('data-content-image');

                    // Set values in the modal
                    editModal.querySelector('#editContentId').value = contentId;
                    editModal.querySelector('#editLevelName').value = contentName;
                    editModal.querySelector('#editLevelDescription').value = contentDescription;
                    editModal.querySelector('#editImagePreview').src = contentImage;
                });
            });
        });
    </script>

    <script>

        document.getElementById('levelImage').addEventListener('change', function(event) {
            let preview = document.getElementById('imagePreview');
            let file = event.target.files[0];
            let reader = new FileReader();

            reader.onload = function() {
                preview.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
