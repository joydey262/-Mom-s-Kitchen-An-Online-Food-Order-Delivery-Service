<!-- Header section start -->
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg p-0">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#offcanvasNavbar">
                <span class="navbar-toggler-icon">
                    <i class="ri-menu-line"></i>
                </span>
            </button>
            <a href="{{route('welcome')}}">
                <img class="img-fluid logo" src="{{asset('/images/logo/logomomg.png')}}" alt="logo">
            </a>
            <style>
                .navbar .logo{
                    height: 90px;
                }
            </style>
            <div class="nav-option order-md-2">
                @auth
                <div class="dropdown-button">
                    <div class="cart-button">
                        <span>@if(auth()->user()) {{auth()->user()->unreadNotifications->count()}}  @else 0 @endif </span>
                        <i class="ri-notification-line text-white cart-bag"></i>
                    </div>
                    <div class="onhover-box">
                        <ul class="cart-list">
                        @if(auth()->user())
                            @foreach(auth()->user()->notifications as $notification)
                            <li class="product-box-contain">
                                <div class="drop-cart">
                                    <a href="" class="drop-image">
                                        <img src="{{asset('/storage/profile/'.$notification->notifiable->img)}}" class="blur-up lazyloaded" alt="">
                                    </a>
                                    <div class="drop-contain">
                                        <a href=""><h5>{{ $notification->notifiable->name }}</h5></a>
                                        <h6 class="d-block">{{ Str::words($notification->data['user'], 1, ' ') }} {{ $notification->data['text'] }} <a href="{{route('admin.orders.index')}}">#{{ $notification->data['trans'] }}</a></h6>
                                        <button class="close-button close_button">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        @endif
                        </ul>
                    </div>
                </div>
                @endauth
                <div class="dropdown-button">
                    <div class="cart-button">
                        <span>@if(session('cart')) {{count(session('cart'))}} @else 0 @endif</span>
                        <i class="ri-shopping-cart-line text-white cart-bag"></i>
                    </div>
                    <div class="onhover-box">
                        <ul class="cart-list">
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                            <li class="product-box-contain">
                                <div class="drop-cart">
                                    <a href="{{route('remove.from.cart', $id)}}" class="drop-image">
                                        <img src="{{asset('/storage/item/'.$details['img'])}}" class="blur-up lazyloaded" alt="">
                                    </a>
                                    <div class="drop-contain">
                                        <a href="{{route('remove.from.cart', $id)}}"><h5>{{ $details['name'] }}</h5></a>
                                        <h6><span>{{ $details['quantity'] }} x </span> {{ number_format($details['price'], 0)  }} BDT</h6>
                                        <button class="close-button close_button">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        @endif
                        </ul>
                        @php $total = 0 @endphp

                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] @endphp
                        @endforeach
                        <div class="price-box">
                            <h5>Total :</h5>
                            <h4 class="theme-color fw-semibold">{{number_format($total, 0)}} BDT</h4>
                        </div>
                        <div class="button-group">
                            <a href="{{route('cart.checkout')}}" class="btn btn-sm theme-btn w-100 d-block rounded-2">View Cart</a>
                        </div>
                    </div>
                </div>
                @auth
                    @if(auth()->user()->email_verified_at)
                        @include('components.profile-part')
                    @else
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-sm theme-btn">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endif
                @endauth
                @guest
                <a href="{{route('login')}}" class="btn btn-sm theme-btn">Login</a>
                @endguest
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button class="navbar-toggler btn-close" id="offcanvas-close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-center flex-grow-1">
                            <li class="nav-item">
                                <a class="nav-link @if(Route::is('welcome')) active @endif" href="{{route('welcome')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Route::is('order.tracking')) active @endif" href="{{route('order.tracking')}}">Order Tracking</a>
                            </li>
                            <li class="nav-item @if(Route::is('offers')) active @endif">
                                <a class="nav-link" href="{{route('offers')}}">Offers</a>
                            </li>
                            <li class="nav-item @if(Route::is('faq')) active @endif">
                                <a class="nav-link" href="{{route('faq')}}">FAQ</a>
                            </li>
                            <li class="nav-item @if(Route::is('contact')) active @endif">
                                <a class="nav-link" href="{{route('contact')}}">Contact</a>
                            </li>
                            <li class="nav-item @if(Route::is('about')) active @endif">
                                <a class="nav-link" href="{{route('about')}}">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
        </nav>
    </div>
</header>
<!-- Header Section end -->