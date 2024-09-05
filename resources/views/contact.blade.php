@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">Contact</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- page head section end -->

        <!-- contact section starts -->
        <section class="section-b-space">
        <div class="container">
            <div class="title animated-title">
                <div class="loader-line"></div>
                <div class="d-flex align-items-center justify-content-between flex-wrap w-100">
                    <div>
                        <h2>Inform us of Yourself</h2>
                        <h6>
                            Contact us if you have any queries or merely want to say hi.
                        </h6>
                    </div>
                </div>
            </div>
            <div class="contact-detail">
                <div class="row g-4">
                    <div class="col-xxl-3 col-md-6">
                        <div class="contact-detail-box">
                            <div class="contact-icon">
                                <i class="ri-phone-fill"></i>
                            </div>
                            <div>
                                <div class="contact-detail-title">
                                    <h4>Phone</h4>
                                </div>
                                <div class="contact-detail-contain">
                                    <p>{{$setting->phone}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="contact-detail-box">
                            <div class="contact-icon">
                                <i class="ri-mail-open-fill"></i>
                            </div>
                            <div>
                                <div class="contact-detail-title">
                                    <h4>Email</h4>
                                </div>
                                <div class="contact-detail-contain">
                                    <p>{{$setting->email}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-xl-8">
                    <div class="contact-form">
                        <form method="POST" action="{{route('message')}}" class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="inputFirstname" class="form-label mt-0">First Name</label>
                                <input type="text" name="first_name" class="form-control" id="inputFirstname"
                                    placeholder="Enter your first name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputLastname" class="form-label mt-0">Last Name</label>
                                <input type="text" name="last_name" class="form-control" id="inputLastname"
                                    placeholder="Enter your last name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter your email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPhone" class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-control" id="inputPhone" placeholder="Enter your number" required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputtext" class="form-label">How Can We Help You?</label>
                                <textarea name="msg" class="form-control" id="inputtext" rows="3"
                                    placeholder="Hi there, I would like to...." required></textarea>
                            </div>
                            <div class="buttons d-flex align-items-center justify-content-end gap-3">
                                <a href="{{route('contact')}}" class="btn gray-btn mt-0">CANCEL</a>
                                <button type="submit" class="btn theme-btn mt-0">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4">
                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3676.793280936064!2d89.54305727358935!3d22.84713632285556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9a83687fe941%3A0x6831e8674f15d09a!2sGovernment%20Khulna%20Mohila%20Polytechnic%20Institute!5e0!3m2!1sen!2sbd!4v1716135691172!5m2!1sen!2sbd"
                        width="600" height="450" class="contact-map border-0 w-100 h-100" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section end -->

    @include('components.mobile-fix-menu');
@endsection