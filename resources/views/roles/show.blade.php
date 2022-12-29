@extends('layouts.vertical-master-layout')
@section('title')Roles @endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') dashboard @endslot
@slot('title') role-show @endslot
@endcomponent
@endsection
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


    <div class="form-floating form-floating-custom mb-3">
        <input type="text" id="input-role-name" placeholder="Enter Role Name" value="{{$role->name}}" class="form-control" name="name" disabled autocomplete="name" autofocus>
        <label for="input-role-name">{{ __('Name') }}</label>
        <div class="form-floating-icon">
            <i class="uil uil-users-alt"></i>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            <br />
            @foreach($permission as $value)
            <label>
                <input type="checkbox" disabled @if(in_array($value->id,$rolePermissions)) checked @endif class="form-check-input" name="permission[]" value="{{$value->id}}">
                {{ $value->name }}</label>
            <br />
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a href="{{route('roles')}}" class="btn btn-primary" data-key="t-back-home">Back</a>
    </div>

@endsection
@section('script')

<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
