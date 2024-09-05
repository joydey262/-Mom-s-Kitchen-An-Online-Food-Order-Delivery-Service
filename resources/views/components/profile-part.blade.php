<div class="profile-part dropdown-button order-md-2">
    <img class="img-fluid profile-pic" src="{{asset('/storage/profile/'.auth()->user()->img)}}" alt="profile">
    <div>
        <h6 class="fw-normal">Hi, {{auth()->user()->name}}</h6>
        <h5 class="fw-medium">My Account</h5>
    </div>
    <div class="onhover-box onhover-sm">
        <ul class="menu-list">
                                @if(auth()->user()->type != 'User')
                                <li>
                                    <a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard</a>
                                </li>
                                @endif
                                <li>
                                    <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('my.order')}}">My orders</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('my.review')}}">My Reviews</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('saved.address')}}">Saved Address</a>
                                </li>
                                <!-- <li>
                                    <a class="dropdown-item" href="{{route('settings')}}">Settings</a>
                                </li> -->
                            </ul>
                            <div class="bottom-btn">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="theme-color fw-medium d-flex"><i class="ri-login-box-line me-2"></i>Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>