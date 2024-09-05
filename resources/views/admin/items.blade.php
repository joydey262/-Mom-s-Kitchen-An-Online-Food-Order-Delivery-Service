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
                            <h3>Items</h3>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="address-box white-bg new-address-box white-bg">
                                    <a href="#add-item" class="btn new-address-btn theme-outline rounded-2 mt-0"  data-bs-toggle="modal">Add New Item</a>
                                </div>
                            </div>
                            @foreach($items as $item)
                            <div class="col-md-6">
                                <div class="address-box white-bg">
                                    <div class="address-title">
                                        <div class="d-flex align-items-center gap-2">
                                            <h6>{{$item->name}} ({{$item->status}})</h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">

                                        <a id="edit-item" data-id="{{$item->id}}" data-name="{{$item->name}}" data-category="{{$item->category_id}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-desc="{{$item->desc}}" data-quantity="{{$item->quantity}}" data-stock="{{$item->stock}}" data-status="{{$item->status}}" data-package="{{$item->is_package}}" class="edit-btn">Edit</a>

                                        <a id="delete-item" data-id="{{$item->id}}" data-name="{{$item->name}}" class="edit-btn">Delete</a>
                                        </div>
                                    </div>
                                    <div class="address-details">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded icon w-full" src="{{asset('/storage/item/'.$item->img)}}" alt="Item">
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <h6>{{$item->price}} BDT</h6>
                                            <h6>{{$item->discount}}%</h6>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <p>{!!Str::limit($item->desc, 80, '...')!!}</p>
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

    <!-- add item modal starts -->
    <div class="modal profile-modal fade" id="add-item" aria-hidden="true" aria-labelledby="addItemModalToggle"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="addItemModalToggle">Add New Item</h1>
                </div>
                <form method="POST" action="{{ route('admin.items.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Enter item name" required>
                        </div>

                        @error('name')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control" name="category" id="category" required>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('category')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" min="1" step="1" id="quantity" name="quantity" value="{{old('quantity')}}" placeholder="Enter item quantity" required>
                        </div>

                        @error('quantity')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" min="1" step="1" id="stock" name="stock" value="{{old('stock')}}" placeholder="Enter item stock" required>
                        </div>

                        @error('stock')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" step="0.01" id="price" name="price" value="{{old('price')}}" placeholder="Enter item price" required>
                        </div>

                        @error('price')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="discount" class="form-label">Discount(%)</label>
                            <input type="number" class="form-control" id="discount" name="discount" value="{{old('discount')}}" placeholder="Enter item discount" required>
                        </div>

                        @error('discount')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="desc" class="form-label">Description</label>
                            <div id="editor"></div>
                            <textarea name="desc" id="desc" class="form-control d-none" placeholder="Enter item description" required></textarea>
                        </div>

                        @error('desc')
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

                        <div class="form-group mt-2">
                            <label for="package" class="form-label">Package</label>
                            <input type="checkbox" name="package" id="package">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn theme-btn">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- add item modal end -->

    <!-- edit item modal starts -->
    <div class="modal profile-modal fade" id="edit-item-modal" aria-hidden="true" aria-labelledby="editItemModalToggle"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="editItemModalToggle">Edit Item</h1>
                </div>
                <form method="POST" action="{{ route('admin.items.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="number" class="form-control d-none" id="edit-id" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit-name" name="name" value="{{old('name')}}" placeholder="Enter item name" required>
                        </div>

                        @error('name')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="edit-category" class="form-label">Category</label>
                            <select class="form-control" name="category" id="edit-category" required>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('category')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="edit-price" class="form-label">Price</label>
                            <input type="number" class="form-control" step="0.01" id="edit-price" name="price" value="{{old('price')}}" placeholder="Enter item price" required>
                        </div>

                        @error('price')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="edit-quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" min="1" step="1" id="edit-quantity" name="quantity" value="{{old('quantity')}}" placeholder="Enter item quantity" required>
                        </div>

                        @error('quantity')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="edit-stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" min="1" step="1" id="edit-stock" name="stock" value="{{old('stock')}}" placeholder="Enter item stock" required>
                        </div>

                        @error('stock')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="edit-discount" class="form-label">Discount(%)</label>
                            <input type="number" class="form-control" id="edit-discount" name="discount" value="{{old('discount')}}" placeholder="Enter item discount" required>
                        </div>

                        @error('discount')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="edit-desc" class="form-label">Description</label>
                            <div id="edit-editor"></div>
                            <textarea name="desc" id="edit-desc" class="form-control d-none" placeholder="Enter item description" required></textarea>
                        </div>

                        @error('desc')
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

                        <div class="form-group mt-2">
                            <label for="edit-package" class="form-label">Package</label>
                            <input type="checkbox" name="package" id="edit-package">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn theme-btn">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit item modal end -->

    <!-- delete item modal starts -->
    <div class="modal address-details-modal fade" id="delete-item-modal" tabindex="-1" aria-labelledby="deleteItemModalToggle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteItemModalToggle"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure, You want to delete this item?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{route('admin.items.index')}}" class="btn gray-btn mt-0" data-bs-dismiss="modal">CANCEL</a>
                    <a href="{{ route('admin.items.delete') }}" onclick="event.preventDefault(); document.getElementById('delete-item-form').submit();" class="btn theme-btn mt-0">Delete</a>

                    <form id="delete-item-form" action="{{ route('admin.items.delete') }}" method="POST" class="d-none">
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
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
        <script>
            $(document).ready(function(){

                ClassicEditor
                .create( document.querySelector('#editor') )
                .then(editor => {
                    editor.model.document.on('change:data', () => {
					    $('#desc').val(editor.getData());
                    })
                })
                .catch( error => {
                    console.error( error );
                } );

                const editCkeditor = ClassicEditor.create( document.querySelector('#edit-editor') );

                $('body').on('click','#edit-item', function(){
                    $('#edit-id').val($(this).attr('data-id'));
                    $('#edit-name').val($(this).attr('data-name'));
                    $('#edit-category').val($(this).attr('data-category'));
                    $('#edit-quantity').val($(this).attr('data-quantity'));
                    $('#edit-stock').val($(this).attr('data-stock'));
                    $('#edit-price').val($(this).attr('data-price'));
                    $('#edit-discount').val($(this).attr('data-discount'));
                    if($(this).attr('data-package') == 1){
                        $('#edit-package').prop('checked', true);
                    }else{
                        $('#edit-package').prop('checked', false);
                    }

                    editCkeditor.then(editor => {
                        editor.setData($(this).attr('data-desc'));
                        editor.model.document.on('change:data', () => {
                            $('#edit-desc').val(editor.getData());
                        })
                    })
                    .catch( error => {
                        console.error( error );
                    } );

                    // $('#edit-desc').val($(this).attr('data-desc'));
                    $('#edit-status').val($(this).attr('data-status'));
                    $('#edit-item-modal').modal('show');
                });

                $('body').on('click','#delete-item', function(){
                    $('#delete-id').val($(this).attr('data-id'));
                    $('#deleteItemModalToggle').text($(this).attr('data-name'));
                    $('#delete-item-modal').modal('show');
                });
            });
        </script>
    @endpush
@endsection

