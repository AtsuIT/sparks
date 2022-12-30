@extends('layouts.vertical-master-layout')
@section('title') Orders @endsection
@section('css')

<!-- quill css -->
<link href="{{ URL::asset('assets/libs/quill/quill.min.css') }}" rel="stylesheet">

@endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') dashboard @endslot
@slot('title')order-show @endslot
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
            <option value="">Choose a status</option>
            <option value="pending"@if($order->status == "pending") selected @endif>pending</option>
            <option value="done"@if($order->status == "done") selected @endif>done</option>
            <option value="failed"@if($order->status == "failed") selected @endif>failed</option>
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
<!-- quill js -->
<script src="{{ URL::asset('assets/libs/quill/quill.min.js') }}"></script>
<!-- init js -->
<script src="{{ URL::asset('assets/js/pages/form-editor.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
