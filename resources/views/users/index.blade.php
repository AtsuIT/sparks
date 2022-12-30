@extends('layouts.vertical-master-layout')
@section('title')Users @endsection
@section('css')

@endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') dashboard @endslot
@slot('title') users @endslot
@endcomponent
@endsection
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <span>{{ $message }}</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('users-create') }}" data-key="t-user-new"> Create New User</a>
</div>
<table class="table table-users">
    <thead>
        <tr>
            <th scope="col" data-key="t-no">No</th>
            <th scope="col" data-key="t-name">Name</th>
            <th scope="col" data-key="t-email">Email</th>
            <th scope="col" data-key="t-action">Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

@endsection
@section('script')
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="{{ URL::asset('js/scripts/users.js') }}"></script>

@endsection
