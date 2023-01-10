@extends('layouts.vertical-master-layout')
@section('title'){{__('t-address-show')}} @endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') {{__('t-dashboard')}} @endslot
@slot('title') {{__('t-address-show')}} @endslot
@endcomponent
@endsection

    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-title" placeholder="Enter Title" value="{{$address->title}}" class="form-control" name="title" disabled autocomplete="title" autofocus>
        <label for="input-title" data-key="t-title">{{ __('Title') }}</label>

        <div class="form-floating-icon">
            <i class="uil uil-location-point"></i>
        </div>
    </div>
    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-username" placeholder="Enter Name" value="{{$address->name}}" class="form-control" name="name" disabled autocomplete="name" autofocus>
        <label for="input-username" data-key="t-name">{{ __('Name') }}</label>
        
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="email" id="input-email" placeholder="Enter Email" value="{{$address->email}}" class="form-control" name="email" disabled autocomplete="email" autofocus>
        <label for="input-email" data-key="t-email">{{ __('Email') }}</label>
        
        <div class="form-floating-icon">
            <i class="uil uil-fast-mail-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-city" placeholder="Enter City" value="{{$address->city}}" class="form-control" name="city" disabled autocomplete="city" autofocus>
        <label for="input-city" data-key="t-city">{{ __('City') }}</label>
        
        <div class="form-floating-icon">
            <i class="uil uil-location-point"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-address" placeholder="Enter Address" value="{{$address->address}}" class="form-control" name="address" disabled autocomplete="address" autofocus>
        <label for="input-address" data-key="t-addres">{{ __('Address') }}</label>
        
        <div class="form-floating-icon">
            <i class="uil uil-map-marker-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-neighbourhood" placeholder="Enter Neighbourhood" value="{{$address->neighbourhood}}" class="form-control" name="neighbourhood" disabled autocomplete="neighbourhood" autofocus>
        <label for="input-neighbourhood" data-key="t-neighbourhood">{{ __('Neighbourhood') }}</label>
        
        <div class="form-floating-icon">
            <i class="uil uil-map-marker-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-phone" placeholder="Enter Phone" value="{{$address->phone}}" class="form-control" name="phone" disabled autocomplete="phone" autofocus>
        <label for="input-phone" data-key="t-phone">{{ __('Phone') }}</label>
       
        <div class="form-floating-icon">
            <i class="uil uil-phone-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-country" placeholder="Enter Country" value="{{$address->country}}" class="form-control" name="country" disabled autocomplete="country" autofocus>
        <label for="input-country" data-key="t-country">{{ __('Country') }}</label>
       
        <div class="form-floating-icon">
            <i class="uil uil-location-point"></i>
        </div>
    </div>
    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-postcode" disabled placeholder="Enter Postcode" value="{{$address->postcode}}" class="form-control" name="postcode" autocomplete="postcode" autofocus>
        <label for="input-postcode" data-key="t-postcode">{{ __('Postcode') }}</label>
        <div class="form-floating-icon">
            <i class="uil uil-postcard"></i>
        </div>
    </div>
    
    <div class="form-floating form-floating-custom mb-3">
        <textarea id="ckeditor-classic" disabled placeholder="Enter Description" class="form-control" name="description" autocomplete="description" autofocus>{!!$address->description!!}</textarea>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a href="{{route('address')}}" class="btn btn-primary" data-key="t-back-home">Back</a>
    </div>
@endsection
@section('script')
<!-- ckeditor -->
<script src="{{ URL::asset('assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>
<!-- init js -->
<script src="{{ URL::asset('assets/js/pages/form-editor.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
