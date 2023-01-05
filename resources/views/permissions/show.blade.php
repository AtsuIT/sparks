@extends('layouts.vertical-master-layout')
@section('title') {{__('t-permission-show')}} @endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') {{__('t-dashboard')}} @endslot
@slot('title'){{__('t-permission-show')}}@endslot
@endcomponent
@endsection
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-username" placeholder="Enter User Name" value="{{$permission->name}}" class="form-control" name="name" disabled autocomplete="name" autofocus>
        <label for="input-username" data-key="t-name">{{ __('Name') }}</label>
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a href="{{route('permissions')}}" class="btn btn-primary" data-key="t-back-home">Back</a>
    </div>

@endsection
@section('script')

<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
