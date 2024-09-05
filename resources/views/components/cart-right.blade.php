<div class="order-summery-section sticky-top">
    <div class="checkout-detail">
        @if(session('address'))
        <div class="cart-address-box">
            <div class="add-img">
                <img class="img-fluid img" src="{{asset('/images/home.png')}}" alt="rp1">
            </div>
            <div class="add-content">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="dark-text deliver-place">
                        Deliver to : {{session('address')['type']}}
                    </h5>
                    <a href="{{route('cart.address')}}" class="change-add">Change</a>
                </div>
                <h6 class="address mt-2 content-color">
                    {{session('address')['name']}}
                </h6>
            </div>
        </div>
        @endif
        @if(session('payment'))
        <div class="cart-address-box mt-3">
            <div class="add-img">
                <img class="img-fluid img sm-size" src="{{asset('/images/svg/wallet-add.svg')}}" alt="rp1">
            </div>
            <div class="add-content">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="dark-text deliver-place">Payment Method:</h5>
                </div>
                <h6 class="address mt-2 content-color">
                    {{session('payment')}}
                </h6>
            </div>
        </div>
        @endif
        <ul>
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            <li>
                <div class="horizontal-product-box">
                    <div class="product-content">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5>{{$details['name']}}</h5>
                            <h6 class="product-price">{{number_format($details['price'], 0)}} BDT</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-md-2 mt-1 gap-1">
                            <h6 class="ingredients-text">{{$details['category']}}</h6>
                            <div class="plus-minus">
                                <a href="/update-to-cart?id={{$id}}&type=minus"><i class="ri-subtract-line sub"></i></a>
                                <input type="number" value="{{$details['quantity']}}" min="1" max="10">
                                <a href="/update-to-cart?id={{$id}}&type=plus"><i class="ri-add-line add"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        @endif
        </ul>
        <div class="promo-code position-relative">
            <form method="POST" action="{{route('cart.promo')}}">
                @csrf
                <input type="text" name="promo" value="{{session('coupon') ? session('coupon')['code'] : ''}}" class="form-control code-form-control" placeholder="Enter promo code">
                <button type="submit" class="btn theme-btn apply-btn mt-0">APPLY</button>
            </form>
        </div>
       
        @if(session('is_package'))
        <h5 class="bill-details-title fw-semibold dark-text">
            Reservation Details
        </h5>
        <div class="reservation-note text-secondary">
             <h6><small>Note:</small> <small style="font-size: 0.75rem; color: #808080;">
            Reservation must be done at least 6 hours later from the current time and date.</small></h6>
        </div>

        <div class="promo-code position-relative">
            <form method="POST" action="{{route('cart.reservation')}}" onsubmit="return validateReservation()">
                @csrf
                <input type="datetime-local" name="reservation" value="{{session('reservation')}}" class="form-control code-form-control" required onchange="checkReservationTime()">
                <button id="confirm-button" type="submit" class="btn theme-btn apply-btn mt-0">Confirm</button>
            </form>
        </div>
        @endif
        
        <h5 class="bill-details-title fw-semibold dark-text">
            Bill Details
        </h5>
        @php $total = 0 @endphp

        @foreach((array) session('cart') as $id => $details)
            @php $total += $details['price'] @endphp
        @endforeach
        <div class="sub-total">
            <h6 class="content-color fw-normal">Sub Total</h6>
            <h6 class="fw-semibold">{{number_format($total, 0)}} BDT</h6>
        </div>
        <div class="sub-total">
            <h6 class="content-color fw-normal">
                Delivery Charge
            </h6>
            <h6 class="fw-semibold">{{number_format($setting->delivery_charge, 0)}} BDT</h6>
        </div>
        @php $discount = session('coupon') ? number_format($total / 100 * session('coupon')['per'], 2) : 0 @endphp
        <div class="sub-total">
            <h6 class="content-color fw-normal">Discount ({{session('coupon') ? session('coupon')['per'] : 0}}%)</h6>
            <h6 class="fw-semibold">{{number_format($discount, 0)}} BDT</h6>
        </div>
        <div class="grand-total">
            <h6 class="fw-semibold dark-text">To Pay</h6>
            <h6 class="fw-semibold amount">{{number_format($total + $setting->delivery_charge - $discount, 0)}} BDT</h6>
        </div>
        <form method="POST" action="{{route('order.store')}}">
            @csrf
            <button type="submit" class="btn theme-btn restaurant-btn w-100 rounded-2">CHECKOUT</button>
        </form>
        <img class="dots-design" src="{{asset('/images/svg/dots-design.svg')}}" alt="dots">
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        checkReservationTime();
    });

    function validateReservation() {
        const input = document.querySelector('input[name="reservation"]');
        const reservationTime = new Date(input.value);
        const currentTime = new Date();
        const minimumTime = new Date(currentTime.getTime() + 6 * 60 * 60 * 1000);

        if (reservationTime <= currentTime || reservationTime < minimumTime) {
            alert("Reservation must be done at least 6 hours from the current time and cannot be in the past.");
            return false;
        }

        return true;
    }

    function checkReservationTime() {
        const input = document.querySelector('input[name="reservation"]');
        const reservationTime = new Date(input.value);
        const currentTime = new Date();
        const minimumTime = new Date(currentTime.getTime() + 6 * 60 * 60 * 1000);
        const confirmButton = document.getElementById('confirm-button');

        if (reservationTime <= currentTime || reservationTime < minimumTime) {
            confirmButton.style.display = 'none';
            alert("Reservation must be done at least 6 hours later from the current time and date.");
        } else {
            confirmButton.style.display = 'block';
        }
    }
</script>