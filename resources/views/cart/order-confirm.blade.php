@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">Confirm Order</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Confirm Order</li>
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
                        <div class="account-part confirm-part">
                            <img class="img-fluid account-img w-25" src="{{asset('/images/gif/confirm.gif')}}" alt="confirm">
                            <h3>Your order has been successfully placed</h3>
                            <p>
                                Thank you for your order. Have a nice day.
                            </p>
                            <div class="account-btn d-flex justify-content-center gap-2">
                                <a href="{{route('order.tracking')}}" class="btn theme-btn mt-0">TRACK ORDER</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order-summery-section sticky-top">
                            <div class="checkout-detail">
                                <div class="cart-address-box">
                                    <div class="add-img">
                                        <img class="img-fluid img sm-size" src="{{asset('/images/svg/location.svg')}}"
                                            alt="rp1">
                                    </div>
                                    <div class="add-content">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="dark-text deliver-place">
                                                Deliver to : {{$order->address->type}}
                                            </h5>
                                        </div>
                                        <h6 class="address mt-2 content-color">
                                            {{$order->address->name}}
                                        </h6>
                                    </div>
                                </div>
                                <div class="cart-address-box mt-3">
                                    <div class="add-img">
                                        <img class="img-fluid img sm-size" src="{{asset('/images/svg/wallet-add.svg')}}"
                                            alt="rp1">
                                    </div>
                                    <div class="add-content">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="dark-text deliver-place">Payment Method:</h5>
                                        </div>
                                        <h6 class="address mt-2 content-color">
                                            {{$order->payment_method}}
                                        </h6>
                                    </div>
                                </div>
                                <ul>
                                    @foreach($order->products as $product)
                                    <li>
                                        <div class="horizontal-product-box">
                                            <div class="product-content">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5>{{$product->name}}</h5>
                                                    <h6 class="product-price">{{number_format($product->price, 0)}} BDT</h6>
                                                </div>
                                                <h6 class="ingredients-text">{{$product->category->name}}</h6>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @if($order->reservation)
                                <h5 class="bill-details-title fw-semibold dark-text">
                                    Reservation Details
                                </h5>

                                <div class="sub-total">
                                    <h6 class="content-color fw-normal">Date: </h6>
                                    <h6 class="fw-semibold">{{$order->reservation->format('d M Y, h:i A')}}</h6>
                                </div>
                                @endif

                                <h5 class="bill-details-title fw-semibold dark-text">
                                    Bill Details
                                </h5>
                                <div class="sub-total">
                                    <h6 class="content-color fw-normal">Sub Total</h6>
                                    <h6 class="fw-semibold">{{number_format($order->sub_total, 0)}} BDT</h6>
                                </div>
                                <div class="sub-total">
                                    <h6 class="content-color fw-normal">
                                        Delivery Charge
                                    </h6>
                                    <h6 class="fw-semibold">{{number_format($order->delivery_charge, 0)}} BDT</h6>
                                </div>
                                <div class="sub-total">
                                    <h6 class="content-color fw-normal">Discount ({{$order->discount}}%)</h6>
                                    <h6 class="fw-semibold">{{number_format($order->discountable, 0)}} BDT</h6>
                                </div>
                                <div class="grand-total">
                                    <h6 class="fw-semibold dark-text">Total</h6>
                                    <h6 class="fw-semibold amount">{{number_format($order->payable, 0)}} BDT</h6>
                                </div>
                                <img class="dots-design" src="{{asset('/images/svg/dots-design.svg')}}" alt="dots">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- account section end -->

    @include('components.mobile-fix-menu')
    @include('components.location-modal')
@endsection