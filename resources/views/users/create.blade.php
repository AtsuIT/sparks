@extends('layouts.vertical-master-layout')
@section('title'){{__('t-user-new')}} @endsection
@section('content')

{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') {{__('t-dashboard')}} @endslot
            @slot('title') {{__('t-user-new')}} @endslot
        @endcomponent
    @endsection

<form method="POST" action="{{route('user-store')}}" class="mt-4 pt-2">
    @csrf
    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-username" placeholder="Enter User Name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
        <label for="input-username" data-key="t-name">{{ __('Name') }}</label>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="email" id="input-email" placeholder="Enter Email" value="{{old('email')}}" required class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">
        <div class="invalid-feedback">
            Please Enter Email
        </div>
        <label for="input-email" data-key="t-email">{{ __('Email Address') }}</label>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-floating-icon">
            <i class="uil uil-envelope-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="password" id="input-password" placeholder="Enter password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
        <div class="invalid-feedback">
            Please Enter password
        </div>
        <label for="input-password" data-key="t-password">{{ __('Password') }}</label>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-floating-icon">
            <i class="uil-key-skeleton-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="password" id="input-confirm-password" placeholder="Enter confirm password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required autocomplete="confirm_password">
        <div class="invalid-feedback">
            Please Enter confirm_password
        </div>
        <label for="input-confirm_password" data-key="t-password-confirmation">{{ __('Confirm Password') }}</label>
        @error('confirm_password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-floating-icon">
            <i class="uil-key-skeleton-alt"></i>
        </div>
    </div>

    <div class="mb-3">
        <select class="form-select @error('roles') is-invalid @enderror" required name="roles" id="role">
        <option data-key="t-choose-role" value="">Choose a role</option>
        @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
        </select>
        @error('roles')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary" data-key="t-submit">Submit</button>
    </div>
</form><!-- end form -->
@endsection
@section('script')
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
