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
                            <h3>Users</h3>
                        </div>
                        <div class="row g-3">
                            @foreach($users as $user)
                            <div class="col-md-6">
                                <div class="address-box white-bg">
                                    <div class="address-title">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="ri-account-circle-fill icon"></i>
                                            <h6>{{$user->name}} ({{$user->type}})</h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">

                                        <a href="{{ route('admin.users.update') }}" onclick="event.preventDefault(); document.getElementById('update-user-form-{{$user->id}}').submit();" class="edit-btn">Mark As @if($user->type == 'User') Delivery Boy @elseif($user->type == 'Delivery Boy') Admin @else User @endif</a>

                                        <form id="update-user-form-{{$user->id}}" action="{{ route('admin.users.update') }}" method="POST" class="d-none">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <input type="hidden" name="type" value="@if($user->type == 'User') Delivery Boy @elseif($user->type == 'Delivery Boy') Admin @else User @endif">
                                        </form>


                                        <a id="delete-user" data-id="{{$user->id}}" data-name="{{$user->name}}" class="edit-btn">Delete</a>
                                        </div>
                                    </div>
                                    <div class="address-details d-flex justify-content-between">
                                        <h6>{{$user->email}}</h6>
                                        <h6>{{$user->phone}}</h6>
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

    <!-- delete user modal starts -->
    <div class="modal address-details-modal fade" id="delete-user-modal" tabindex="-1" aria-labelledby="deleteUserModalToggle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteUserModalToggle"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure, You want to delete this user?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{route('admin.categories.index')}}" class="btn gray-btn mt-0" data-bs-dismiss="modal">CANCEL</a>
                    <a href="{{ route('admin.categories.delete') }}" onclick="event.preventDefault(); document.getElementById('delete-user-form').submit();" class="btn theme-btn mt-0">Delete</a>

                    <form id="delete-user-form" action="{{ route('admin.users.delete') }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" class="form-control" id="delete-id" name="id">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- delete user modal end -->

    @include('components.location-modal')
    @include('components.mobile-fix-menu')

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){   
                $('body').on('click','#delete-user', function(){
                    $('#delete-id').val($(this).attr('data-id'));
                    $('#deleteUserModalToggle').text($(this).attr('data-name'));
                    $('#delete-user-modal').modal('show');
                });
            });
        </script>
    @endpush
@endsection
