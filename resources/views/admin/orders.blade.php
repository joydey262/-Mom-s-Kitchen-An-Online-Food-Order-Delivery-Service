@extends('layouts.app')

@section('content')
    <!-- profile section starts -->
    <section class="profile-section section-b-space">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-12">
                    <div class="my-order-content">
                        <div class="title">
                            <div class="loader-line"></div>
                            <h3>Order List</h3>
                        </div>
                        <ul class="order-box-list">
                            @foreach($orders as $order)
                                <li>
                                    <div class="order-box">
                                        <div class="order-box-content">
                                            <div class="order-details">
                                                <div class="d-flex align-items-center justify-content-between w-100">
                                                    <h6 class="fw-medium dark-text">
                                                        <span class="fw-normal content-color">Trans ID :</span>
                                                        #{{$order->trans_id}}
                                                    </h6>
                                                    <h6 class="fw-medium content-color text-end">
                                                        {{$order->created_at->diffForHumans()}}
                                                    </h6>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between w-100">
                                                    <h6 class="fw-medium dark-text">
                                                        <span class="fw-normal content-color">Status:</span>
                                                        {{$order->status}}
                                                    </h6>
                                                    @if($order->reservation)
                                                        <h6 class="fw-medium content-color text-end">
                                                            <span class="fw-normal content-color">Reservation:</span>
                                                            {{$order->reservation->format('d M Y, h:i A')}}
                                                        </h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-sm-3 mt-2">
                                            <h6 class="fw-medium dark-text">
                                                <span class="fw-normal content-color">Total Amount :</span>
                                                {{$order->payable}} BDT
                                            </h6>

                                            <form method="POST" action="{{route('admin.orders.update')}}">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" name="id" value="{{$order->id}}" class="d-none">
                                                @if($order->status != 'Delivered')
                                                    @if(auth()->user()->type == 'Delivery Boy')
                                                        @if($order->status == 'Processed')
                                                            <button type="submit" class="btn theme-outline details-btn">
                                                                Deliver Now
                                                            </button>
                                                        @endif
                                                    @else
                                                        @if($order->status == 'Ordered')
                                                            <button type="submit" class="btn theme-outline details-btn">
                                                                Confirm Now
                                                            </button>
                                                        @endif
                                                        @if($order->status == 'Confirm')
                                                            <button type="submit" class="btn theme-outline details-btn">
                                                                Process Now
                                                            </button>
                                                        @endif
                                                        @if($order->status == 'Processed')
                                                            <button type="submit" class="btn theme-outline details-btn">
                                                                Deliver Now
                                                            </button>
                                                        @endif
                                                    @endif
                                                @endif
                                                @if($order->status == 'Ordered')
                                                    <a id="cancel" data-id="{{$order->id}}" class="btn theme-outline details-btn">Cancel Now</a>
                                                @endif
                                                <a id="details" data-products="{{$order->products}}" data-date="{{$order->created_at->diffForHumans()}}" data-address="{{$order->address->name}}" data-trans="{{$order->trans_id}}" data-discount="{{$order->discount}}" data-discountable="{{$order->discountable}}" data-subtotal="{{$order->sub_total}}" data-payable="{{$order->payable}}" data-status="{{$order->status}}" data-phone="{{$order->user->phone}}" data-email="{{$order->user->email}}" class="btn theme-outline details-btn">Details</a>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile section end -->

    <!-- cancel order modal starts -->
    <div class="modal address-details-modal fade" id="order_cancel" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cancel Order</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you Sure, You are canceling</p>
                </div>
                <div class="modal-footer">
                    <a href="{{route('welcome')}}" class="btn gray-btn mt-0" data-bs-dismiss="modal">CANCEL</a>
                    <a href="{{ route('admin.orders.delete') }}" onclick="event.preventDefault(); document.getElementById('cancel-form').submit();" class="btn theme-btn mt-0">Confirm</a>

                    <form id="cancel-form" action="{{ route('admin.orders.delete') }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                        <input type="number" id="cancel_id" name="id">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cancel order modal end -->

    <!-- order details modal starts -->
    <div class="modal order-details-modal fade" id="order_details" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-medium" id="exampleModalToggleLabel">
                        Order details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="order-details-box">
                        <div class="order-content">
                            <div class="d-flex align-items-center gap-2">
                                <i class="ri-map-pin-fill theme-color"></i>
                                <p class="text-sm" id="address">93, Songbird Cir, Blackville, SC, USA-29817</p>
                            </div>
                            <h6 class="order-deliver-label" id="status">Delivered</h6>
                        </div>
                    </div>
                    <div class="delivery-on-going">
                        <ul class="delivery-list">
                            <li>
                                <h6>Id Transaction</h6>
                                <h5 id="trans_id">#ACB12345613</h5>
                            </li>
                            <li>
                                <h6>Date & Time</h6>
                                <h5 id="date">10 Aug 2024</h5>
                            </li>
                            <li>
                                <h6>Phone</h6>
                                <h5 id="user_phone">123-456-7890</h5>
                            </li>
                            <li>
                                <h6>Email</h6>
                                <h5 id="user_email">user@example.com</h5>
                            </li>
                        </ul>
                    </div>
                    <ul class="order-list">

                    </ul>
                    <div class="total-amount">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-medium dark-text">Total</h6>
                            <h6 class="fw-medium dark-text" id="subtotal">0 BDT</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="fw-normal content-color">Delivery Charge</p>
                            <p class="fw-normal content-color">Free</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="fw-normal content-color" id="discount">Discount(0%)</p>
                            <p class="fw-normal content-color" id="discountable">0 BDT</p>
                        </div>
                        <div class="grand-amount d-flex align-items-center justify-content-between">
                            <h6 class="fw-medium dark-text">Grand Total</h6>
                            <h6 class="fw-medium dark-text" id="payable">0 BDT</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- order details modal end -->

    @include('components.location-modal')
    @include('components.mobile-fix-menu')

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $('body').on('click','#cancel', function(){
                    $('#cancel_id').val($(this).attr('data-id'));
                    $('#order_cancel').modal('show');
                });

                $('body').on('click','#details', function(){
                    $('#date').text($(this).attr('data-date'));
                    $('#address').text($(this).attr('data-address'));
                    $('#trans_id').text($(this).attr('data-trans'));
                    $('#status').text($(this).attr('data-status'));
                    $('#subtotal').text($(this).attr('data-subtotal')+' BDT');
                    $('#discount').text('Discount ('+$(this).attr('data-discount')+'%)');
                    $('#discountable').text($(this).attr('data-discountable')+' BDT');
                    $('#payable').text($(this).attr('data-payable')+' BDT');
                    $('#user_phone').text($(this).attr('data-phone'));
                    $('#user_email').text($(this).attr('data-email'));

                    var products = JSON.parse($(this).attr('data-products'));

                    $(".order-list").empty(); // Clear previous entries

                    products.forEach(function(product) {
                        $(".order-list").append(`<li> <div class="order-content-box"> <div class="d-flex align-items-center justify-content-between"><h6>`+product.name+`</h6><h6>`+product.price+` BDT</h6></div><div><p>Qty: `+product.quantity+`Piece</p></div></div></li>`);
                    });

                    $('#order_details').modal('show');
                });
            });
        </script>
    @endpush
@endsection
