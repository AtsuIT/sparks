@extends('layouts.vertical-master-layout')
@section('title'){{__('t-update-profile')}} @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
@endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') {{__('t-user-settings')}} @endslot
            @slot('title') {{__('t-update-profile')}} @endslot
        @endcomponent
    @endsection
<div class="row">
    <div class="col-xxl-3 col-lg-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="user-profile-img">
                    <img src="{{URL::asset('assets/images/pattern-bg.jpg')}}" class="profile-img profile-foreground-img rounded-top" style="height: 120px;" alt="">
                    <div class="overlay-content rounded-top">
                        <div>
                            <div class="user-nav p-3">
                                <div class="d-flex justify-content-end">
                                    {{-- <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal font-size-20 text-white"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#">Something else
                                                    here</a></li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end user-profile-img -->

                <div class="mt-n5 position-relative">
                    <div class="text-center">
                        <img src="{{URL::asset('uploads/avatars/'.$user->avatar)}}" alt="" class="avatar-xl rounded-circle img-thumbnail">

                        <div class="mt-3">
                            <h5 class="mb-1">{{$user->name}}</h5>
                            {{-- <div>
                                <a href="#" class="badge badge-soft-success m-1">UX Research</a>


                                <a href="#" class="badge badge-soft-success m-1">Project Management</a>
                                <a href="#" class="badge badge-soft-success m-1">CX Strategy</a>
                            </div>

                            <div class="mt-4">
                                <a href="" class="btn btn-primary waves-effect waves-light btn-sm"><i class="bx bx-send me-1 align-middle"></i> Send Message</a>
                            </div> --}}
                        </div>

                    </div>
                </div>

                {{-- <div class="p-3 mt-3 border-bottom">
                    <div class="row text-center">
                        <div class="col-6 border-end">
                            <div class="p-1">
                                <h5 class="mb-1">3,658</h5>
                                <p class="text-muted mb-0">Products</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-1">
                                <h5 class="mb-1">6.8k</h5>
                                <p class="text-muted mb-0">Followers</p>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="p-4 mt-2">
                    <h5 class="font-size-16" data-key="t-info">Info :</h5>

                    <div class="mt-4">
                        <p class="text-muted mb-1" data-key="t-name">Name :</p>
                        <h5 class="font-size-14 text-truncate">{{$user->name}}</h5>
                    </div>

                    <div class="mt-4">
                        <p class="text-muted mb-1" data-key="t-email">E-mail :</p>
                        <h5 class="font-size-14 text-truncate">{{$user->email}}</h5>
                    </div>

                    {{-- <div class="mt-4">
                        <p class="text-muted mb-1">Location :</p>
                        <h5 class="font-size-14 text-truncate">California, United States</h5>
                    </div> --}}
                </div>

            </div>
            <!-- end card body -->
        </div>
    </div>
    <!-- end col -->

    <div class="col-xxl-9 col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4" data-key="t-settings">Setting</h5>
                <form method="POST" action="{{route('users-update-profile',$user->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card border shadow-none mb-5">
                        <div class="card-header d-flex align-items-center">
                            {{-- <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        01
                                    </div>
                                </div>
                            </div> --}}
                            <div class="flex-grow-1">
                                <h5 class="card-title" data-key="t-general-info">General Info</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="gen-info-name-input" data-key="t-name">Name</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="gen-info-name-input" required value="{{$user->name}}" placeholder="Enter Name">
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="gen-info-email-input" data-key="t-email">Email</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="gen-info-email-input" required value="{{$user->email}}" placeholder="Enter Email">
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="gen-info-avatar-input" data-key="t-avatar">Image</label>
                                            <input type="file" name="avatar" class="form-control" id="gen-info-avatar-input" >
                                        </div>
                                    </div>
                                    
                                </div>

                                {{-- <div class="mb-3">
                                    <label class="form-label" for="gen-info-description-input">Description</label>
                                    <textarea class="form-control" placeholder="Enter Description" id="gen-info-description-input" rows="3"></textarea>
                                </div> --}}

                                <div class="form-check mb-3" data-bs-toggle="collapse" data-bs-target="#collapseChangePassword" aria-expanded="false" aria-controls="collapseChangePassword">
                                    <input type="checkbox" class="form-check-input" id="gen-info-change-password">
                                    <label class="form-check-label" for="gen-info-change-password" data-key="t-change-password">
                                        Change passowrd?
                                    </label>
                                </div>

                                <div class="collapse @error('password') show @enderror" id="collapseChangePassword">
                                    <div class="card border shadow-none card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-lg-0">
                                                    <label for="current-password-input" class="form-label" data-key="t-current-password">Current password</label>
                                                    <input type="password" name="old_password" class="form-control" placeholder="{{__('t-current-password')}}" id="current-password-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-lg-0">
                                                    <label for="new-password-input" class="form-label" data-key="t-new-password">New password</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{__('t-new-password')}}" id="new-password-input">
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" style="display: block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-lg-0">
                                                    <label for="confirm-password-input" class="form-label" data-key="t-password-confirmation">Confirm password</label>
                                                    <input type="password" name="confirm_password" class="form-control" placeholder="{{__('t-password-confirmation')}}" id="confirm-password-input">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    {{-- <div class="card border shadow-none mb-5">
                        <div class="card-header d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        02
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title">Contact Info</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="contact-info-email-input">E-mail :</label>
                                <input type="email" class="form-control" id="contact-info-email-input" placeholder="Enter Email">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-md-0">
                                        <label for="contact-info-website-input" class="form-label">Website</label>
                                        <input type="url" class="form-control" placeholder="Enter website url" id="contact-info-website-input">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-md-0">
                                        <label for="contact-info-location-input" class="form-label">Location</label>
                                        <input type="url" class="form-control" placeholder="Enter Address" id="contact-info-location-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- end card -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary w-sm" data-key="t-submit">Submit</button>
                    </div>
                </form>
                <!-- end form -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection
@section('script')

<!-- plugins -->
<script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<!-- init js -->
<script src="{{ URL::asset('assets/js/pages/user-settings.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
