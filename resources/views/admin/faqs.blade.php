@extends('layouts.app')

@section('content')
    <!-- profile section starts -->
    <section class="profile-section section-b-space">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-12">
                    <div class="address-section bg-color h-100 mt-0">
                        <div class="title">
                            <div class="loader-line"></div>
                            <h3>FAQs</h3>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="address-box white-bg new-address-box white-bg">
                                    <a href="#add-faq" class="btn new-address-btn theme-outline rounded-2 mt-0"
                                        data-bs-toggle="modal">Add New FAQ</a>
                                </div>
                            </div>
                            @foreach($faqs as $faq)
                            <div class="col-md-6">
                                <div class="address-box white-bg">
                                    <div class="address-title">
                                        <div class="d-flex align-items-center gap-2">
                                            <h6>{{$faq->status}}</h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                        <a id="edit-faq" data-id="{{$faq->id}}" data-qst="{{$faq->qst}}" data-ans="{{$faq->ans}}" data-status="{{$faq->status}}" class="edit-btn">Edit</a>
                                        <a id="delete-faq" data-id="{{$faq->id}}" data-qst="{{$faq->qst}}" class="edit-btn">Delete</a>
                                        </div>
                                    </div>
                                    <div class="address-details">
                                        <div class="accordion accordion-flush help-accordion" id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapse{{$faq->id}}" aria-expanded="false">
                                                        {{$faq->qst}}
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse{{$faq->id}}" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        {{$faq->ans}}
                                                    </div>
                                                </div>
                                            </div>
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

    <!-- add faq modal starts -->
    <div class="modal profile-modal fade" id="add-faq" aria-hidden="true" aria-labelledby="addFaqModalToggle"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="addFaqModalToggle">Add New Faq</h1>
                </div>
                <form method="POST" action="{{ route('admin.faqs.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="qst" class="form-label">Question</label>
                            <input type="text" class="form-control" id="qst" name="qst" value="{{old('qst')}}" placeholder="Enter your question" required>
                        </div>

                        @error('qst')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="ans" class="form-label">Answer</label>
                            <textarea name="ans" class="form-control" placeholder="Enter your answer" id="ans" required></textarea>
                        </div>

                        @error('ans')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        @error('status')
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
    <!-- add faq modal end -->

    <!-- edit faq modal starts -->
    <div class="modal profile-modal fade" id="edit-faq-modal" aria-hidden="true" aria-labelledby="editFaqModalToggle"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="editFaqModalToggle">Edit Faq</h1>
                </div>
                <form method="POST" action="{{ route('admin.faqs.update') }}">
                    @csrf
                    @method('PUT')
                    <input type="number" class="form-control d-none" id="edit-id" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-qst" class="form-label">Question</label>
                            <input type="text" class="form-control" id="edit-qst" name="qst" value="{{old('qst')}}" placeholder="Enter your question" required>
                        </div>

                        @error('qst')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="edit-ans" class="form-label">Answer</label>
                            <textarea name="ans" class="form-control" placeholder="Enter your answer" id="edit-ans" required></textarea>
                        </div>

                        @error('ans')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            <label for="edit-status" class="form-label">Status</label>
                            <select class="form-control" name="status" id="edit-status" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        @error('status')
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
    <!-- edit faq modal end -->

    <!-- delete faq modal starts -->
    <div class="modal address-details-modal fade" id="delete-faq-modal" tabindex="-1" aria-labelledby="deleteFaqModalToggle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteFaqModalToggle"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure, You want to delete this faq?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{route('admin.faqs.index')}}" class="btn gray-btn mt-0" data-bs-dismiss="modal">CANCEL</a>
                    <a href="{{ route('admin.faqs.delete') }}" onclick="event.preventDefault(); document.getElementById('delete-faq-form').submit();" class="btn theme-btn mt-0">Delete</a>

                    <form id="delete-faq-form" action="{{ route('admin.faqs.delete') }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                        <input type="number" class="form-control" id="delete-id" name="id">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- delete faq modal end -->
     
    @include('components.mobile-fix-menu')

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){   
                $('body').on('click','#edit-faq', function(){
                    $('#edit-id').val($(this).attr('data-id'));
                    $('#edit-qst').val($(this).attr('data-qst'));
                    $('#edit-ans').val($(this).attr('data-ans'));
                    $('#edit-status').val($(this).attr('data-status'));
                    $('#edit-faq-modal').modal('show');
                });

                $('body').on('click','#delete-faq', function(){
                    $('#delete-id').val($(this).attr('data-id'));
                    $('#deleteFaqModalToggle').text($(this).attr('data-qst'));
                    $('#delete-faq-modal').modal('show');
                });
            });
        </script>
    @endpush
@endsection

