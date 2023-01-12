@extends('trackings.layouts-trackings.vertical-master-layout')
@section('title')Tracking Order @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Timeline @endslot
            @slot('title') Tracking Order @endslot
        @endcomponent
    @endsection
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div id="tracking-order">
                                {{-- <form method="POST">
                                    @csrf --}}
                                    <div class="form-group">
                                        <label>Sparks ID</label>
                                        <input type="text" class="form-control uuid" name="uuid" placeholder="Enter Your Sparks ID">
                                    </div>
                                    <div class="form-group mt-2">
                                        <button type="button" class="btn btn-primary track-result">Submit</button>
                                    </div>
                                {{-- </form> --}}
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
<script src="{{ URL::asset('js/scripts/tracking-results.js') }}"></script>

@endsection
