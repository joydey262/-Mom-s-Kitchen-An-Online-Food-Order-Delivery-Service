<div class="shop-sidebar" id="shop-sidebar">
                <a href="{{route('welcome')}}" class="sidebar-logo d-lg-block d-none">
                    <img class="img-fluid logo" src="{{asset('/images/logo/logomomg.png')}}" alt="logo">
                </a>
                <ul>
                    <li id="sidebar-back" class="d-lg-none d-block sidebar-back">
                        <a href="#!">
                            <div>
                                <div class="text-start">
                                    <i class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back
                                </div>
                            </div>
                        </a>
                    </li>
                    @if(auth()->user()->type == 'Delivery Boy')
                    <li class="@if(Route::is('admin.dashboard')) active @endif">
                        <a href="{{route('admin.dashboard')}}"><i class="ri-home-4-line me-3"></i>Dashboard</a>
                    </li>
                    <li class="@if(Route::is('admin.orders.index')) active @endif">
                        <a href="{{ route('admin.orders.index') }}">
                            <i class="ri-restaurant-2-line me-3"></i>Orders
                        </a>
                    </li>
                    <li class="@if(Route::is('profile')) active @endif">
                        <a href="{{ route('profile') }}">
                            <i class="ri-user-3-line me-3"></i>Change Profile
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->type == 'Admin')
                    <li class="@if(Route::is('admin.dashboard')) active @endif">
                        <a href="{{route('admin.dashboard')}}"><i class="ri-home-4-line me-3"></i>Dashboard</a>
                    </li>
                    <li class="@if(Route::is('admin.orders.index')) active @endif">
                        <a href="{{route('admin.orders.index')}}"><i class="ri-restaurant-2-line me-3"></i>Orders</a>
                    </li>
                    <li class="@if(Route::is('admin.users.index')) active @endif">
                        <a href="{{route('admin.users.index')}}">
                            <i class="ri-contacts-line me-3"></i>Users
                        </a>
                    </li>
                    <li class="@if(Route::is('admin.categories.index')) active @endif">
                        <a href="{{route('admin.categories.index')}}">
                            <i class="ri-stack-line me-3"></i>Categories
                        </a>
                    </li>
                    <li class="@if(Route::is('admin.items.index')) active @endif">
                        <a href="{{route('admin.items.index')}}"><i class="ri-menu-add-line me-3"></i>Items</a>
                    </li>
                    <li class="@if(Route::is('admin.coupons.index')) active @endif">
                        <a href="{{route('admin.coupons.index')}}">
                            <i class="ri-discount-percent-line me-3"></i>Coupons
                        </a>
                    </li>
                    <li class="@if(Route::is('admin.faqs.index')) active @endif">
                        <a href="{{route('admin.faqs.index')}}"><i class="ri-question-line me-3"></i>FAQs</a>
                    </li>
                    <li class="@if(Route::is('admin.messages.index')) active @endif">
                        <a href="{{route('admin.messages.index')}}"><i class="ri-message-3-line me-3"></i>Messages</a>
                    </li>
                    <li class="@if(Route::is('admin.settings.index')) active @endif">
                        <a href="{{route('admin.settings.index')}}"><i class="ri-equalizer-2-line me-3"></i>Settings</a>
                    </li>
                    <li class="@if(Route::is('profile')) active @endif">
                        <a href="{{ route('profile') }}">
                            <i class="ri-user-3-line me-3"></i>Change Profile
                        </a>
                    </li>
                    @endif
                    <li class="@if(Route::is('logout')) active @endif">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ri-logout-box-r-line me-3"></i>Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>