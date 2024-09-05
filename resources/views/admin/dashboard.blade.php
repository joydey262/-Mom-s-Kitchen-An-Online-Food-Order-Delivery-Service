@extends('layouts.app')

@section('content')
    <!-- home section start -->
    <section id="home" class="home-wrapper section-b-space overflow-hidden">
        <div class="container text-center position-relative">
            <ul class="home-features-list d-md-flex d-none" style="margin-top: -50px;">
                <li>
                    <div class="home-features-box">
                        <img class="img-fluid icon" src="{{asset('/images/svg/costumer(1).svg')}}" alt="routing">
                        <h6>Total Customer:<br>{{$dashboard['customers']}}</h6>
                    </div>
                </li>
                <li>
                    <div class="home-features-box">
                        <img class="img-fluid icon" src="{{asset('/images/svg/delivery-man(2).svg')}}" alt="3d-rotate">
                        <h6>Delivery Boys:<br>{{$dashboard['delivery_boy']}}</h6>
                    </div>
                </li>
                <li>
                    <div class="home-features-box">
                        <img class="img-fluid icon" src="{{asset('/images/svg/profile(1).svg')}}" alt="truck">
                        <h6>Total Admins:<br>{{$dashboard['admins']}}</h6>
                    </div>
                </li>
                <li>
                    <div class="home-features-box">
                        <img class="img-fluid icon" src="{{asset('/images/svg/order-food(1).svg')}}" alt="truck">
                        <h6>Total Order:<br>{{$dashboard['orders']}}</h6>
                    </div>
                </li>
                <li>
                    <div class="home-features-box">
                        <img class="img-fluid icon" src="{{asset('/images/svg/list(1).svg')}}" alt="truck">
                        <h6>Total Category:<br>{{$dashboard['categories']}}</h6>
                    </div>
                </li>
                <li>
                    <div class="home-features-box">
                        <img class="img-fluid icon" src="{{asset('/images/svg/discount(1)(1).svg')}}" alt="truck">
                        <h6>Total Coupon:<br>{{$dashboard['coupons']}}</h6>
                    </div>
                </li>
                <li>
                    <div class="home-features-box">
                        <img class="img-fluid icon" src="{{asset('/images/svg/groceries(1).svg')}}" alt="truck">
                        <h6>Total Item:<br>{{$dashboard['items']}}</h6>
                    </div>
                </li>
                <li>
                    <div class="home-features-box">
                        <img class="img-fluid icon" src="{{asset('/images/svg/question(1).svg')}}" alt="truck">
                        <h6>Total FAQ:<br>{{$dashboard['faqs']}}</h6>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- home section end -->
@endsection
