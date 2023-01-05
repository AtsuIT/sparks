@extends('layouts.vertical-master-layout')
@section('title'){{__('t-user-show')}} @endsection
@section('content')

{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') {{__('t-dashboard')}} @endslot
            @slot('title') {{__('t-user-show')}} @endslot
        @endcomponent
    @endsection


    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-username" placeholder="Enter User Name" class="form-control" name="name" value="{{$user->name}}" disabled autocomplete="name" autofocus>
        <label for="input-username" data-key="t-name">{{ __('Name') }}</label>
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>


    <div class="form-floating form-floating-custom mb-3">
        <input type="email" id="input-email" placeholder="Enter Email" disabled class="form-control" name="email" value="{{$user->email}}" autocomplete="email">
        <div class="invalid-feedback">
            Please Enter Email
        </div>
        <label for="input-email" data-key="t-email">{{ __('Email Address') }}</label>
        <div class="form-floating-icon">
            <i class="uil uil-envelope-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="password" id="input-password" placeholder="Enter password" class="form-control" disabled name="password" autocomplete="password">
        <div class="invalid-feedback">
            Please Enter password
        </div>
        <label for="input-password" data-key="t-password">{{ __('Password') }}</label>
        <div class="form-floating-icon">
            <i class="uil-key-skeleton-alt"></i>
        </div>
    </div>
    <div class="form-floating form-floating-custom mb-3">
        <input type="password" id="input-confirm-password" placeholder="Enter confirm password" disabled class="form-control" name="confirm_password" autocomplete="confirm_password">
        <div class="invalid-feedback">
            Please Enter confirm_password
        </div>
        <label for="input-confirm_password" data-key="t-password-confirmation">{{ __('Confirm Password') }}</label>
        <div class="form-floating-icon">
            <i class="uil-key-skeleton-alt"></i>
        </div>
    </div>

    <div class="mb-3">
        <select class="form-select" disabled name="roles" id="role">
        @foreach($roles as $role)
            <option value="{{$role->id}}" @if(@$userRole[0]->id == $role->id) selected @endif>{{$role->name}}</option>
        @endforeach
        </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a href="{{route('users')}}" class="btn btn-primary" data-key="t-back-home">Back</a>
    </div>
@endsection
@section('script')
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
