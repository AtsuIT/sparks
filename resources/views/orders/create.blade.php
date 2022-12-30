@extends('layouts.vertical-master-layout')
@section('title')Create Order @endsection
@section('css')

<!-- quill css -->
<link href="{{ URL::asset('assets/libs/quill/quill.min.css') }}" rel="stylesheet">

@endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') dashboard @endslot
@slot('title') order-new @endslot
@endcomponent
@endsection
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<form method="POST" action="{{route('store-orders')}}" class="mt-4 pt-2">
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
        <textarea id="ckeditor-classic" placeholder="Enter Description" class="form-control" name="description" autocomplete="description" autofocus></textarea>
    </div>

    <div class="mb-3">
        <select class="form-select @error('status') is-invalid @enderror" required name="status">
            <option value="">Choose a status</option>
            <option value="pending">pending</option>
            <option value="done">done</option>
            <option value="failed">failed</option>
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
</form><!-- end form -->


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
