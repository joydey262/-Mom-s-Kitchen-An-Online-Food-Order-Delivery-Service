@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">Offers</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Offers</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- page head section end -->

    <!-- coupon section starts -->
    <section>
        <div class="container">
            <div class="title restaurant-title w-border pb-0">
                <div class="loader-line"></div>
                <h2>Available Coupons</h2>
                <ul class="nav nav-pills restaurant-tab tab-style2 w-100 border-0 m-0" id="offer-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pill-new-tab" data-bs-toggle="pill"
                            data-bs-target="#new-tab" aria-selected="true" role="tab">
                            New Coupon
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pill-expired-tab" data-bs-toggle="pill"
                            data-bs-target="#expired-tab" aria-selected="false" tabindex="-1" role="tab">
                            Expired Coupon
                        </button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="TabContent">
                <div class="tab-pane fade show active" id="new-tab" role="tabpanel" aria-labelledby="pill-new-tab"
                    tabindex="0">
                    <div class="row g-4">
                        @foreach($new_coupons as $coupon)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="coupon-box">
                                <div class="coupon-name">
                                    <div class="coupon-img">
                                        <img class="img-fluid img" src="{{asset('/images/icons/coupon.png')}}" alt="c1">
                                    </div>
                                    <div
                                        class="coupon-name-content d-flex align-items-center justify-content-between flex-wrap">
                                        <div>
                                            <h5 class="fw-semibold dark-text">Coupon</h5>
                                            <h6 class="content-color">Use Coupon</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="coupon-content">
                                    <h6 class="fw-medium dark-text">
                                    Get discount up-to 40% using this coupon code
                                    </h6>
                                    <p>
                                    So, hurry up & use this before it's too late.
                                    </p>
                                    <div class="coupon-apply">
                                        <h6 class="coupon-code success-color">#{{$coupon->code}}</h6>
                                        <a href="#" class="btn theme-outline copy-btn mt-0 rounded-2">Copy Code</a>
                                    </div>
                                </div>
                                <img class="img-fluid coupon-bottom" src="{{asset('/images/svg/coupon-bottom.svg')}}"
                                    alt="border-bottom">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="expired-tab" role="tabpanel" aria-labelledby="pill-expired-tab"
                    tabindex="0">
                    <div class="row g-4">
                        @foreach($expired_coupons as $coupon)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="coupon-box">
                                <div class="coupon-name">
                                    <div class="coupon-img">
                                        <img class="img-fluid img" src="{{asset('/images/icons/coupon.png')}}" alt="c1">
                                    </div>
                                    <div
                                        class="coupon-name-content d-flex align-items-center justify-content-between flex-wrap">
                                        <div>
                                            <h5 class="fw-semibold dark-text">Coupon</h5>
                                            <h6 class="content-color">Use Coupon</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="coupon-content">
                                    <h6 class="fw-medium dark-text">
                                    Get discount up-to 40% using this coupon code
                                    </h6>
                                    <p>
                                    So, hurry up & use this before it's too late.
                                    </p>
                                    <div class="coupon-apply">
                                        <h6 class="coupon-code success-color">#{{$coupon->code}}</h6>
                                        <a href="#" class="btn theme-outline copy-btn mt-0 rounded-2">Copy Code</a>
                                    </div>
                                </div>
                                <img class="img-fluid coupon-bottom" src="{{asset('/images/svg/coupon-bottom.svg')}}"
                                    alt="border-bottom">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- coupon section end -->

    @include('components.mobile-fix-menu');
@endsection