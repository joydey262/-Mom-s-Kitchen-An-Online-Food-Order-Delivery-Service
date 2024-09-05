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

    <!-- order tracking section starts -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <!-- <div class="delivery-root">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.467883108898!2d89.54958357395581!3d22.822172923779572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9008870bfd93%3A0xf684d314e4b6e473!2sNorthern%20University%20of%20Business%20and%20Technology%20Khulna!5e0!3m2!1sen!2sbd!4v1717079231197!5m2!1sen!2sbd"
                        width="600" height="450" class="contact-map border-0 w-100 h-100" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div> -->
                </div>
                <div class="col-xl-5">
                    <div class="order-tracking-content">
                        <ul class="nav nav-tabs tab-style3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="status-tab" data-bs-toggle="tab"
                                    data-bs-target="#status-tab-pane" type="button" role="tab">
                                    Order Status
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details" data-bs-toggle="tab"
                                    data-bs-target="#details-pane" type="button" role="tab">
                                    Order Details
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="status-tab-pane" role="tabpanel" tabindex="0">
                                <div class="order-status-content">
                                    @if($order->deliver)
                                    <div class="driver-details">
                                        <h4>Drivers Information</h4>
                                        <div class="driver-details-box">
                                            <div class="driver-image">
                                                @if($order->deliver)
                                                <img class="img-fluid img" src="{{asset('/storage/profile/'.$order->deliver->img)}}" alt="p1">
                                                @else
                                                <img class="img-fluid img" src="{{asset('/images/icons/p1.png')}}" alt="p1">
                                                @endif
                                            </div>
                                            <div class="driver-content">
                                                <div class="driver-info">
                                                    <h6>Driver Name :</h6>
                                                    <h5>{{$order->deliver->name}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="shipping-details">
                                        <h4>Shipping Details</h4>
                                        <ul class="delivery-list">
                                            <li>
                                                <div class="order-address">
                                                    <img class="img-fluid place-icon"
                                                        src="{{asset('/images/svg/location-active.svg')}}" alt="logo">
                                                    <div>
                                                        <h5>Delivery Address</h5>
                                                        <h6 class="delivery-place">{{$order->address->name}}</h6>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="shipping-details">
                                        <h4>Order Status</h4>
                                        <ul class="delivery-list">
                                            @if($order->status == 'Ordered' || $order->status == 'Confirm' || $order->status == 'Processed' || $order->status == 'Delivered')
                                            <li>
                                                <div class="order-address">
                                                    <img class="img-fluid place-icon" src="{{asset('/images/empty-cart.svg')}}" alt="logo">
                                                    <div>
                                                        <h5>Order Placed</h5>
                                                        <h6 class="delivery-place">Your Order Has been Placed.</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                            @if($order->status == 'Confirm' || $order->status == 'Processed' || $order->status == 'Delivered')
                                            <li>
                                                <div class="order-address">
                                                    <img class="img-fluid place-icon" src="{{asset('/images/gif/confirm.gif')}}" alt="logo">
                                                    <div>
                                                        <h5>Confirmed</h5>
                                                        <h6 class="delivery-place">Your Order Has Been Confirmed.</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                            @if($order->status == 'Processed' || $order->status == 'Delivered')
                                            <li>
                                                <div class="order-address">
                                                    <img class="img-fluid place-icon" src="{{asset('/images/gif/food.gif')}}" alt="logo">
                                                    <div>
                                                        <h5>Processed</h5>
                                                        <h6 class="delivery-place">Your order Has been Processed.</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                            @if($order->status == 'Delivered')
                                            <li>
                                                <div class="order-address">
                                                    <img class="img-fluid place-icon" src="{{asset('/images/scooter.png')}}" alt="logo">
                                                    <div>
                                                        <h5>Delivered</h5>
                                                        <h6 class="delivery-place">Your Order Has Been Delivered.</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="details-pane" role="tabpanel" tabindex="0">
                                <div class="order-details-content">
                                    <div class="layout-sec">
                                        <div class="order-summery-section sticky-top">
                                            <div class="checkout-detail">
                                                <div class="cart-address-box">
                                                    <div class="add-img">
                                                        <img class="img-fluid img sm-size"
                                                            src="{{asset('/images/svg/location.svg')}}" alt="rp1">
                                                    </div>
                                                    <div class="add-content">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="dark-text deliver-place">
                                                                Deliver to : {{$order->address->type}}
                                                                <i class="ri-check-line"></i>
                                                            </h5>
                                                        </div>
                                                        <h6 class="address mt-sm-2 mt-1 content-color">
                                                            {{$order->address->name}}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="cart-address-box mt-3">
                                                    <div class="add-img">
                                                        <img class="img-fluid img sm-size" src="{{asset('/images/svg/wallet-add.svg')}}" alt="rp1">
                                                    </div>
                                                    <div class="add-content">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="dark-text deliver-place">
                                                                Payment Method: <i class="ri-check-line"></i>
                                                            </h5>
                                                        </div>
                                                        <h6 class="address mt-sm-2 mt-1 content-color">
                                                            {{$order->payment_method}}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <ul>
                                                    @foreach($order->products as $product)
                                                    <li>
                                                        <div class="horizontal-product-box">
                                                            <div class="product-content">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between">
                                                                    <h5>{{$product->name}}</h5>
                                                                    <h6 class="product-price">{{$product->price}} BDT</h6>
                                                                </div>
                                                                <h6 class="ingredients-text">
                                                                    {{$product->category->name}}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <h5 class="bill-details-title fw-semibold dark-text">
                                                    Bill Details
                                                </h5>
                                                <div class="sub-total">
                                                    <h6 class="content-color fw-normal">Sub Total</h6>
                                                    <h6 class="fw-semibold">{{$order->sub_total}} BDT</h6>
                                                </div>
                                                <div class="sub-total">
                                                    <h6 class="content-color fw-normal">
                                                        Delivery Charge
                                                    </h6>
                                                    <h6 class="fw-semibold success-color">Free</h6>
                                                </div>
                                                <div class="sub-total">
                                                    <h6 class="content-color fw-normal">
                                                        Discount ({{$order->discount}}%)
                                                    </h6>
                                                    <h6 class="fw-semibold">{{$order->discountable}} BDT</h6>
                                                </div>
                                                <div class="grand-total">
                                                    <h6 class="fw-semibold dark-text">Total</h6>
                                                    <h6 class="fw-semibold amount">{{$order->payable}} BDT</h6>
                                                </div>
                                                <img class="dots-design" src="{{asset('/images/svg/dots-design.svg')}}" alt="dots">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- order tracking section end -->

    @include('components.mobile-fix-menu');
    @include('components.location-modal');
@endsection
