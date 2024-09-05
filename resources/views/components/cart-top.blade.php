<div class="process-section">
    <ul class="process-list">
        <li class="active">
            <a href="{{route('cart.checkout')}}">
                <div class="process-icon">
                    <img class="img-fluid icon" src="{{asset('/images/svg/user.svg')}}" alt="user">
                </div>
                <h6>Account</h6>
            </a>
        </li>
        <li class="@if(Route::is('cart.address') || Route::is('cart.payment') || Route::is('cart.order.confirm')) active @endif">
            <a href="{{route('cart.address')}}">
                <div class="process-icon">
                    @if(Route::is('cart.address') || Route::is('cart.payment') || Route::is('cart.order.confirm'))
                        <img class="img-fluid icon" src="{{asset('/images/svg/location-active.svg')}}" alt="location">
                    @else
                        <img class="img-fluid icon" src="{{asset('/images/svg/location.svg')}}" alt="location">
                    @endif
                </div>
                <h6>Address</h6>
            </a>
        </li>
        <li class="@if(Route::is('cart.payment') || Route::is('cart.order.confirm')) active @endif">
            <a href="{{route('cart.payment')}}">
                <div class="process-icon">
                    @if(Route::is('cart.payment') || Route::is('cart.order.confirm'))
                        <img class="img-fluid icon" src="{{asset('/images/svg/wallet-add-active.svg')}}" alt="wallet-add">
                    @else
                        <img class="img-fluid icon" src="{{asset('/images/svg/wallet-add.svg')}}" alt="wallet-add">
                    @endif
                </div>
                <h6>Payment</h6>
            </a>
        </li>
        <li class="@if(Route::is('cart.order.confirm')) active @endif">
            <a href="{{route('cart.order.confirm')}}">
                <div class="process-icon">
                    @if(Route::is('cart.order.confirm'))
                        <img class="img-fluid icon" src="{{asset('/images/svg/verify-active.svg')}}" alt="verify">
                    @else
                        <img class="img-fluid icon" src="{{asset('/images/svg/verify.svg')}}" alt="verify">
                    @endif
                </div>
                <h6>Confirm</h6>
            </a>
        </li>
    </ul>
</div>