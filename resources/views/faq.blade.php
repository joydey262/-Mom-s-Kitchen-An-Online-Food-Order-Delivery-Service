@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">FAQ</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- page head section end -->

    <!-- faq section starts -->
    <section class="section-b-space">
        <div class="container">
            <div class="faq-title">
                <h2>Frequently Asked Questions</h2>
            </div>
            <div class="row g-4">
                <div class="col-xl-4">
                    <div class="side-img">
                        <img class="img-fluid img" src="{{asset('/images/faq.svg')}}" alt="faq">
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="accordion accordion-flush help-accordion" id="accordionFlushExample">
                        @foreach($faqs as $key => $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{$faq->id}}" aria-expanded="false">
                                    {{$faq->qst}}
                                </button>
                            </h2>
                            <div id="flush-collapse{{$faq->id}}" class="accordion-collapse collapse @if($key == 0) show @endif"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    {{$faq->ans}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq section end -->

    @include('components.mobile-fix-menu');
@endsection