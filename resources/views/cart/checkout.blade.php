@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">Checkout</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- page head section end -->

    <!--  account section starts -->
    <section class="account-section section-b-space pt-0">
        <div class="container">
            <div class="layout-sec">
                <div class="row g-lg-4 g-4">
                    <div class="col-lg-8">
                        @include('components.cart-top')
                        <div class="account-part">
                            <img class="img-fluid account-img" src="{{asset('/images/account.svg')}}" alt="account">
                            <div class="title mb-0">
                                <div class="loader-line"></div>
                                <h3>Account</h3>
                                <p>
                                    To place your order now, log in to in your existing account
                                    or sign up
                                </p>
                                <div class="account-btn d-flex justify-content-center gap-2">
                                    @auth
                                    <a href="{{route('cart.address')}}" class="btn theme-outline mt-0">NEXT</a>
                                    @endauth
                                    @guest
                                    <a href="{{route('login')}}" class="btn theme-outline mt-0">SIGN IN</a>
                                    <a href="{{route('register')}}" class="btn theme-outline mt-0">SIGN UP</a>
                                    @endguest
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
    <!-- account section end -->

    @include('components.mobile-fix-menu');
    @include('components.location-modal');
@endsection