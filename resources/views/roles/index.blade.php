@extends('layouts.vertical-master-layout')
@section('title'){{__('t-roles')}} @endsection
@section('css')

@endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') {{__('t-dashboard')}} @endslot
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
            <th>{{__('t-no')}}</th>
            <th>{{__('t-name')}}</th>
            <th width="280px">{{__('t-action')}}</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

@endsection
@section('script')
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script>
    var roleDelete = "<?= Lang::get('t-role-delete') ?>";
    var roleSafe = "<?= Lang::get('t-role-safe') ?>";
</script> 
<script src="{{ URL::asset('js/scripts/roles.js') }}"></script>
@endsection
