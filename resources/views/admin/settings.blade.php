@extends('layouts.app')

@section('content')
    <!-- profile section starts -->
    <section class="profile-section section-b-space">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-12">
                    <div class="change-profile-content">
                        <div class="title">
                            <div class="loader-line"></div>
                            <h3>Change Settings</h3>
                        </div>
                        <ul class="profile-details-list">
                            <li>
                                <div class="profile-content">
                                    <div class="d-flex align-items-center gap-sm-2 gap-1">
                                        <i class="ri-user-3-fill"></i>
                                        <span>Name :</span>
                                    </div>
                                    <h6>{{$setting->name}}</h6>
                                </div>
                                <a href="#name" class="btn theme-outline" data-bs-toggle="modal">Edit</a>
                            </li>
                            <li>
                                <div class="profile-content">
                                    <div class="d-flex align-items-center gap-sm-2 gap-1">
                                        <i class="ri-mail-fill"></i>
                                        <span>Email :</span>
                                    </div>
                                    <h6>{{$setting->email}}</h6>
                                </div>
                                <a href="#email" class="btn theme-outline" data-bs-toggle="modal">Change</a>
                            </li>
                            <li>
                                <div class="profile-content">
                                    <div class="d-flex align-items-center gap-sm-2 gap-1">
                                        <i class="ri-phone-fill"></i>
                                        <span>Phone Number :</span>
                                    </div>
                                    <h6>{{$setting->phone}}</h6>
                                </div>
                                <a href="#number" class="btn theme-outline mt-0" data-bs-toggle="modal">Change</a>
                            </li>
                            <!-- <li>
                                <div class="profile-content">
                                    <div class="d-flex align-items-center gap-sm-2 gap-1">
                                        <i class="ri-lock-2-fill"></i>
                                        <span>Logo :</span>
                                    </div>
                                    <h6>{{$setting->logo}}</h6>
                                </div>
                                <a href="#picture" class="btn theme-outline mt-0" data-bs-toggle="modal">Change</a>
                            </li> -->
                            <li>
                                <div class="profile-content">
                                    <div class="d-flex align-items-center gap-sm-2 gap-1">
                                        <i class="ri-lock-2-fill"></i>
                                        <span>Delivery Charge :</span>
                                    </div>
                                    <h6>{{number_format($setting->delivery_charge, 0)}} BDT</h6>
                                </div>
                                <a href="#charge" class="btn theme-outline mt-0" data-bs-toggle="modal">Change</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile section end -->

    <!-- edit name modal starts -->
    <div class="modal profile-modal fade" id="name" aria-hidden="true" aria-labelledby="exampleModalToggleName"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalToggleName">Name</h1>
                </div>
                <form method="POST" action="{{ route('admin.settings.name') }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$setting->name}}" placeholder="Enter your name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn theme-btn">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit name modal end -->

    <!-- edit email modal starts -->
    <div class="modal profile-modal fade" id="email" aria-hidden="true" aria-labelledby="exampleModalToggleEmail"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalToggleEmail">Email</h1>
                </div>
                <form method="POST" action="{{ route('admin.settings.email') }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$setting->email}}" placeholder="Enter your email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn theme-btn">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit email modal end -->

    <!-- edit phone number modal starts -->
    <div class="modal profile-modal fade" id="number" aria-hidden="true" aria-labelledby="exampleModalToggleCall"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalToggleCall">
                        Phone Number
                    </h1>
                </div>
                <form method="POST" action="{{ route('admin.settings.phone') }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$setting->phone}}" placeholder="Enter your number">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn theme-btn">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit phone number modal end -->

     <!-- edit profile picture modal starts -->
     <div class="modal profile-modal fade" id="picture" aria-hidden="true" aria-labelledby="exampleModalTogglePic"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalTogglePic">Logo</h1>
                </div>
                <form method="POST" action="{{ route('admin.settings.logo') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn theme-btn">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit profile picture modal end -->

    <!-- edit phone number modal starts -->
    <div class="modal profile-modal fade" id="charge" aria-hidden="true" aria-labelledby="exampleModalToggleCall"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalToggleCall">
                        Delivery Charge
                    </h1>
                </div>
                <form method="POST" action="{{ route('admin.settings.charge') }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="delivery_charge" class="form-label">Delivery Charge</label>
                            <input type="text" class="form-control" id="delivery_charge" name="charge" value="{{$setting->delivery_charge}}" placeholder="Enter food delivery charge">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn theme-btn">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit phone number modal end -->

    @include('components.logout-modal')
    @include('components.mobile-fix-menu')
@endsection