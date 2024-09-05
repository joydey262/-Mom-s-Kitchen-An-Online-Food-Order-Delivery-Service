@extends('layouts.guest')

@section('content')
    <!-- home section start -->
    <section id="home" class="home-wrapper section-b-space overflow-hidden">
        <div class="background-effect">
            <div class="main-circle">
                <div class="main-circle circle-1">
                    <div class="main-circle circle-2"></div>
                </div>
            </div>
        </div>
        <div class="container text-center position-relative">
            <h1>{{$setting->name}}</h1>
            <h2>Discover healthy and yummy foods that deliver near you</h2>
            <div class="search-section">
                <form method="POST" action="{{route('search')}}" class="auth-form search-head">
                    @csrf
                    <div class="d-flex gap-2">
                        <div class="form-group">
                            <div class="form-input mb-0">
                                <input type="search" name="search" class="form-control search"
                                    placeholder="Search for food">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn theme-btn mt-0">Search</button>
                    </div>
                </form>
            </div>
            <ul class="home-features-list d-md-flex d-none">
                <li>
                    <div class="home-features-box">
                        <img class="img-fluid icon" src="{{asset('/images/svg/routing.svg')}}" alt="routing">
                        <h6>Wide Map</h6>
                    </div>
                </li>
                <li>
                    <div class="home-features-box">
                        <img class="img-fluid icon" src="{{asset('/images/svg/3d-rotate.svg')}}" alt="3d-rotate">
                        <h6>Easiest Order</h6>
                    </div>
                </li>
                <li>
                    <div class="home-features-box">
                        <img class="img-fluid icon" src="{{asset('/images/svg/truck.svg')}}" alt="truck">
                        <h6>Most Delivery</h6>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- home section end -->

    <!-- categories section starts -->
    <section class="categories-section section-b-space">
        <img src="{{asset('/images/scooter.png')}}" class="scooter-img img-fluid d-md-inline-block d-none"
            alt="animation-scooter">
        <div class="container">
            <div class="title">
                <h2>Categories</h2>
                <div class="loader-line"></div>
                <div class="sub-title">
                    <p>
                        Browse out top categories here to discover different food cuisine.
                    </p>
                </div>
            </div>
            <div class="theme-arrow">
                <div class="swiper categories-slider categories-style">
                    <div class="swiper-wrapper">
                        @foreach($categories as $category)
                        <div class="swiper-slide">
                            <a href="/categories/{{Str::lower($category->name)}}" class="food-categories">
                                <img class="img-fluid categories-img" src="{{asset('/storage/category/'.$category->img)}}" alt="Category">
                                <h4 class="dark-text">{{$category->name}}</h4>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-button-next categories-next"></div>
                <div class="swiper-button-prev categories-prev"></div>
            </div>
        </div>
    </section>
    <!-- categories section end -->

    <!-- popular item section starts -->
    <section class="popular-restaurant banner-section section-b-space ratio3_2 overflow-hidden">
        <img class="img-fluid item-5" src="{{asset('/images/svg/item5.svg')}}" alt="item-5">
        <div class="container">
            <div class="title">
                <h2>Popular Items</h2>
                <div class="loader-line"></div>
                <div class="sub-title">
                    <p>Find your favourite popular food.</p>
                </div>
            </div>
            <div class="row g-md-4 g-3">
            @php
                // Sort items by average rating descending
                $items = $items->sortByDesc(function($item) {
                    return $item->reviews()->avg('rating');
                })->take(8);
            @endphp
                @foreach($items as $item)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="vertical-product-box">
                        <div class="vertical-product-box-img">
                            <a href="/items/{{$item->slug}}">
                                <img class="vertical-product-img-top w-100 bg-img" src="{{asset('/storage/item/'.$item->img)}}"
                                    alt="vp-2">
                            </a>
                            <div class="offers">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4>{{$item->discount}}% OFF</h4>
                                </div>
                            </div>
                        </div>
                        <div class="vertical-product-body">
                            <div class="d-flex align-items-center justify-content-between mt-sm-3 mt-2">
                                <a href="/items/{{$item->slug}}">
                                    <h4 class="vertical-product-title">{{$item->name}}</h4>
                                </a>
                                <h6 class="rating-star">
                                    <span class="star"><i class="ri-star-s-fill"></i></span>{{$item->reviews()->avg('rating')}}
                                </h6>
                            </div>
                            <h5 class="product-items">{!!Str::limit($item->desc, 30, '...')!!}</h5>
                            <div class="location-distance d-flex align-items-center justify-content-between pt-sm-3 pt-2">
                                <ul class="distance">
                                    <li><i class="ri-price-tag-3-line icon"></i> {{number_format(($item->price) - ($item->price / 100 * $item->discount), 0)}} BDT</li>
                                    <li><a href="{{route('add.to.cart', $item->id)}}" class="btn theme-outline copy-btn btn-sm mt-0 rounded-2">Add To Cart</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- popular item section end -->

    <!-- popular package section starts -->
    <section class="popular-restaurant banner-section section-b-space ratio3_2 overflow-hidden">
        <img class="img-fluid item-5" src="{{asset('/images/svg/item5.svg')}}" alt="item-5">
        <div class="container">
            <div class="title">
                <h2>Popular Packages</h2>
                <div class="loader-line"></div>
                <div class="sub-title">
                    <p>Find your favourite popular food.</p>
                </div>
            </div>
            <div class="row g-md-4 g-3">
            @php
                // Sort packages by average rating descending
                $packages = $packages->sortByDesc(function($package) {
                    return $package->reviews()->avg('rating');
                })->take(8);
            @endphp
            @foreach($packages as $package)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="vertical-product-box">
                        <div class="vertical-product-box-img">
                            <a href="/items/{{$package->slug}}">
                                <img class="vertical-product-img-top w-100 bg-img" src="{{asset('/storage/item/'.$package->img)}}"
                                    alt="vp-2">
                            </a>
                            <div class="offers">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4>{{$package->discount}}% OFF</h4>
                                </div>
                            </div>
                        </div>
                        <div class="vertical-product-body">
                            <div class="d-flex align-items-center justify-content-between mt-sm-3 mt-2">
                                <a href="/items/{{$package->slug}}">
                                    <h4 class="vertical-product-title">{{$package->name}}</h4>
                                </a>
                                <h6 class="rating-star">
                                    <span class="star"><i class="ri-star-s-fill"></i></span>{{$package->reviews()->avg('rating')}}
                                </h6>
                            </div>
                            <h5 class="product-items">{!!Str::limit($package->desc, 30, '...')!!}</h5>
                            <div class="location-distance d-flex align-items-center justify-content-between pt-sm-3 pt-2">
                                <ul class="distance">
                                    <li><i class="ri-price-tag-3-line icon"></i> {{number_format(($package->price) - ($package->price / 100 * $package->discount), 0)}} BDT</li>
                                    <li><a href="{{route('add.to.cart', $package->id)}}" class="btn theme-outline copy-btn btn-sm mt-0 rounded-2">Add To Cart</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- popular package section end -->

    @include('components.mobile-fix-menu')
@endsection