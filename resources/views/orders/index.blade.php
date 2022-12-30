@extends('layouts.vertical-master-layout')
@section('title')Orders @endsection
@section('css')

@endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') dashboard @endslot
@slot('title')orders @endslot
@endcomponent
@endsection
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <span>{{ $message }}</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('create-orders') }}" data-key="t-order-new"> Create New Order</a>
</div>
<table class="table table-bordered table-orders">
    <thead>
        <tr>
            <th data-key="t-no">No</th>
            <th data-key="t-name">Name</th>
            <th data-key="t-staus">Status</th>
            <th width="280px" data-key="t-action">Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

@endsection
@section('script')
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="{{ URL::asset('assets/libs/scripts/orders.js') }}"></script>

@endsection
