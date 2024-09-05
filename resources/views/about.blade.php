@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">About us</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">About us</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- page head section end -->

        <!-- about section starts -->
        <section class="section-b-space">
        <div class="container">
            <div class="row g-3">
                <div class="col-xl-7">
                    <div class="title animated-title">
                        <div class="loader-line"></div>
                        <h2 class="mb-sm-3 mb-2">What is {{$setting->name}}?</h2>
                        <p class="content-color" align='justify'>
                            Welcome to our online order website! Here, you can browse our
                            wide selection of products and place orders from the comfort of
                            your own home. Whether you're looking for food items or packages, 
                            we have you covered. With easynavigation, secure payment options,
                            and fast delivery.
                        </p>

                        <p class="pt-2 content-color" align='justify'>
                            we strive to make your online food order experience as seamless as
                            possible. Explore our website today and discover the convenience
                            of ordering online!
                        </p>

                        <p class="pt-2 content-color" align='justify'>
                            So why wait? Start exploring on our online website today
                            and experience the ultimate convenience of online ordering!"
                        </p>
                    </div>
                    <div class="about-image-part">
                        <div class="row g-sm-3 g-2">
                            <div class="col-xl-3 col-lg-3 col-sm-6 col-6">
                                <div class="about-images ratio_square">
                                    <img class="bg-size img" src="{{asset('/images/service/1.jpg')}}" alt="1">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-6 col-6">
                                <div class="about-images ratio_square">
                                    <img class="bg-size img" src="{{asset('/images/service/2.jpg')}}" alt="2">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-6 col-6">
                                <div class="about-images ratio_square">
                                    <img class="bg-size img" src="{{asset('/images/service/3.jpg')}}" alt="3">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-6 col-6">
                                <div class="about-images ratio_square">
                                    <img class="bg-size img" src="{{asset('/images/service/4.jpg')}}" alt="4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 d-xl-inline-block d-none">
                    <div class="about-images h-100">
                        <img class="img-fluid img h-100" src="{{asset('/images/service/kitchen.jpg')}}" alt="logo">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->

    <!-- service section starts -->
    <section class="service-box-section section-b-space">
        <div class="container">
            <div class="row g-3">
                <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                    <div class="service-box">
                        <div class="service-img">
                            <img class="img-fluid icon" src="{{asset('/images/svg/routing.svg')}}" alt="routing">
                        </div>
                        <h5 class="service-name">Easiest Way To Order</h5>
                        <p class="service-details">
                            we have designed our refund policies to be easy and hassle-free.
                        </p>
                        <div class="dot"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                    <div class="service-box">
                        <div class="service-img">
                            <img class="img-fluid icon" src="{{asset('/images/svg/3d-rotate.svg')}}" alt="3d-rotate">
                        </div>
                        <h5 class="service-name">Easy & Secure Policies</h5>
                        <p class="service-details">
                            With our commitment to speedy delivery and no additional cost to
                            you.
                        </p>
                        <div class="dot"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                    <div class="service-box">
                        <div class="service-img">
                            <img class="img-fluid icon" src="{{asset('/images/svg/truck.svg')}}" alt="truck">
                        </div>
                        <h5 class="service-name">Free Fast Deliveries</h5>
                        <p class="service-details">
                            Enjoy priority access, special discounts, and more.
                        </p>
                        <div class="dot"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                    <div class="service-box">
                        <div class="service-img">
                            <img class="img-fluid icon" src="{{asset('/images/svg/medal.svg')}}" alt="medal">
                        </div>
                        <h5 class="service-name">Premium Options</h5>
                        <p class="service-details">
                            You only need to follow a few steps & the tasty food is next to
                            your home.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service section end -->

    <!-- team section starts -->
    <section class="section-b-space">
        <div class="container">
            <div class="title animated-title">
                <div class="loader-line"></div>
                <h2>Our Team</h2>
                <div class="sub-title">
                    <p>
                        Our team is committed to delivering innovative solutions that meet
                        the needs of our Visitors and Customers.
                    </p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="team-box">
                        <div class="member-image">
                            <img class="img-fluid img" src="{{asset('/images/service/0_8d0vB1EsR6RUtRny.jpg')}}" alt="logo">
                        </div>
                        <div class="member-details">
                            <h5 class="member-name fw-semibold dark-text">
                                Nayeem Ashraf
                            </h5>
                            <h6 class="fw-normal content-color">Co-Founder</h6>
                            <ul class="social-icon">
                                <li>
                                    <a href="https://www.facebook.com/login/">
                                        <i class="ri-facebook-fill icon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/i/flow/login">
                                        <i class="ri-twitter-fill icon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/accounts/login/">
                                        <i class="ri-instagram-fill icon"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="team-box">
                        <div class="member-image">
                            <img class="img-fluid img" src="{{asset('/images/service/prithasen.jpg')}}" alt="logo">
                        </div>
                        <div class="member-details">
                            <h5 class="member-name fw-semibold dark-text">
                                  Pritha Sen
                            </h5>
                            <h6 class="fw-normal content-color">Founder</h6>
                            <ul class="social-icon">
                                <li>
                                    <a href="https://www.facebook.com/login/">
                                        <i class="ri-facebook-fill icon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/i/flow/login">
                                        <i class="ri-twitter-fill icon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/accounts/login/">
                                        <i class="ri-instagram-fill icon"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="team-box">
                        <div class="member-image">
                            <img class="img-fluid img" src="{{asset('/images/service/1687462974040.jpg')}}" alt="logo">
                        </div>
                        <div class="member-details">
                            <h5 class="member-name fw-semibold dark-text">Abdul Wadud</h5>
                            <h6 class="fw-normal content-color">Manager</h6>
                            <ul class="social-icon">
                                <li>
                                    <a href="https://www.facebook.com/login/">
                                        <i class="ri-facebook-fill icon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/i/flow/login">
                                        <i class="ri-twitter-fill icon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/accounts/login/">
                                        <i class="ri-instagram-fill icon"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="team-box">
                        <div class="member-image">
                            <img class="img-fluid img" src="{{asset('/images/service/wHqQMa1T-SPP_6892-1-1200x1200.jpg')}}" alt="logo">
                        </div>
                        <div class="member-details">
                            <h5 class="member-name fw-semibold dark-text">
                                Ishika Roy
                            </h5>
                            <h6 class="fw-normal content-color mt-1">Marketing Expert</h6>
                            <ul class="social-icon">
                                <li>
                                    <a href="https://www.facebook.com/login/">
                                        <i class="ri-facebook-fill icon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/i/flow/login">
                                        <i class="ri-twitter-fill icon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/accounts/login/">
                                        <i class="ri-instagram-fill icon"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team section end -->

    @include('components.mobile-fix-menu');
@endsection