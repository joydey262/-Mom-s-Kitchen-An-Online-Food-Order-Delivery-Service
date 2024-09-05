@extends('layouts.app')

@section('content')
    <!-- profile section starts -->
    <section class="profile-section section-b-space">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-12">
                    <div class="address-section bg-color h-100 mt-0">
                        <div class="title">
                            <div class="loader-line"></div>
                            <h3>Categories</h3>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="address-box white-bg new-address-box white-bg">
                                    <a href="#add-category" class="btn new-address-btn theme-outline rounded-2 mt-0"
                                        data-bs-toggle="modal">Add New Category</a>
                                </div>
                            </div>
                            @foreach($categories as $category)
                            <div class="col-md-6">
                                <div class="address-box white-bg">
                                    <div class="address-title">
                                        <div class="d-flex align-items-center gap-2">
                                            <h6>{{$category->name}} ({{$category->status}})</h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                        <a id="edit-category" data-id="{{$category->id}}" data-name="{{$category->name}}" data-status="{{$category->status}}" class="edit-btn">Edit</a>
                                        <a id="delete-category" data-id="{{$category->id}}" data-name="{{$category->name}}" class="edit-btn">Delete</a>
                                        </div>
                                    </div>
                                    <div class="address-details">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid icon" width="100" height="100" src="{{asset('/storage/category/'.$category->img)}}" alt="Category">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile section end -->

    <!-- add category modal starts -->
    <div class="modal profile-modal fade" id="add-category" aria-hidden="true" aria-labelledby="addCategoryModalToggle"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="addCategoryModalToggle">Add New Category</h1>
                </div>
                <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Enter your name" required>
                        </div>

                        @error('name')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="img" class="form-label">Image</label>
                            <input type="file" class="form-control" name="img" id="img" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        @error('status')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn theme-btn">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- add category modal end -->

    <!-- edit category modal starts -->
    <div class="modal profile-modal fade" id="edit-category-modal" aria-hidden="true" aria-labelledby="editCategoryModalToggle"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="editCategoryModalToggle">Edit Category</h1>
                </div>
                <form method="POST" action="{{ route('admin.categories.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="number" class="form-control d-none" id="edit-id" name="id">
                        <div class="form-group">
                            <label for="edit-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit-name" name="name" placeholder="Enter your name" required>
                        </div>

                        @error('name')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="img" class="form-label">Image</label>
                            <input type="file" class="form-control" name="img" id="img">
                        </div>

                        <div class="form-group mt-2">
                            <label for="edit-status" class="form-label">Status</label>
                            <select class="form-control" name="status" id="edit-status" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        @error('status')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn theme-btn">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit category modal end -->

    <!-- delete category modal starts -->
    <div class="modal address-details-modal fade" id="delete-category-modal" tabindex="-1" aria-labelledby="deleteCategoryModalToggle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteCategoryModalToggle"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure, You want to delete this category?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{route('admin.categories.index')}}" class="btn gray-btn mt-0" data-bs-dismiss="modal">CANCEL</a>
                    <a href="{{ route('admin.categories.delete') }}" onclick="event.preventDefault(); document.getElementById('delete-category-form').submit();" class="btn theme-btn mt-0">Delete</a>

                    <form id="delete-category-form" action="{{ route('admin.categories.delete') }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                        <input type="number" class="form-control" id="delete-id" name="id">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- delete category modal end -->

    @include('components.location-modal')
    @include('components.mobile-fix-menu')

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){   
                $('body').on('click','#edit-category', function(){
                    $('#edit-id').val($(this).attr('data-id'));
                    $('#edit-name').val($(this).attr('data-name'));
                    $('#edit-status').val($(this).attr('data-status'));
                    $('#edit-category-modal').modal('show');
                });

                $('body').on('click','#delete-category', function(){
                    $('#delete-id').val($(this).attr('data-id'));
                    $('#deleteCategoryModalToggle').text($(this).attr('data-name'));
                    $('#delete-category-modal').modal('show');
                });
            });
        </script>
    @endpush
@endsection

