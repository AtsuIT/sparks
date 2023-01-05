@extends('layouts.vertical-master-layout')
@section('title'){{__('t-role-new')}} @endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') {{__('t-dashboard')}} @endslot
@slot('title') {{__('t-role-new')}} @endslot
@endcomponent
@endsection
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<form method="POST" action="{{route('store-roles')}}" class="mt-4 pt-2">
    @csrf
    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-username" placeholder="Enter User Name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
        <label for="input-username">{{ __('Name') }}</label>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            @error('permission')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br />
            @foreach($permission as $value)
            <label>
                <input type="checkbox" class="form-check-input @error('permission') is-invalid @enderror" name="permission[]" value="{{$value->id}}">
                {{ $value->name }}</label>
            <br />
            @endforeach
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary" data-key="t-submit">Submit</button>
    </div>
</form><!-- end form -->


@endsection
@section('script')

<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
