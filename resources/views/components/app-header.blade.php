<!-- Header section start -->
<header class="header2">
            <div class="container-fluid px-0">
                <nav class="navbar navbar-expand-lg p-0">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown">
                        <span id="sidebar-toggle" class="navbar-toggler-icon">
                            <i class="ri-menu-line"></i>
                        </span>
                    </button>
                    <a href="{{route('welcome')}}" class="sidebar-logo d-lg-none d-inline-block">
                        <img class="img-fluid logo" src="{{asset('/images/logo/logomomg.png')}}" alt="logo">
                    </a>
                    <div class="location-flex">
                        <div class="nav-option order-md-2">
                        <div class="dropdown-button">
                    <div class="cart-button">
                        <span>@if(auth()->user()) {{auth()->user()->unreadNotifications->count()}}  @else 0 @endif </span>
                        <i class="ri-notification-line cart-bag"></i>
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
                            @include('components.profile-part')
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- Header Section end -->