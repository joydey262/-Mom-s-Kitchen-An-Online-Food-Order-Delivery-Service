@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">Setting</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Setting</li>
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
                    <div class="setting-content">
                        <div class="title">
                            <h3>Setting</h3>
                        </div>
                        <ul class="notification-setting">
                            <li>
                                <div class="notification pt-0">
                                    <h6 class="fw-normal dark-text">Offer Update</h6>
                                    <div class="switch-btn">
                                        <input type="checkbox" checked>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="notification">
                                    <h6 class="fw-normal dark-text">Order Update</h6>
                                    <div class="switch-btn">
                                        <input type="checkbox">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="notification pb-0">
                                    <h6 class="fw-normal dark-text">New Update</h6>
                                    <div class="switch-btn">
                                        <input type="checkbox" checked="">
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="delete-account">
                            <h3 class="fw-medium dark-text">Delete Your Account</h3>
                            <p class="content-color">
                                Hi <span class="dark-text fw-medium">{{auth()->user()->name}}</span>,
                            </p>
                            <p class="content-color">
                                We are sorry to here you would like to delete your account.
                            </p>
                            <h6 class="dark-text fw-medium mt-sm-3 mt-2 mb-2">Note :</h6>
                            <p class="content-color">
                                Deleting your account will permanently remove your profile,
                                personal settings, and all other associated information. once
                                your account is deleted, you will be logged out and will be
                                unable to log back in.
                            </p>
                            <p class="content-color mt-2">
                                If you understand and agree to the above statement, and would
                                still like to delete your account, than click below
                            </p>
                            <a href="#delete-account" class="btn theme-btn delete-btn mt-3"
                                data-bs-toggle="modal">Delete Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile section end -->

    @include('components.mobile-fix-menu')

    <!-- logout modal starts -->
    <div class="modal address-details-modal fade" id="delete-account" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Account Deletion Request
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Please explain your reason for Mom's Kitchen account before you go. We can
                        get better with this knowledge.
                    </p>
                    <textarea name="delete" class="w-100 mt-2 form-control" id="reason" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <a href="index.html" class="btn theme-btn mt-0">delete Account</a>
                </div>
            </div>
        </div>
    </div>
    <!-- logout modal end -->

    @include('components.logout-modal')
@endsection