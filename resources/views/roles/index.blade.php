@extends('layouts.vertical-master-layout')
@section('title')Roles @endsection
@section('css')

@endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') dashboard @endslot
@slot('title'){{__('t-roles')}} @endslot
@endcomponent
@endsection
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <span>{{ $message }}</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('create-roles') }}" data-key="t-role-new"> Create New Role</a>
</div>
<table class="table table-bordered table-roles">
    <thead>
        <tr>
            <th data-key="t-no">No</th>
            <th data-key="t-name">Name</th>
            <th width="280px" data-key="t-action">Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

@endsection
@section('script')
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="{{ URL::asset('js/scripts/roles.js') }}"></script>
@endsection
