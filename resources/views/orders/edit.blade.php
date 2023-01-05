@extends('layouts.vertical-master-layout')
@section('title'){{__('t-order-edit')}} @endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') dashboard @endslot
@slot('title') {{__('t-order-edit')}} @endslot
@endcomponent
@endsection
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<form action="{{route('update-orders',$order->id)}}" method="POST" class="mt-4 pt-2">
    @csrf
    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-username" placeholder="Enter User Name" value="{{$order->name}}" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
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
        <textarea id="ckeditor-classic" placeholder="Enter Description" class="form-control" name="description" autocomplete="description" autofocus>{!!$order->description!!}</textarea>
    </div>

    <div class="mb-3">
        <select class="form-select @error('status') is-invalid @enderror" required name="status">
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
