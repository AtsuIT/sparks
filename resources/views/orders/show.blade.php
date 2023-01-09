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
            <label class="form-label" for="formrow-declared_value-input">Declared Value</label>
            <input type="text" class="form-control" value="{{$order->declared_value}}" disabled name="declared_value" id="formrow-declared_value-input" placeholder="Enter Declared Value">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-declared_value_currency-input">Declared Value Currency</label>
            <input type="text" class="form-control" name="declared_value_currency" disabled value="{{$order->declared_value_currency}}" id="formrow-declared_value_currency-input" placeholder="Enter Declared Value Currency">
        </div>
    </div><!-- end col -->
    
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-is_cod-input">Is Cod</label>
            <select id="formrow-is_cod-input" disabled class="form-select" name="is_cod">
                <option value="" data-key="choose-is_cod">Choose is_cod</option>
                <option value="0"@if($order->shipment_company == "0") selected @endif>0</option>
                <option value="1"@if($order->shipment_company == "1") selected @endif>1</option>
            </select>
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-cod_amount-input">Code Amount</label>
            <input type="text" class="form-control" value="{{$order->cod_amount}}" disabled name="cod_amount" id="formrow-cod_amount-input" placeholder="Enter Code Amount">
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
            <select id="formrow-delivery_city-input" class="form-select" disabled name="delivery_city">
                <option value="" data-key="choose-delivery_city">Choose Delivery City</option>
                @foreach ($cities as $city)
                    @php
                        $lang = 'city_'.App::getLocale();
                    @endphp
                        <option value="{{$city->city_en}}"@if($city->city_en == $order->delivery_city) selected @endif>{{$city->$lang}}</option>
                @endforeach
            </select>
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
            <select id="formrow-collection_city-input" class="form-select" disabled name="collection_city">
                <option value="" data-key="choose-collection_city">Choose Delivery City</option>
                @foreach ($cities as $city)
                    @php
                        $lang = 'city_'.App::getLocale();
                    @endphp
                        <option value="{{$city->city_en}}"@if($city->city_en == $order->collection_city) selected @endif>{{$city->$lang}}</option>
                @endforeach
            </select>
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
                <option value="Pickup Delivered"@if($order->status == "Pickup Delivered") selected @endif>Pickup Delivered</option>
            </select>
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row"> 
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-is_insured-input">is_insured</label>
            <select disabled id="formrow-is_insured-input" class="form-select" name="is_insured">
                <option value="" data-key="choose-is_insured">Choose is_insured</option>
                <option value="0"@if($order->is_insured == "0") selected @endif>0</option>
                <option value="1"@if($order->is_insured == "1") selected @endif>1</option>
            </select>
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-payment_method-input">Payment Method</label>
            <input type="text" class="form-control" value="{{$order->payment_method}}" disabled name="payment_method" id="formrow-payment_method-input" placeholder="Enter Payment Method">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">   
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-shipment_company-input">Shipment Company</label>
            <select disabled id="formrow-shipment_company-input" class="form-select" name="shipment_company">
                <option value="" data-key="choose-shipment_company">Choose a Shipment Company</option>
                <option value="Ali Express"@if($order->shipment_company == "Ali Express") selected @endif>Ali Express</option>
                <option value="Aramex"@if($order->shipment_company == "Aramex") selected @endif>Aramex</option>
            </select>
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <a href="{{route('orders-sparks')}}" class="btn btn-primary" data-key="t-back-home">Back</a>
    </div>

@endsection
@section('script')
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
