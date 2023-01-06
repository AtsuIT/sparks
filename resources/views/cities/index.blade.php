@extends('layouts.vertical-master-layout')
@section('title'){{__('t-cities')}} @endsection
@section('css')

@endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') {{__('t-dashboard')}} @endslot
@slot('title'){{__('t-cities')}} @endslot
@endcomponent
@endsection
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <span>{{ $message }}</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<table class="table table-bordered table-cities">
    <thead>
        <tr>
            <th>{{__('t-no')}}</th>
            <th>{{__('t-city_en')}}</th>
            <th>{{__('t-city_ar')}}</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

@endsection
@section('script')
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="{{ URL::asset('js/scripts/cities.js') }}"></script>

@endsection
