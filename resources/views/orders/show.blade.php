@extends('layouts.vertical-master-layout')
@section('title') {{__('t-order-show')}} @endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') {{__('t-dashboard')}} @endslot
@slot('title') {{__('t-order-show')}} @endslot
@endcomponent
@endsection
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-customer_name-input">Customer Name</label>
            <input type="text" class="form-control" value="{{$order->customer_name}}" disabled name="customer_name" id="formrow-customer_name-input" placeholder="Enter Customer Name">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-requested_by-input">Requested By</label>
            <input type="text" class="form-control" value="{{$order->requested_by}}" disabled name="requested_by" id="formrow-requested_by-input" placeholder="Enter Requested By">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-cod_amount-input">Code Amount</label>
            <input type="text" class="form-control" value="{{$order->cod_amount}}" disabled name="cod_amount" id="formrow-cod_amount-input" placeholder="Enter Code Amount">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-declared_value-input">Declared Value</label>
            <input type="text" class="form-control" value="{{$order->declared_value}}" disabled name="declared_value" id="formrow-declared_value-input" placeholder="Enter Declared Value">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-currency-input">Currency</label>
            <input type="text" class="form-control" value="{{$order->currency}}" disabled name="currency" id="formrow-currency-input" placeholder="Enter Currency">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_name-input">Delivery Name</label>
            <input type="text" class="form-control" value="{{$order->delivery_name}}" disabled name="delivery_name" id="formrow-delivery_name-input" placeholder="Enter Delivery Name">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_email-input">Delivery Email</label>
            <input type="email" class="form-control" value="{{$order->delivery_email}}" disabled name="delivery_email" id="formrow-delivery_email-input" placeholder="Enter Delivery Email">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_city-input">Delivery City</label>
            <input type="text" class="form-control" value="{{$order->delivery_city}}" disabled name="delivery_city" id="formrow-delivery_city-input" placeholder="Enter Delivery City">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">   
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_address-input">Delivery Address</label>
            <input type="text" class="form-control" value="{{$order->delivery_address}}" disabled name="delivery_address" id="formrow-delivery_address-input" placeholder="Enter Delivery Address">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_neighbourhood-input">Delivery Neighbourhood</label>
            <input type="text" class="form-control" value="{{$order->delivery_neighbourhood}}" disabled name="delivery_neighbourhood" id="formrow-delivery_neighbourhood-input" placeholder="Enter Delivery Neighbourhood">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">  
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_postcode-input">Delivery Postcode</label>
            <input type="text" class="form-control" disabled name="delivery_postcode" id="formrow-delivery_postcode-input" value="{{$order->delivery_postcode}}" placeholder="Enter Delivery Postcode">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_country-input">Delivery Country</label>
            <input type="text" class="form-control" value="{{$order->delivery_country}}" disabled name="delivery_country" id="formrow-delivery_country-input" placeholder="Enter Delivery Country">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">    
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_phone-input">Delivery Phone</label>
            <input type="text" class="form-control" value="{{$order->delivery_phone}}" disabled name="delivery_phone" id="formrow-delivery_phone-input" placeholder="Enter Delivery Phone">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_description-input">Delivery Description</label>
            <textarea id="formrow-delivery_description-input" disabled placeholder="Enter Delivery Description" class="form-control" name="delivery_description" autocomplete="delivery_description" autofocus>{{$order->delivery_description}}</textarea>
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">    
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_name-input">Collection Name</label>
            <input type="text" class="form-control" value="{{$order->collection_name}}" disabled name="collection_name" id="formrow-collection_name-input" placeholder="Enter Collection Name">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_email-input">Collection Email</label>
            <input type="email" class="form-control" value="{{$order->collection_email}}" disabled name="collection_email" id="formrow-collection_email-input" placeholder="Enter Collection Email">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_city-input">Collection City</label>
            <input type="text" class="form-control" value="{{$order->collection_city}}" disabled name="collection_city" id="formrow-collection_city-input" placeholder="Enter Collection City">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_address-input">Collection Address</label>
            <input type="text" class="form-control" value="{{$order->collection_address}}" disabled name="collection_address" id="formrow-collection_address-input" placeholder="Enter Collection Address">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">  
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_postcode-input">Collection Postcode</label>
            <input type="text" class="form-control" disabled name="collection_postcode" id="formrow-collection_postcode-input" value="{{$order->collection_postcode}}" placeholder="Enter Collection Postcode">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_country-input">Collection Country</label>
            <input type="text" class="form-control" value="{{$order->collection_country}}" disabled name="collection_country" id="formrow-collection_country-input" placeholder="Enter Collection Country">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_phone-input">Collection Phone</label>
            <input type="text" class="form-control" value="{{$order->collection_phone}}" disabled name="collection_phone" id="formrow-collection_phone-input" placeholder="Enter Collection Phone">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_description-input">Collection Description</label>
            <textarea id="formrow-collection_description-input" disabled placeholder="Enter Collection Description" class="form-control" name="collection_description" autocomplete="delivery_description" autofocus>{{$order->delivery_description}}</textarea>
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-submission_date-input">Submission Date</label>
            <input type="datetime-local" class="form-control" value="{{$order->submission_date}}" disabled name="submission_date" id="formrow-submission_date-input" placeholder="Enter Submission Date">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-pickup_date-input">Pickup Date</label>
            @php
                $pick = str_replace("T"," ",$order->pickup_date);
                $pickUp = str_replace(".000000Z","",$pick);
            @endphp
            <input type="datetime-local" class="form-control" value="{{$pickUp}}" disabled name="pickup_date" id="formrow-pickup_date-input" placeholder="Enter Pickup Date">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row"> 
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-received_at-input">Received At</label>
            <input type="datetime-local" class="form-control" value="{{$order->received_at}}" disabled name="received_at" id="formrow-received_at-input" placeholder="Enter Received At">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_date-input">Delivery Date</label>
            @php
                $deli = str_replace("T"," ",$order->delivery_date);
                $delivery = str_replace(".000000Z","",$deli);
            @endphp
            <input type="datetime-local" class="form-control" value="{{$delivery}}" disabled name="delivery_date" id="formrow-delivery_date-input" placeholder="Enter Delivery Date">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">  
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-weight-input">Weight</label>
            <input type="text" class="form-control" disabled value="{{$order->weight}}" name="weight" id="formrow-weight-input" placeholder="Enter Weight">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-pieces-input">Pieces</label>
            <input type="text" class="form-control" disabled value="{{$order->pieces}}" name="pieces" id="formrow-pieces-input" placeholder="Enter Pieces">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">   
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-items_count-input">Items Count</label>
            <input type="text" class="form-control" value="{{$order->items_count}}" disabled name="items_count" id="formrow-items_count-input" placeholder="Enter Items Count">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-status-input">Status</label>
            <select id="formrow-status-input" class="form-select" disabled name="status">
                <option value="" data-key="choose-status">Choose a status</option>
                <option value="Delivered"@if($order->status == "Delivered") selected @endif>Delivered</option>
                <option value="Returned"@if($order->status == "Returned") selected @endif>Returned</option>
                <option value="Pickup Cancelled"@if($order->status == "Pickup Cancelled") selected @endif>Pickup Cancelled</option>
                <option value="AWB created at origin"@if($order->status == "AWB created at origin") selected @endif>AWB created at origin</option>
                <option value="RP-Delivered"@if($order->status == "RP-Delivered") selected @endif>RP-Delivered</option>
            </select>
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-status_label-input">Status Label</label>
            <select id="formrow-status_label-input" class="form-select" disabled name="status_label">
                <option value="" data-key="choose-status_label">Choose a status_label</option>
                <option value="Delivered"@if($order->status_label == "Delivered") selected @endif>Delivered</option>
                <option value="Returned"@if($order->status_label == "Returned") selected @endif>Returned</option>
                <option value="Pickup Cancelled"@if($order->status_label == "Pickup Cancelled") selected @endif>Pickup Cancelled</option>
                <option value="AWB created at origin"@if($order->status_label == "AWB created at origin") selected @endif>AWB created at origin</option>
                <option value="RP-Delivered"@if($order->status_label == "RP-Delivered") selected @endif>RP-Delivered</option>
            </select>
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-reason_en-input">Reason En</label>
            <input type="text" class="form-control" value="{{$order->reason_en}}" disabled name="reason_en" id="formrow-reason_en-input" placeholder="Enter Reason En">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">   
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-reason_ar-input">Reason Ar</label>
            <input type="text" class="form-control" value="{{$order->reason_ar}}" disabled name="reason_ar" id="formrow-reason_ar-input" placeholder="Enter Reason Ar">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-is_reverse_pickup-input">is_reverse_pickup</label>
            <input type="text" class="form-control" value="{{$order->is_reverse_pickup}}" disabled name="is_reverse_pickup" id="formrow-is_reverse_pickup-input" placeholder="Enter is_reverse_pickup">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row"> 
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-is_insured-input">is_insured</label>
            <input type="text" class="form-control" value="{{$order->is_insured}}" disabled name="is_insured" id="formrow-is_insured-input" placeholder="Enter is_insured">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-is_prepaid-input">is_prepaid</label>
            <input type="text" class="form-control" value="{{$order->is_prepaid}}" disabled name="is_prepaid" id="formrow-is_prepaid-input" placeholder="Enter is_prepaid">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">   
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-payment_method-input">Payment Method</label>
            <input type="text" class="form-control" value="{{$order->payment_method}}" disabled name="payment_method" id="formrow-payment_method-input" placeholder="Enter Payment Method">
        </div>
    </div><!-- end col -->
</div><!-- end row -->

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a href="{{route('orders')}}" class="btn btn-primary" data-key="t-back-home">Back</a>
    </div>

@endsection
@section('script')
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
