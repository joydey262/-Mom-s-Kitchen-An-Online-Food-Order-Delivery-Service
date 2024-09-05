<!-- mobile fix menu start -->
<div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="@if(Route::is('welcome')) active @endif">
                <a href="{{route('welcome')}}" class="menu-box">
                    <i class="ri-home-4-line"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="wishlist.html" class="menu-box">
                    <i class="ri-heart-3-line"></i>
                    <span>Wishlist</span>
                </a>
            </li>
            <li>
                <a href="checkout.html" class="menu-box">
                    <i class="ri-shopping-cart-2-line"></i>
                    <span>Cart</span>
                </a>
            </li>
            <li class="@if(Route::is('profile')) active @endif">
                <a href="{{route('profile')}}" class="menu-box">
                    <i class="ri-user-line"></i>
                    <span>Profile</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->