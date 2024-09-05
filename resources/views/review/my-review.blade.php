@extends('layouts.guest')

@section('content')
    <!-- page head section starts -->
    <section class="page-head-section">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">My Review</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="{{route('welcome')}}"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">My Review</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- page head section end -->

    <!-- profile section starts -->
    <section class="profile-section section-b-space">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-3">
                    @include('components.profile');
                </div>
                <div class="col-lg-9">
                    <div class="change-profile-content">
                        <div class="title">
                            <div class="loader-line"></div>
                            <h3>My Review</h3>
                        </div>
                        <div class="row g-md-4 g-3">
                            @foreach($products as $product)
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="vertical-product-box">
                                    <div class="vertical-product-box-img">
                                        <a href="/items/{{$product->item->slug}}">
                                            <img class="vertical-product-img-top w-100" src="{{asset('/storage/item/'.$product->item->img)}}" alt="vp-2">
                                        </a>
                                        <div class="offers">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h4>{{$product->item->discount}}% OFF</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vertical-product-body">
                                        <div class="d-flex align-items-center justify-content-between mt-sm-3 mt-2">
                                            <a href="/items/{{$product->item->slug}}">
                                                <h4 class="vertical-product-title">{{$product->name}}</h4>
                                            </a>
                                            <h6 class="rating-star">
                                                <span class="star"><i class="ri-star-s-fill"></i></span>{{$product->item->reviews()->avg('rating')}}
                                            </h6>
                                        </div>
                                        <h5 class="product-items">{!!Str::limit($product->item->desc, 30, '...')!!}</h5>
                                        <div class="location-distance d-flex align-items-center justify-content-between pt-sm-3 pt-2">
                                            <ul class="distance">
                                                <li><i class="ri-map-pin-fill icon"></i> {{$product->price}} BDT</li>
                                                @if(!$product->review)
                                                <li>
                                                <a id="add-review" data-id="{{$product->id}}" class="btn theme-outline mt-0">Add New Review</a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile section end -->

    <!-- add review modal starts -->
    <div class="modal profile-modal fade" id="review-modal" aria-hidden="true" aria-labelledby="exampleModalToggleName"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalToggleName">Add New Review</h1>
                </div>
                <form method="POST" action="{{ route('store.review') }}">
                    @csrf
                    <input type="number" class="form-control d-none" id="id" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rating" class="form-label">Rating</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" placeholder="Enter product rating" required>
                        </div>

                        @error('rating')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="review" class="form-label">Review</label>
                            <div id="editor"></div>
                            <textarea name="review" id="review" class="form-control d-none" placeholder="Enter product review" required></textarea>
                        </div>

                        @error('review')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn theme-btn">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- add review modal end -->

    @include('components.logout-modal')
    @include('components.mobile-fix-menu')

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
        <script>
            $(document).ready(function(){

                ClassicEditor
                .create( document.querySelector('#editor') )
                .then(editor => {
                    editor.model.document.on('change:data', () => {
					    $('#review').val(editor.getData());
                    })
                })
                .catch( error => {
                    console.error( error );
                } );

                $('body').on('click','#add-review', function(){
                    $('#id').val($(this).attr('data-id'));
                    $('#review-modal').modal('show');
                });


            });
        </script>
    @endpush
@endsection