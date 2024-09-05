@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">Search</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Search</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- page head section end -->

    <!-- popular item section starts -->
    <section class="popular-restaurant banner-section section-b-space ratio3_2 overflow-hidden">
        <img class="img-fluid item-5" src="{{asset('/images/svg/item5.svg')}}" alt="item-5">
        <div class="container">
            <div class="row g-md-4 g-3">
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


    @include('components.mobile-fix-menu')
    @include('components.location-modal')
@endsection