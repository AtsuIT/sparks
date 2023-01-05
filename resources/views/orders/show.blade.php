@extends('layouts.vertical-master-layout')
@section('title') {{__('t-order-show')}} @endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') {{__('t-dashboard')}} @endslot
@slot('title') {{__('t-order-show')}} @endslot
@endcomponent
@endsection
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-username" placeholder="Enter User Name" value="{{$order->name}}" class="form-control" name="name" disabled autocomplete="name" autofocus>
        <label for="input-username" data-key="t-name">{{ __('Name') }}</label>
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>

    <div class="form-floating form-floating-custom mb-3">
        <textarea id="ckeditor-classic" disabled placeholder="Enter Description" class="form-control" name="description" autocomplete="description" autofocus>{!!$order->description!!}</textarea>
    </div>

    <div class="mb-3">
        <select class="form-select @error('status') is-invalid @enderror" disabled name="status">
            <option value="" data-key="choose-status">Choose a status</option>
            <option value="Processing"@if($order->status == "Processing") selected @endif>Processing</option>
            <option value="Completed"@if($order->status == "Completed") selected @endif>Completed</option>
            <option value="Cancel"@if($order->status == "Cancel") selected @endif>Cancel</option>
        </select>
        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a href="{{route('orders')}}" class="btn btn-primary" data-key="t-back-home">Back</a>
    </div>

@endsection
@section('script')
<!-- ckeditor -->
<script src="{{ URL::asset('assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>
<!-- init js -->
<script src="{{ URL::asset('assets/js/pages/form-editor.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
