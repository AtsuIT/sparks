@extends('layouts.vertical-master-layout')
@section('title'){{__('t-orders')}} @endsection
@section('css')

@endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') {{__('t-dashboard')}} @endslot
@slot('title'){{__('t-orders')}} @endslot
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
            <th>{{__('t-no')}}</th>
            <th>{{__('t-uuid')}}</th>
            <th>{{__('t-name')}}</th>
            <th>{{__('t-status')}}</th>
            <th width="280px">{{__('t-action')}}</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

@endsection
@section('script')
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="{{ URL::asset('js/scripts/orders.js') }}"></script>

@endsection
