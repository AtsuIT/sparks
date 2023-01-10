@extends('layouts.vertical-master-layout')
@section('title'){{__('t-order-edit')}} @endsection
@section('content')

{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') {{__('t-dashboard')}} @endslot
@slot('title') {{__('t-order-edit')}} @endslot
@endcomponent
@endsection
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<form action="{{route('update-orders',$order->id)}}" method="POST" class="mt-4 pt-2">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-customer_name-input">{{__('t-customer-name')}}</label>
                <input type="text" class="form-control @error('customer_name') is-invalid @enderror" value="{{$order->customer_name}}" required name="customer_name" id="formrow-customer_name-input" placeholder="{{__('t-customer-name')}}">
                @error('customer_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-requested_by-input">{{__('t-requested-by')}}</label>
                <input type="text" class="form-control @error('requested_by') is-invalid @enderror" value="{{$order->requested_by}}" required name="requested_by" id="formrow-requested_by-input" placeholder="{{__('t-requested-by')}}">
                @error('requested_by')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-declared_value-input">{{__('t-declared-value')}}</label>
                <input type="text" class="form-control @error('declared_value') is-invalid @enderror" value="{{$order->declared_value}}" required name="declared_value" id="formrow-declared_value-input" placeholder="{{__('t-declared-value')}}<">
                @error('declared_value')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-declared_value_currency-input">{{__('t-declared-value-currency')}}</label>
                <input type="text" class="form-control" name="declared_value_currency" value="{{$order->declared_value_currency}}" id="formrow-declared_value_currency-input" placeholder="{{__('t-declared-value-currency')}}">
            </div>
        </div><!-- end col -->
        
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-is_cod-input">{{__('t-is-cod')}}</label>
                <select id="formrow-is_cod-input" class="form-select" name="is_cod">
                    <option value="" data-key="t-choose-is-cod">Choose is_cod</option>
                    <option value="0"@if($order->shipment_company == "0") selected @endif>0</option>
                    <option value="1"@if($order->shipment_company == "1") selected @endif>1</option>
                </select>
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-cod_amount-input">{{__('t-cod-amount')}}</label>
                <input type="text" class="form-control @error('cod_amount') is-invalid @enderror" value="{{$order->cod_amount}}" required name="cod_amount" id="formrow-cod_amount-input" placeholder="{{__('t-cod-amount')}}">
                @error('cod_amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-currency-input">{{__('t-currency')}}</label>
                <input type="text" class="form-control" value="{{$order->currency}}" name="currency" id="formrow-currency-input" placeholder="{{__('t-currency')}}">
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_name-input">{{__('t-delivery-name')}}</label>
                <input type="text" class="form-control @error('delivery_name') is-invalid @enderror" value="{{$order->delivery_name}}" required name="delivery_name" id="formrow-delivery_name-input" placeholder="{{__('t-delivery-name')}}">
                @error('delivery_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_email-input">{{__('t-delivery-email')}}</label>
                <input type="email" class="form-control @error('delivery_email') is-invalid @enderror" value="{{$order->delivery_email}}" required name="delivery_email" id="formrow-delivery_email-input" placeholder="{{__('t-delivery-email')}}">
                @error('delivery_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_city-input">{{__('t-delivery-city')}}</label>
                <select id="formrow-delivery_city-input" class="form-select @error('delivery_city') is-invalid @enderror" required name="delivery_city">
                    <option value="" data-key="t-choose-delivery-city">Choose Delivery City</option>
                    @foreach ($cities as $city)
                        @php
                            $lang = 'city_'.App::getLocale();
                        @endphp
                            <option value="{{$city->city_en}}"@if($city->city_en == $order->delivery_city) selected @endif>{{$city->$lang}}</option>
                    @endforeach
                </select>
                @error('delivery_city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">   
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_address-input">{{__('t-delivery-address')}}</label>
                <input type="text" class="form-control @error('delivery_address') is-invalid @enderror" value="{{$order->delivery_address}}" required name="delivery_address" id="formrow-delivery_address-input" placeholder="{{__('t-delivery-address')}}">
                @error('delivery_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_neighbourhood-input">{{__('t-delivery-neighbourhood')}}</label>
                <input type="text" class="form-control @error('delivery_neighbourhood') is-invalid @enderror" value="{{$order->delivery_neighbourhood}}" required name="delivery_neighbourhood" id="formrow-delivery_neighbourhood-input" placeholder="{{__('t-delivery-neighbourhood')}}">
                @error('delivery_neighbourhood')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">  
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_postcode-input">{{__('t-delivery-postcode')}}</label>
                <input type="text" class="form-control" name="delivery_postcode" id="formrow-delivery_postcode-input" value="{{$order->delivery_postcode}}" placeholder="{{__('t-delivery-postcode')}}">
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_country-input">{{__('t-delivery-country')}}</label>
                <input type="text" class="form-control @error('delivery_country') is-invalid @enderror" value="{{$order->delivery_country}}" required name="delivery_country" id="formrow-delivery_country-input" placeholder="{{__('t-delivery-country')}}">
                @error('delivery_country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">    
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_phone-input">{{__('t-delivery-phone')}}</label>
                <input type="text" class="form-control @error('delivery_phone') is-invalid @enderror" value="{{$order->delivery_phone}}" required name="delivery_phone" id="formrow-delivery_phone-input" placeholder="{{__('t-delivery-phone')}}">
                @error('delivery_phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_description-input">{{__('t-delivery-description')}}</label>
                <textarea id="formrow-delivery_description-input" placeholder="{{__('t-delivery-description')}}" class="form-control" name="delivery_description" autocomplete="delivery_description" autofocus>{{$order->delivery_description}}</textarea>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">    
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-collection_name-input">{{__('t-collection-name')}}</label>
                <input type="text" class="form-control @error('collection_name') is-invalid @enderror" value="{{$order->collection_name}}" required name="collection_name" id="formrow-collection_name-input" placeholder="{{__('t-collection-name')}}">
                @error('collection_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-collection_email-input">{{__('t-collection-email')}}</label>
                <input type="email" class="form-control @error('collection_email') is-invalid @enderror" value="{{$order->collection_email}}" required name="collection_email" id="formrow-collection_email-input" placeholder="{{__('t-collection-email')}}">
                @error('collection_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-collection_city-input">{{__('t-collection-city')}}</label>
                <select id="formrow-collection_city-input" class="form-select @error('collection_city') is-invalid @enderror" required name="collection_city">
                    <option value="" data-key="t-choose-collection-city">Choose Collection City</option>
                    @foreach ($cities as $city)
                        @php
                            $lang = 'city_'.App::getLocale();
                        @endphp
                            <option value="{{$city->city_en}}"@if($city->city_en == $order->collection_city) selected @endif>{{$city->$lang}}</option>
                    @endforeach
                </select>
                @error('collection_city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-collection_address-input">{{__('t-collection-address')}}</label>
                <input type="text" class="form-control @error('collection_address') is-invalid @enderror" value="{{$order->collection_address}}" required name="collection_address" id="formrow-collection_address-input" placeholder="{{__('t-collection-address')}}">
                @error('collection_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">  
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-collection_postcode-input">{{__('t-collection-postcode')}}</label>
                <input type="text" class="form-control" name="collection_postcode" id="formrow-collection_postcode-input" value="{{$order->collection_postcode}}" placeholder="{{__('t-collection-postcode')}}">
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-collection_country-input">{{__('t-collection-country')}}</label>
                <input type="text" class="form-control @error('collection_country') is-invalid @enderror" value="{{$order->collection_country}}" required name="collection_country" id="formrow-collection_country-input" placeholder="{{__('t-collection-country')}}">
                @error('collection_country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-collection_phone-input">{{__('t-collection-phone')}}</label>
                <input type="text" class="form-control @error('collection_phone') is-invalid @enderror" value="{{$order->collection_phone}}" required name="collection_phone" id="formrow-collection_phone-input" placeholder="{{__('t-collection-phone')}}">
                @error('collection_phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-collection_description-input">{{__('t-collection-description')}}</label>
                <textarea id="formrow-collection_description-input" placeholder="{{__('t-collection-description')}}" class="form-control" name="collection_description" autocomplete="delivery_description" autofocus>{{$order->delivery_description}}</textarea>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-submission_date-input">{{__('t-submission-date')}}</label>
                <input type="datetime-local" class="form-control @error('submission_date') is-invalid @enderror" value="{{$order->submission_date}}" required name="submission_date" id="formrow-submission_date-input" placeholder="{{__('t-submission-date')}}">
                @error('submission_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-pickup_date-input">{{__('t-pickup-date')}}</label>
                @php
                    $pick = str_replace("T"," ",$order->pickup_date);
                    $pickUp = str_replace(".000000Z","",$pick);
                @endphp
                <input type="datetime-local" class="form-control @error('pickup_date') is-invalid @enderror" value="{{$pickUp}}" required name="pickup_date" id="formrow-pickup_date-input" placeholder="{{__('t-pickup-date')}}">
                @error('pickup_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row"> 
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-received_at-input">{{__('t-received-at')}}</label>
                <input type="datetime-local" class="form-control @error('received_at') is-invalid @enderror" value="{{$order->received_at}}" required name="received_at" id="formrow-received_at-input" placeholder="{{__('t-received-at')}}">
                @error('received_at')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_date-input">{{__('t-delivery-date')}}</label>
                @php
                    $deli = str_replace("T"," ",$order->delivery_date);
                    $delivery = str_replace(".000000Z","",$deli);
                @endphp
                <input type="datetime-local" class="form-control @error('delivery_date') is-invalid @enderror" value="{{$delivery}}" required name="delivery_date" id="formrow-delivery_date-input" placeholder="{{__('t-delivery-date')}}">
                @error('delivery_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">  
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-weight-input">{{__('t-weight')}}</label>
                <input type="text" class="form-control @error('weight') is-invalid @enderror" required value="{{$order->weight}}" name="weight" id="formrow-weight-input" placeholder="{{__('t-weight')}}">
                @error('weight')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-pieces-input">{{__('t-pieces')}}</label>
                <input type="text" class="form-control @error('pieces') is-invalid @enderror" required value="{{$order->pieces}}" name="pieces" id="formrow-pieces-input" placeholder="{{__('t-pieces')}}">
                @error('pieces')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">   
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-items_count-input">{{__('t-items-count')}}</label>
                <input type="text" class="form-control @error('items_count') is-invalid @enderror" value="{{$order->items_count}}" required name="items_count" id="formrow-items_count-input" placeholder="{{__('t-items-count')}}">
                @error('items_count')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-status-input">{{__('t-status')}}</label>
                <select id="formrow-status-input" class="form-select @error('status') is-invalid @enderror" required name="status">
                    <option value="" data-key="t-choose-status">Choose a status</option>
                    <option value="Delivered"@if($order->status == "Delivered") selected @endif>Delivered</option>
                    <option value="Returned"@if($order->status == "Returned") selected @endif>Returned</option>
                    <option value="Pickup Delivered"@if($order->status == "Pickup Delivered") selected @endif>Pickup Delivered</option>
                    <option value="Pickup Cancelled"@if($order->status == "Pickup Cancelled") selected @endif>Pickup Cancelled</option>
                    <option value="AWB created at origin"@if($order->status == "AWB created at origin") selected @endif>AWB created at origin</option>
                </select>
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    
    <div class="row"> 
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-is_insured-input">{{__('t-is-insured')}}</label>
                <select id="formrow-is_insured-input" class="form-select" name="is_insured">
                    <option value="" data-key="t-choose-is-insured">Choose is_insured</option>
                    <option value="0"@if($order->is_insured == "0") selected @endif>0</option>
                    <option value="1"@if($order->is_insured == "1") selected @endif>1</option>
                </select>
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-payment_method-input">{{__('t-payment-method')}}</label>
                <input type="text" class="form-control @error('payment_method') is-invalid @enderror" value="{{$order->payment_method}}" required name="payment_method" id="formrow-payment_method-input" placeholder="{{__('t-payment-method')}}">
                @error('payment_method')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">   
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-shipment_company-input">{{__('t-shipment-company')}}</label>
                <select id="formrow-shipment_company-input" class="form-select @error('shipment_company') is-invalid @enderror" required name="shipment_company">
                    <option value="" data-key="t-choose-shipment-company">Choose a Shipment Company</option>
                    <option value="Ali Express"@if($order->shipment_company == "Ali Express") selected @endif>Ali Express</option>
                    <option value="Aramex"@if($order->shipment_company == "Aramex") selected @endif>Aramex</option>
                </select>
                @error('shipment_company')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary" data-key="t-submit">Submit</button>
    </div>
</form>

@endsection
@section('script')
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
