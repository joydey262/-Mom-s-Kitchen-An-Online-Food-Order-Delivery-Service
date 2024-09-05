@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">Dashboard</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                    <div id="home" class="home-wrapper section-b-space overflow-hidden">
                        <div class="container text-center position-relative">
                            <ul class="home-features-list d-md-flex d-none" style="margin-top: -50px;">
                                <li>
                                    <div class="home-features-box">
                                        <img class="img-fluid icon" src="{{asset('/images/svg/truck.svg')}}" alt="truck">
                                        <h6>Total Order:<br>{{$home['orders']}}</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="home-features-box">
                                        <img class="img-fluid icon" src="{{asset('/images/svg/truck.svg')}}" alt="truck">
                                        <h6>Total Address:<br>{{$home['addresses']}}</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="home-features-box">
                                        <img class="img-fluid icon" src="{{asset('/images/svg/truck.svg')}}" alt="truck">
                                        <h6>Total Item:<br>{{$home['items']}}</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="home-features-box">
                                        <img class="img-fluid icon" src="{{asset('/images/svg/truck.svg')}}" alt="truck">
                                        <h6>Total Review:<br>{{$home['reviews']}}</h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile section end -->

    @include('components.logout-modal')
    @include('components.mobile-fix-menu')
@endsection
