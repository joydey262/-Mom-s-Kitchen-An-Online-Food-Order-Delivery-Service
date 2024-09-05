@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">Order Tracking</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Order Tracking</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- page head section end -->

    <!-- signin page start -->
    <section class="login-hero-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 m-auto">
                    <div class="login-data">
                        <form method="POST" action="{{ route('order.find') }}" class="auth-form">
                            @csrf
                            @method('PUT')
                            <h2>Tracking Number</h2>
                            <div class="form-input mt-4">
                                <input type="text" name="order" class="form-control" placeholder="Enter Trans id for order tracking" required>
                                <i class="ri-map-pin-line"></i>
                            </div>

                            @error('order')
                                <span class="theme-color mb-2">{{$message}}</span>
                            @enderror

                            <button type="submit" class="btn theme-btn submit-btn w-100 rounded-2">CONTINUE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- signin page end -->

    @include('components.mobile-fix-menu');
    @include('components.location-modal');
@endsection
