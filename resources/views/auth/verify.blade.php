@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">Email Verification</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Email Verification</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- page head section end -->

    <!-- signup page start -->
    <section class="login-hero-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 m-auto">
                    <div class="login-data">
                        <form method="POST" action="{{ route('verification.resend') }}" class="otp-form">
                            @csrf
                            <h2 class="mb-0 dark-text">Verify Your Email Address</h2>
                            <h6>Before proceeding, please check your email for a verification link. If you did not receive the email, click the bellow button to request another.</h6>

                            @if (session('resent'))
                                <span class="theme-color">A fresh verification link has been sent to your email address</span>
                            @endif
                            <button type="submit" class="btn theme-btn submit-btn w-100 rounded-2">CONTINUE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- signup page end -->

    @include('components.mobile-fix-menu');
    @include('components.location-modal');
@endsection
