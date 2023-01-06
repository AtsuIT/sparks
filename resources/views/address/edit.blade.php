@extends('layouts.vertical-master-layout')
@section('title'){{__('t-address-edit')}} @endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') {{__('t-dashboard')}} @endslot
@slot('title') {{__('t-address-edit')}} @endslot
@endcomponent
@endsection
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<form action="{{route('update-address',$address->id)}}" method="POST" class="mt-4 pt-2">
    @csrf

    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-title" placeholder="Enter Title" value="{{$address->title}}" class="form-control @error('title') is-invalid @enderror" name="title" required autocomplete="title" autofocus>
        <label for="input-title" data-key="t-title">{{ __('Title') }}</label>
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>
    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-username" placeholder="Enter Name" value="{{$address->name}}" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
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
        <input type="email" id="input-email" placeholder="Enter Email" value="{{$address->email}}" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>
        <label for="input-email" data-key="t-email">{{ __('Email') }}</label>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-city" placeholder="Enter City" value="{{$address->city}}" class="form-control @error('city') is-invalid @enderror" name="city" required autocomplete="city" autofocus>
        <label for="input-city" data-key="t-city">{{ __('City') }}</label>
        @error('city')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-address" placeholder="Enter Address" value="{{$address->address}}" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" autofocus>
        <label for="input-address" data-key="t-address">{{ __('Address') }}</label>
        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-neighbourhood" placeholder="Enter Neighbourhood" value="{{$address->neighbourhood}}" class="form-control @error('neighbourhood') is-invalid @enderror" name="neighbourhood" required autocomplete="neighbourhood" autofocus>
        <label for="input-neighbourhood" data-key="t-neighbourhood">{{ __('Neighbourhood') }}</label>
        @error('neighbourhood')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-phone" placeholder="Enter Phone" value="{{$address->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone" autofocus>
        <label for="input-phone" data-key="t-phone">{{ __('Phone') }}</label>
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-country" placeholder="Enter Country" value="{{$address->country}}" class="form-control @error('country') is-invalid @enderror" name="country" required autocomplete="country" autofocus>
        <label for="input-country" data-key="t-country">{{ __('Country') }}</label>
        @error('country')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>
    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-postcode" placeholder="Enter Postcode" value="{{$address->postcode}}" class="form-control" name="postcode" autocomplete="postcode" autofocus>
        <label for="input-postcode" data-key="t-postcode">{{ __('Postcode') }}</label>
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>
    
    <div class="form-floating form-floating-custom mb-3">
        <textarea id="ckeditor-classic" placeholder="Enter Description" class="form-control" name="description" autocomplete="description" autofocus>{!!$address->description!!}</textarea>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary" data-key="t-submit">Submit</button>
    </div>
</form>

@endsection
@section('script')
<!-- ckeditor -->
<script src="{{ URL::asset('assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>
<!-- init js -->
<script src="{{ URL::asset('assets/js/pages/form-editor.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
