@extends('layouts.vertical-master-layout')
@section('title')Left Timeline @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Timeline @endslot
            @slot('title') Left Timeline @endslot
        @endcomponent
    @endsection
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="timeline-sec">
                            <div class="wrapper">
                                <div class="timeline-main">
                                    <div class="timeline-row">
                                        @foreach ($order->trackings as $key=>$tracking)
                                            <div class="timeline-box">
                                                <div class="timeline-date @if($key==0) bg-primary border-primary @else border @endif">
                                                    <div class="date text-center">
                                                        <h3 class="@if($key==0) text-white @endif mb-1 font-size-20">{{Carbon\Carbon::parse($tracking->created_at)->format('d H:i')}}</h3>
                                                        <p class="mb-0 d-none d-md-block @if($key==0) text-white-50 @else text-muted @endif">{{Carbon\Carbon::parse($tracking->created_at)->format('M')}}</p>
                                                    </div>
                                                </div>
                                                <div class="timeline-content">
                                                    <h3 class="font-size-18">{{$tracking->status_code}}</h3>
                                                    @if (App::getLocale()=="en")
                                                    <p class="text-muted mb-0 mt-2 pt-1">{{$tracking->description}}.
                                                    </p>
                                                    @else
                                                    <p class="text-muted mb-0 mt-2 pt-1">{{$tracking->description_ar}}.
                                                    </p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                        <div class="horizontal-line"></div>
                                        <div class="verticle-line"></div>
                                        <div class="corner top"></div>
                                        <div class="corner bottom"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end row -->

@endsection
@section('script')

<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
