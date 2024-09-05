@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">Address</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Address</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- page head section end -->

    <!-- address section starts -->
    <section class="account-section section-b-space pt-0">
        <div class="container">
            <div class="layout-sec">
                <div class="row g-lg-4 g-4">
                    <div class="col-lg-8">
                        @include('components.cart-top')
                        <div class="address-section">
                            <div class="title">
                                <div class="loader-line"></div>
                                <h3>Select Saved Address</h3>
                                <h6>
                                    You’ve add some address before, You can select one of below.
                                </h6>
                            </div>
                            <div class="row g-3">
                                @foreach(auth()->user()->addresses as $address)
                                <div class="col-md-6">
                                    <div class="address-box">
                                        <div class="address-title">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="ri-home-4-fill icon"></i>
                                                <h6>{{$address->type}}</h6>
                                            </div>
                                            <a id="edit-address" data-id="{{$address->id}}" data-name="{{$address->name}}" data-type="{{$address->type}}" data-phone="{{$address->phone}}" class="edit-btn">Edit</a>
                                        </div>
                                        <div class="address-details">
                                            <h6>{{$address->name}}</h6>
                                            <h6 class="phone-number">{{$address->phone}}</h6>
                                            <div class="option-section">
                                                <a href="{{route('cart.delivery.here', $address->id)}}" class="btn gray-btn rounded-2 mt-0">Deliver
                                                    Here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <div class="col-md-6">
                                    <div class="address-box new-address-box">
                                        <a href="#address-details" class="btn theme-outline rounded-2"
                                            data-bs-toggle="modal">Add New Address</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @include('components.cart-right')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- addresss section end -->

    <!-- add address modal starts -->
    <div class="modal address-details-modal fade" id="address-details" tabindex="-1" aria-labelledby="addModalAdress"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalAdress">Add New Address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('store.address') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" class="form-control" id="type" name="type" value="{{old('type')}}" placeholder="Enter address type" required>
                        </div>

                        @error('type')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Enter address name" required>
                        </div>

                        @error('name')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" placeholder="Enter phone number" required>
                        </div>

                        @error('phone')
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
    <!-- add address modal end -->

    <!-- edit address modal starts -->
    <div class="modal address-details-modal fade" id="edit-address-modal" aria-hidden="true" aria-labelledby="editModalAddress"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalAdress">Edit Address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('update.address') }}">
                    @csrf
                    @method('PUT')
                    <input type="number" class="form-control d-none" id="edit-id" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-type" class="form-label">Type</label>
                            <input type="text" class="form-control" id="edit-type" name="type" value="{{old('type')}}" placeholder="Enter address type" required>
                        </div>

                        @error('type')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="edit-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit-name" name="name" value="{{old('name')}}" placeholder="Enter address name" required>
                        </div>

                        @error('name')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="edit-phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="edit-phone" name="phone" value="{{old('phone')}}" placeholder="Enter phone number" required>
                        </div>

                        @error('phone')
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
    <!-- edit name modal end -->

    @include('components.mobile-fix-menu');
    @include('components.location-modal');
    
    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){   
                $('body').on('click','#edit-address', function(){
                    $('#edit-id').val($(this).attr('data-id'));
                    $('#edit-name').val($(this).attr('data-name'));
                    $('#edit-type').val($(this).attr('data-type'));
                    $('#edit-phone').val($(this).attr('data-phone'));
                    $('#edit-address-modal').modal('show');
                });
            });
        </script>
    @endpush
@endsection