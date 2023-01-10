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
            <label class="form-label" for="formrow-customer_name-input">{{__('t-customer-name')}}</label>
            <input type="text" class="form-control" value="{{$order->customer_name}}" disabled name="customer_name" id="formrow-customer_name-input" placeholder="{{__('t-customer-name')}}">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-requested_by-input">{{__('t-requested-by')}}</label>
            <input type="text" class="form-control" value="{{$order->requested_by}}" disabled name="requested_by" id="formrow-requested_by-input" placeholder="{{__('t-requested-by')}}">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-declared_value-input">{{__('t-declared-value')}}</label>
            <input type="text" class="form-control" value="{{$order->declared_value}}" disabled name="declared_value" id="formrow-declared_value-input" placeholder="{{__('t-declared-value')}}<">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-declared_value_currency-input">{{__('t-declared-value-currency')}}</label>
            <input type="text" disabled class="form-control" name="declared_value_currency" value="{{$order->declared_value_currency}}" id="formrow-declared_value_currency-input" placeholder="{{__('t-declared-value-currency')}}">
        </div>
    </div><!-- end col -->
    
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-is_cod-input">{{__('t-is-cod')}}</label>
            <select id="formrow-is_cod-input" disabled class="form-select" name="is_cod">
                <option value="" data-key="t-choose-is-cod">Choose is_cod</option>
                <option value="0"@if($order->is_cod == "0") selected @endif>0</option>
                <option value="1"@if($order->is_cod == "1") selected @endif>1</option>
            </select>
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-cod_amount-input">{{__('t-cod-amount')}}</label>
            <input type="text" class="form-control" value="{{$order->cod_amount}}" disabled name="cod_amount" id="formrow-cod_amount-input" placeholder="{{__('t-cod-amount')}}">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-currency-input">{{__('t-currency')}}</label>
            <input type="text" disabled class="form-control" value="{{$order->currency}}" name="currency" id="formrow-currency-input" placeholder="{{__('t-currency')}}">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_name-input">{{__('t-delivery-name')}}</label>
            <input type="text" class="form-control" value="{{$order->delivery_name}}" disabled name="delivery_name" id="formrow-delivery_name-input" placeholder="{{__('t-delivery-name')}}">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_email-input">{{__('t-delivery-email')}}</label>
            <input type="email" class="form-control" value="{{$order->delivery_email}}" disabled name="delivery_email" id="formrow-delivery_email-input" placeholder="{{__('t-delivery-email')}}">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_city-input">{{__('t-delivery-city')}}</label>
            <select id="formrow-delivery_city-input" class="form-select" disabled name="delivery_city">
                <option value="" data-key="t-choose-delivery-city">Choose Delivery City</option>
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
            <label class="form-label" for="formrow-delivery_address-input">{{__('t-delivery-address')}}</label>
            <input type="text" class="form-control" value="{{$order->delivery_address}}" disabled name="delivery_address" id="formrow-delivery_address-input" placeholder="{{__('t-delivery-address')}}">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_neighbourhood-input">{{__('t-delivery-neighbourhood')}}</label>
            <input type="text" class="form-control" value="{{$order->delivery_neighbourhood}}" disabled name="delivery_neighbourhood" id="formrow-delivery_neighbourhood-input" placeholder="{{__('t-delivery-neighbourhood')}}">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">  
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_postcode-input">{{__('t-delivery-postcode')}}</label>
            <input type="text" class="form-control" disabled name="delivery_postcode" id="formrow-delivery_postcode-input" value="{{$order->delivery_postcode}}" placeholder="{{__('t-delivery-postcode')}}">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_country-input">{{__('t-delivery-country')}}</label>
            <input type="text" class="form-control" value="{{$order->delivery_country}}" disabled name="delivery_country" id="formrow-delivery_country-input" placeholder="{{__('t-delivery-country')}}">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">    
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_phone-input">{{__('t-delivery-phone')}}</label>
            <input type="text" class="form-control" value="{{$order->delivery_phone}}" disabled name="delivery_phone" id="formrow-delivery_phone-input" placeholder="{{__('t-delivery-phone')}}">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_description-input">{{__('t-delivery-description')}}</label>
            <textarea id="formrow-delivery_description-input" disabled placeholder="{{__('t-delivery-description')}}" class="form-control" name="delivery_description" autocomplete="delivery_description" autofocus>{{$order->delivery_description}}</textarea>
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">    
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_name-input">{{__('t-collection-name')}}</label>
            <input type="text" class="form-control" value="{{$order->collection_name}}" disabled name="collection_name" id="formrow-collection_name-input" placeholder="{{__('t-collection-name')}}">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_email-input">{{__('t-collection-email')}}</label>
            <input type="email" class="form-control" value="{{$order->collection_email}}" disabled name="collection_email" id="formrow-collection_email-input" placeholder="{{__('t-collection-email')}}">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_city-input">{{__('t-collection-city')}}</label>
            <select id="formrow-collection_city-input" class="form-select" disabled name="collection_city">
                <option value="" data-key="t-choose-collection-city">Choose Collection City</option>
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
            <label class="form-label" for="formrow-collection_address-input">{{__('t-collection-address')}}</label>
            <input type="text" class="form-control" value="{{$order->collection_address}}" disabled name="collection_address" id="formrow-collection_address-input" placeholder="{{__('t-collection-address')}}">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">  
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_postcode-input">{{__('t-collection-postcode')}}</label>
            <input type="text" class="form-control" name="collection_postcode" disabled id="formrow-collection_postcode-input" value="{{$order->collection_postcode}}" placeholder="{{__('t-collection-postcode')}}">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_country-input">{{__('t-collection-country')}}</label>
            <input type="text" class="form-control" value="{{$order->collection_country}}" disabled name="collection_country" id="formrow-collection_country-input" placeholder="{{__('t-collection-country')}}">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_phone-input">{{__('t-collection-phone')}}</label>
            <input type="text" class="form-control" value="{{$order->collection_phone}}" disabled name="collection_phone" id="formrow-collection_phone-input" placeholder="{{__('t-collection-phone')}}">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-collection_description-input">{{__('t-collection-description')}}</label>
            <textarea id="formrow-collection_description-input" disabled placeholder="{{__('t-collection-description')}}" class="form-control" name="collection_description" autocomplete="delivery_description" autofocus>{{$order->delivery_description}}</textarea>
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-submission_date-input">{{__('t-submission-date')}}</label>
            <input type="datetime-local" class="form-control" value="{{$order->submission_date}}" disabled name="submission_date" id="formrow-submission_date-input" placeholder="{{__('t-submission-date')}}">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-pickup_date-input">{{__('t-pickup-date')}}</label>
            @php
                $pick = str_replace("T"," ",$order->pickup_date);
                $pickUp = str_replace(".000000Z","",$pick);
            @endphp
            <input type="datetime-local" class="form-control" value="{{$pickUp}}" disabled name="pickup_date" id="formrow-pickup_date-input" placeholder="{{__('t-pickup-date')}}">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row"> 
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-received_at-input">{{__('t-received-at')}}</label>
            <input type="datetime-local" class="form-control" value="{{$order->received_at}}" disabled name="received_at" id="formrow-received_at-input" placeholder="{{__('t-received-at')}}">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-delivery_date-input">{{__('t-delivery-date')}}</label>
            @php
                $deli = str_replace("T"," ",$order->delivery_date);
                $delivery = str_replace(".000000Z","",$deli);
            @endphp
            <input type="datetime-local" class="form-control" value="{{$delivery}}" disabled name="delivery_date" id="formrow-delivery_date-input" placeholder="{{__('t-delivery-date')}}">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">  
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-weight-input">{{__('t-weight')}}</label>
            <input type="text" class="form-control" disabled value="{{$order->weight}}" name="weight" id="formrow-weight-input" placeholder="{{__('t-weight')}}">
            
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-pieces-input">{{__('t-pieces')}}</label>
            <input type="text" class="form-control" disabled value="{{$order->pieces}}" name="pieces" id="formrow-pieces-input" placeholder="{{__('t-pieces')}}">
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">   
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-items_count-input">{{__('t-items-count')}}</label>
            <input type="text" class="form-control" value="{{$order->items_count}}" disabled name="items_count" id="formrow-items_count-input" placeholder="{{__('t-items-count')}}">
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-status-input">{{__('t-status')}}</label>
            <select id="formrow-status-input" class="form-select" disabled name="status">
                <option value="" data-key="t-choose-status">Choose a status</option>
                <option value="Delivered"@if($order->status == "Delivered") selected @endif>Delivered</option>
                <option value="Returned"@if($order->status == "Returned") selected @endif>Returned</option>
                <option value="Pickup Delivered"@if($order->status == "Pickup Delivered") selected @endif>Pickup Delivered</option>
                <option value="Pickup Cancelled"@if($order->status == "Pickup Cancelled") selected @endif>Pickup Cancelled</option>
                <option value="AWB created at origin"@if($order->status == "AWB created at origin") selected @endif>AWB created at origin</option>
            </select>
        </div>
    </div><!-- end col -->
</div><!-- end row -->

<div class="row"> 
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-is_insured-input">{{__('t-is-insured')}}</label>
            <select id="formrow-is_insured-input" disabled class="form-select" name="is_insured">
                <option value="" data-key="t-choose-is-insured">Choose is_insured</option>
                <option value="0"@if($order->is_insured == "0") selected @endif>0</option>
                <option value="1"@if($order->is_insured == "1") selected @endif>1</option>
            </select>
        </div>
    </div><!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-payment_method-input">{{__('t-payment-method')}}</label>
            <input type="text" class="form-control" value="{{$order->payment_method}}" disabled name="payment_method" id="formrow-payment_method-input" placeholder="{{__('t-payment-method')}}">
            
        </div>
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">   
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="formrow-shipment_company-input">{{__('t-shipment-company')}}</label>
            <select id="formrow-shipment_company-input" class="form-select" disabled name="shipment_company">
                <option value="" data-key="t-choose-shipment-company">Choose a Shipment Company</option>
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
