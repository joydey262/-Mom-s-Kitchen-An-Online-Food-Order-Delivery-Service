<!-- footer section starts -->
<footer class="footer-section section-t-space">
        <div class="subscribe-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="subscribe-part">
                            <h5>
                                Don't pass up our fantastic discounts. email offers from all
                                of our best eateries
                            </h5>
                            <div class="position-relative w-100">
                                <input type="email" class="form-control subscribe-form-control"
                                    placeholder="Enter your Email">
                                <a href="#" class="btn theme-btn subscribe-btn mt-0">Subscribe Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="main-footer">
                <div class="row g-3">
                    <div class="col-xl-4 col-lg-12">
                        <div class="footer-logo-part">
                            <img class="img-fluid logo" src="{{asset('/images/logo/logomomg.png')}}" alt="logo">
                            <p align='justify'>
                                Welcome to our online order website! Here, you can browse our
                                wide selection of products and place orders from the comfort
                                of your own home.
                            </p>
                            <div class="social-media-part">
                                <ul class="social-icon">
                                    <li>
                                        <a href="https://www.facebook.com/login/">
                                            <i class="ri-facebook-fill icon"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/i/flow/login">
                                            <i class="ri-twitter-fill icon"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/login/">
                                            <i class="ri-linkedin-fill icon"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/accounts/login/">
                                            <i class="ri-instagram-fill icon"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com/">
                                            <i class="ri-youtube-fill icon"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="row g-3">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <h5 class="footer-title">Company</h5>
                                <ul class="content">
                                    <li>
                                        <a href="{{route('about')}}">
                                            <h6>About us</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('contact')}}">
                                            <h6>Contact us</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('offers')}}">
                                            <h6>Offer</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('faq')}}">
                                            <h6>FAQs</h6>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <h5 class="footer-title">Account</h5>
                                <ul class="content">
                                    <li>
                                        <a href="{{route('my.order')}}">
                                            <h6>My order</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('order.tracking')}}">
                                            <h6>Order-Tracking</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('cart.checkout')}}">
                                            <h6>View Cart</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('saved.address')}}">
                                            <h6>Saved Address</h6>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <h5 class="footer-title">Useful links</h5>
                                <ul class="content">
                                    <li>
                                        <a href="{{route('login')}}">
                                            <h6>Login</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('register')}}">
                                            <h6>Register</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('profile')}}">
                                            <h6>Profile</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('my.review')}}">
                                            <h6>My Review</h6>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer-part">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                <h6>@ Copyright {{now()->year}} {{$setting->name}}. All rights Reserved.</h6>
                    <img class="img-fluid cards" src="{{asset('/images/icons/Pay.png')}}" alt="card" 
                    style="height: 51px;">
                </div>
            </div>
        </div>
    </footer>
    <!-- footer section end -->