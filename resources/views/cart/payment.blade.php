@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">Payment</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Payment</li>
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
                        <div class="payment-section">
                            <div class="title mb-0">
                                <div class="loader-line"></div>
                                <h3>Choose Payment Method</h3>
                                <h6>There are many Types of Payment Method</h6>
                            </div>
                            <div class="accordion payment-accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Payment Method
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="card-list">
                                                <li>
                                                    <div class="form-check form-check-reverse">
                                                        <label class="form-check-label" for="aamarpay">
                                                            <img class="img-fluid img"
                                                                src="{{asset('/images/aamarpay.png')}}"
                                                                alt="mastercard">
                                                            <span class="card-name dark-text">AamarPay</span>
                                                        </label>
                                                        <input class="form-check-input" type="radio" name="pay" id="aamarpay" @if(session('payment') == 'AamarPay') checked @endif>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check form-check-reverse">
                                                        <label class="form-check-label" for="cash">
                                                            <img class="img-fluid img"
                                                                src="{{asset('/images/icons/svg/cash.svg')}}" alt="mastercard">
                                                            <span class="card-name dark-text">
                                                                Cash on Delivery
                                                            </span>
                                                        </label>
                                                        <input class="form-check-input" type="radio" name="pay" id="cash" @if(session('payment') == 'Cash On Delivery') checked @endif>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @include('components.cart-right')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- account section end -->

    <!-- payment modal starts -->
    <div class="modal address-details-modal fade" id="payment-modal" tabindex="-1" aria-labelledby="paymentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="paymentModalLabel">Cash On Delivery</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you Sure, You are want to pay with <span id="paymentModalBody">Cash On Delivery</span>.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{route('cart.payment')}}" class="btn gray-btn mt-0" data-bs-dismiss="modal">CANCEL</a>
                    <a href="{{ route('cart.method') }}" onclick="event.preventDefault(); document.getElementById('payment-form').submit();" class="btn theme-btn mt-0">Continue</a>

                    <form id="payment-form" action="{{ route('cart.method') }}" method="POST" class="d-none">
                        @csrf
                        <input class="d-none" type="text" name="payment" id="payment">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- payment modal end -->

    @include('components.mobile-fix-menu')
    @include('components.location-modal')

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){   
                $('body').on('click','#aamarpay', function(){
                    $('#payment').val('AamarPay');
                    $('#paymentModalLabel').text('AamarPay');
                    $('#paymentModalBody').text('AamarPay');
                    $('#payment-modal').modal('show');
                });

                $('body').on('click','#cash', function(){
                    $('#payment').val('Cash On Delivery');
                    $('#paymentModalLabel').text('Cash On Delivery');
                    $('#paymentModalBody').text('Cash On Delivery');
                    $('#payment-modal').modal('show');
                });
            });
        </script>
    @endpush
@endsection