@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">Empty Cart</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Empty Cart</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- page head section end -->

    <!--  cart section starts -->
    <section class="empty-cart-section section-b-space">
        <div class="container">
            <div class="empty-cart-image">
                <div>
                    <img class="img-fluid img" src="{{asset('/images/empty-cart.svg')}}" alt="empty-cart">
                    <h2>It’s empty in your cart</h2>
                    <h5>To browse more restaurants, visit the main page.</h5>
                    <a href="{{route('welcome')}}" class="btn theme-outline restaurant-btn">see food near you</a>
                </div>
            </div>
        </div>
    </section>
    <!-- cart section end -->

    @include('components.mobile-fix-menu')
    @include('components.location-modal')
@endsection