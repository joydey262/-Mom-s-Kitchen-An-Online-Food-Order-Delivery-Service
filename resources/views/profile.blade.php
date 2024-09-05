@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">Profile</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- page head section end -->

    <!-- profile section starts -->
    <section class="profile-section section-b-space">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-3">
                    @include('components.profile');
                </div>
                <div class="col-lg-9">
                    <div class="change-profile-content">
                        <div class="title">
                            <div class="loader-line"></div>
                            <h3>Change Profile</h3>
                        </div>
                        <ul class="profile-details-list">
                            <li>
                                <div class="profile-content">
                                    <div class="d-flex align-items-center gap-sm-2 gap-1">
                                        <i class="ri-user-3-fill"></i>
                                        <span>Name :</span>
                                    </div>
                                    <h6>{{auth()->user()->name}}</h6>
                                </div>
                                <a href="#name" class="btn theme-outline" data-bs-toggle="modal">Edit</a>
                            </li>
                            <li>
                                <div class="profile-content">
                                    <div class="d-flex align-items-center gap-sm-2 gap-1">
                                        <i class="ri-mail-fill"></i>
                                        <span>Email :</span>
                                    </div>
                                    <h6>{{auth()->user()->email}}</h6>
                                </div>
                                <a href="#email" class="btn theme-outline" data-bs-toggle="modal">Change</a>
                            </li>
                            <li>
                                <div class="profile-content">
                                    <div class="d-flex align-items-center gap-sm-2 gap-1">
                                        <i class="ri-phone-fill"></i>
                                        <span>Phone Number :</span>
                                    </div>
                                    <h6>{{auth()->user()->phone}}</h6>
                                </div>
                                <a href="#number" class="btn theme-outline mt-0" data-bs-toggle="modal">Change</a>
                            </li>
                            <li>
                                <div class="profile-content">
                                    <div class="d-flex align-items-center gap-sm-2 gap-1">
                                        <i class="ri-lock-2-fill"></i>
                                        <span>Password :</span>
                                    </div>
                                    <h6>********</h6>
                                </div>
                                <a href="#password" class="btn theme-outline mt-0" data-bs-toggle="modal">Change</a>
                            </li>
                            <li>
                                <div class="profile-content">
                                    <div class="d-flex align-items-center gap-sm-2 gap-1">
                                        <i class="ri-lock-2-fill"></i>
                                        <span>Profile Picture :</span>
                                    </div>
                                    <h6>{{auth()->user()->img}}</h6>
                                </div>
                                <a href="#picture" class="btn theme-outline mt-0" data-bs-toggle="modal">Change</a>
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
                <form method="POST" action="{{ route('profile.name') }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{auth()->user()->name}}" placeholder="Enter your name" required>
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
                <form method="POST" action="{{ route('profile.email') }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email}}" placeholder="Enter your email" required>
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
                <form method="POST" action="{{ route('profile.phone') }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{auth()->user()->phone}}" placeholder="Enter your number" required>
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

    <!-- edit password number modal starts -->
    <div class="modal profile-modal fade" id="password" aria-hidden="true" aria-labelledby="exampleModalTogglePass"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalTogglePass">Password</h1>
                </div>
                <form method="POST" action="{{ route('profile.password') }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="current-password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" name="current_password" id="current-password" placeholder="Enter your current password" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your new password" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="confirm-password" placeholder="Enter your confirm password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn theme-btn">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit password number modal end -->

    <!-- edit profile picture modal starts -->
    <div class="modal profile-modal fade" id="picture" aria-hidden="true" aria-labelledby="exampleModalTogglePic"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalTogglePic">Profile Picture</h1>
                </div>
                <form method="POST" action="{{ route('profile.picture') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="img" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" name="img" id="img" required>
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

    @include('components.logout-modal')
    @include('components.mobile-fix-menu')
@endsection