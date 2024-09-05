@extends('layouts.guest')

@section('content')
<!-- banner section starts -->
<section class="product-banner-section">
        <div class="container">
            <div class="restaurant-box">
                <div class="restaurant-image">
                    <img class="img-fluid img" src="{{asset('/storage/category/'.$item->category->img)}}" alt="brand">
                </div>
                <div class="restaurant-details">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <h2 class="restaurant-name">
                                {{$item->name}}
                            </h2>
                            <h4 class="restaurant-place">{{$item->category->name}}</h4>
                        </div>
                        <div class="restaurant-description">
                            <!-- <div class="categories-icon">
                                <a href="#!" id="liveToastBtn">
                                    <i class="ri-share-line icon text-white"></i>
                                </a>
                                <a href="#!" class="like-btn animate inactive">
                                    <i class="ri-heart-3-fill fill-icon"></i>
                                    <i class="ri-heart-3-line text-white outline-icon"></i>
                                    <div class="effect-group">
                                        <span class="effect"></span>
                                        <span class="effect"></span>
                                        <span class="effect"></span>
                                        <span class="effect"></span>
                                        <span class="effect"></span>
                                    </div>
                                </a>
                            </div> -->
                            <div class="distance d-flex align-items-center">
                                <h4 class="text-white shop-time"><a href="{{route('add.to.cart', $item->id)}}" class="btn theme-btn restaurant-btn w-100 rounded-2">Add To Cart</a></h4>
                                <h4 class="rating-star">
                                    <span class="star"><i class="ri-star-s-fill"></i></span> {{$item->reviews()->avg('rating')}}
                                    ({{$item->reviews->count()}}+ Reviews)
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section end -->

    <!-- tab section starts -->
    <section class="tab-details-section section-b-space">
        <div class="container">
            <div class="category-detail-tab">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="menu-button d-inline-block d-lg-none">
                            <a href="#!"><i class="ri-book-open-line"></i> Menu</a>
                        </div>
                        <ul class="nav nav-tabs tab-style1" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                    data-bs-target="#overview" type="button" role="tab">
                                    Overview
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="activity-tab" data-bs-toggle="tab" data-bs-target="#review"
                                    type="button" role="tab">
                                    Reviews
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content product-details-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" tabindex="0">
                                <div class="overview-section">
                                    {!!$item->desc!!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="review" role="tabpanel" tabindex="0">
                                <div class="review-section">
                                    <ul class="review-box-list">
                                        @foreach($item->reviews as $review)
                                        <li>
                                            <div class="review-box">
                                                <div class="review-head">
                                                    <div class="review-image">
                                                        @if($review->user->img)
                                                        <img class="img-fluid img" src="{{asset('/storage/profile/'.$review->user->img)}}" alt="User">
                                                        @else
                                                        <img class="img-fluid" src="{{asset('/storage/default.jpg')}}" alt="User">
                                                        @endif
                                                    </div>
                                                    <div class="d-flex align-sm-items-center justify-content-between w-100">
                                                        <div>
                                                            <h6 class="reviewer-name">{{$review->user->name}}</h6>
                                                            <ul class="rating-star">
                                                                @for($i = 0; $i < $review->rating; $i++)
                                                                <li>
                                                                    <i class="ri-star-fill star"></i>
                                                                </li>
                                                                @endfor
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <h6>{{$review->created_at->diffForHumans()}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review-content">
                                                    <p>{!!$review->desc!!}</p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tab section end -->

    @include('components.mobile-fix-menu')
    @include('components.location-modal')
@endsection