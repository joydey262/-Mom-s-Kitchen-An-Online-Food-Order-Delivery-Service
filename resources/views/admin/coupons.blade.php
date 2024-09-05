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
                            <h3>Coupons</h3>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="address-box white-bg new-address-box white-bg">
                                    <a href="#add-coupon" class="btn new-address-btn theme-outline rounded-2 mt-0"
                                        data-bs-toggle="modal">Add New Coupon</a>
                                </div>
                            </div>
                            @foreach($coupons as $coupon)
                            <div class="col-md-6">
                                <div class="address-box white-bg">
                                    <div class="address-title">
                                        <div class="d-flex align-items-center gap-2">
                                            <h6>#{{$coupon->code}} ({{$coupon->per}}%)</h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">

                                        <a id="edit-coupon" data-id="{{$coupon->id}}" data-code="{{$coupon->code}}" data-per="{{$coupon->per}}" data-start="{{$coupon->format_start}}" data-end="{{$coupon->format_end}}" class="edit-btn">Edit</a>

                                        <a id="delete-coupon" data-id="{{$coupon->id}}" data-code="#{{$coupon->code}}" class="edit-btn">Delete</a>
                                        </div>
                                    </div>
                                    <div class="address-details d-flex justify-content-between">
                                        <h6>{{$coupon->start_at}}</h6>
                                        <h6>{{$coupon->end_at}}</h6>
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

    <!-- add coupon modal starts -->
    <div class="modal profile-modal fade" id="add-coupon" aria-hidden="true" aria-labelledby="addCouponModalToggle"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="addCouponModalToggle">Add New Coupon</h1>
                </div>
                <form method="POST" action="{{ route('admin.coupons.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{old('code')}}" placeholder="Enter your code" required>
                        </div>

                        @error('name')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="per" class="form-label">Percentage</label>
                            <input type="number" step="0.01" class="form-control" id="per" name="per" value="{{old('per')}}" placeholder="Enter your percentage" required>
                        </div>

                        @error('name')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="start" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start" name="start" required>
                        </div>

                        @error('start')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="end" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end" name="end" required>
                        </div>

                        @error('end')
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
    <!-- add coupon modal end -->

    <!-- edit coupon modal starts -->
    <div class="modal profile-modal fade" id="edit-coupon-modal" aria-hidden="true" aria-labelledby="editCouponModalToggle"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="editCouponModalToggle">Edit Coupon</h1>
                </div>
                <form method="POST" action="{{ route('admin.coupons.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="number" class="form-control d-none" id="edit-id" name="id">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-code" class="form-label">Code</label>
                            <input type="text" class="form-control" id="edit-code" name="code" value="{{old('code')}}" placeholder="Enter your code" required>
                        </div>

                        @error('code')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="edit-per" class="form-label">Percentage</label>
                            <input type="number" step="0.01" class="form-control" id="edit-per" name="per" value="{{old('per')}}" placeholder="Enter your percentage" required>
                        </div>

                        @error('per')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="edit-start" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="edit-start" name="start" required>
                        </div>

                        @error('start')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="edit-end" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="edit-end" name="end" required>
                        </div>

                        @error('end')
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
    <!-- edit coupon modal end -->

    <!-- delete coupon modal starts -->
    <div class="modal address-details-modal fade" id="delete-coupon-modal" tabindex="-1" aria-labelledby="deleteCouponModalToggle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteCouponModalToggle"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure, You want to delete this coupon?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{route('admin.categories.index')}}" class="btn gray-btn mt-0" data-bs-dismiss="modal">CANCEL</a>
                    <a href="{{ route('admin.coupons.delete') }}" onclick="event.preventDefault(); document.getElementById('delete-coupon-form').submit();" class="btn theme-btn mt-0">Delete</a>

                    <form id="delete-coupon-form" action="{{ route('admin.coupons.delete') }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                        <input type="number" class="form-control" id="delete-id" name="id">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- delete coupon modal end -->

    @include('components.location-modal')
    @include('components.mobile-fix-menu')

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){  
                $('body').on('click','#edit-coupon', function(){
                    $('#edit-id').val($(this).attr('data-id'));
                    $('#edit-code').val($(this).attr('data-code'));
                    $('#edit-per').val($(this).attr('data-per'));
                    $('#edit-start').val($(this).attr('data-start'));
                    $('#edit-end').val($(this).attr('data-end'));
                    $('#edit-coupon-modal').modal('show');
                });

                $('body').on('click','#delete-coupon', function(){
                    $('#delete-id').val($(this).attr('data-id'));
                    $('#deleteCouponModalToggle').text($(this).attr('data-code'));
                    $('#delete-coupon-modal').modal('show');
                });
            });
        </script>
    @endpush
@endsection

