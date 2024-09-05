
    <div class="profile-sidebar sticky-top">
        <div class="profile-cover">
            <img class="img-fluid profile-pic" src="{{asset('/storage/profile/'.auth()->user()->img)}}" alt="profile">
        </div>
        <div class="profile-name">
            <h5 class="user-name">{{auth()->user()->name}}</h5>
            <h6>{{auth()->user()->email}}</h6>
        </div>
        <ul class="profile-list">
            <li class="@if(Route::is('home')) active @endif">
                <i class="ri-user-3-line"></i>
                <a href="{{route('home')}}">Home</a>
            </li>
            <li class="@if(Route::is('profile')) active @endif">
                <i class="ri-user-3-line"></i>
                <a href="{{route('profile')}}">Change Profile</a>
            </li>
            <li class="@if(Route::is('my.order')) active @endif">
                <i class="ri-shopping-bag-3-line"></i>
                <a href="{{route('my.order')}}">My Order</a>
            </li>
            <li class="@if(Route::is('my.review')) active @endif">
                <i class="ri-star-s-fill"></i>
                <a href="{{route('my.review')}}">My Review</a>
            </li>
            <li class="@if(Route::is('saved.address')) active @endif">
                <i class="ri-map-pin-line"></i>
                <a href="{{route('saved.address')}}">Saved Address</a>
            </li>
            <li class="@if(Route::is('faq')) active @endif">
                <i class="ri-question-line"></i><a href="{{route('faq')}}">Help</a>
            </li>
            <!-- <li class="@if(Route::is('settings')) active @endif">
                <i class="ri-settings-3-line"></i>
                <a href="{{route('settings')}}">Settings</a>
            </li> -->
            <li>
                <i class="ri-logout-box-r-line"></i>
                <a href="#log-out" data-bs-toggle="modal">Log Out</a>
            </li>
        </ul>
    </div>