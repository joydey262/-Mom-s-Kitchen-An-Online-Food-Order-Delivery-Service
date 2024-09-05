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
                            <h3>Messages</h3>
                        </div>
                        <div class="row g-3">
                            @foreach($messages as $message)
                            <div class="col-md-6">
                                <div class="address-box white-bg">
                                    <div class="address-title">
                                        <div class="d-flex align-items-center gap-2">
                                            <h6>{{$message->first_name}} {{$message->last_name}}</h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                        <a id="reply-msg" data-id="{{$message->id}}" data-msg="{{$message->msg}}" data-reply="{{$message->reply}}" class="edit-btn">Reply</a>

                                        <a id="delete-message" data-id="{{$message->id}}" data-qst="{{$message->qst}}" class="edit-btn">Delete</a>
                                        </div>
                                    </div>
                                    <div class="address-details">
                                        <div class="d-flex justify-content-between mb-2">
                                        <h6>{{$message->email}}</h6>
                                        <h6>{{$message->phone}}</h6>
                                        </div>
                                        <div class="border p-2 rounded">
                                            <h6 class="text-center theme-color">Message:</h6>
                                            <p>{{$message->msg}}</p>
                                            <h6 class="text-center theme-color">Reply:</h6>
                                            <p>{{$message->reply}}</p>
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

    <!-- reply message modal starts -->
    <div class="modal profile-modal fade" id="reply-msg-modal" aria-hidden="true" aria-labelledby="replyMsgModalToggle"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="replyMsgModalToggle">Reply Message</h1>
                </div>
                <form method="POST" action="{{ route('admin.messages.reply') }}">
                    @csrf
                    @method('PUT')
                    <input type="number" class="form-control d-none" id="reply-id" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="reply-message" class="form-label">Message</label>
                            <textarea name="msg" class="form-control" id="reply-message" readonly></textarea>
                        </div>

                        <div class="form-group mt-2">
                            <label for="reply" class="form-label">Reply</label>
                            <textarea name="reply" class="form-control" placeholder="Enter your reply" id="reply" required></textarea>
                        </div>

                        @error('reply')
                            <span class="theme-color mt-2">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-2">
                            This reply will be sent by email.
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn theme-btn">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- reply message modal end -->

    <!-- delete message modal starts -->
    <div class="modal address-details-modal fade" id="delete-message-modal" tabindex="-1" aria-labelledby="deleteMessageModalToggle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteMessageModalToggle">Delete Message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure, You want to delete this message?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{route('admin.messages.index')}}" class="btn gray-btn mt-0" data-bs-dismiss="modal">CANCEL</a>
                    <a href="{{ route('admin.messages.delete') }}" onclick="event.preventDefault(); document.getElementById('delete-message-form').submit();" class="btn theme-btn mt-0">Delete</a>

                    <form id="delete-message-form" action="{{ route('admin.messages.delete') }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                        <input type="number" class="form-control" id="delete-id" name="id">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- delete message modal end -->

    @include('components.mobile-fix-menu')

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){   
                $('body').on('click','#reply-msg', function(){
                    $('#reply-id').val($(this).attr('data-id'));
                    $('#reply-message').val($(this).attr('data-msg'));
                    $('#reply').val($(this).attr('data-reply'));
                    $('#reply-msg-modal').modal('show');
                });

                $('body').on('click','#delete-message', function(){
                    $('#delete-id').val($(this).attr('data-id'));
                    $('#delete-message-modal').modal('show');
                });
            });
        </script>
    @endpush
@endsection

