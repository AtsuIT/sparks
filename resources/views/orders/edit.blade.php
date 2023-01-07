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
                <label class="form-label" for="formrow-customer_name-input">Customer Name</label>
                <input type="text" class="form-control @error('customer_name') is-invalid @enderror" value="{{$order->customer_name}}" required name="customer_name" id="formrow-customer_name-input" placeholder="Enter Customer Name">
                @error('customer_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-requested_by-input">Requested By</label>
                <input type="text" class="form-control @error('requested_by') is-invalid @enderror" value="{{$order->requested_by}}" required name="requested_by" id="formrow-requested_by-input" placeholder="Enter Requested By">
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
                <label class="form-label" for="formrow-cod_amount-input">Code Amount</label>
                <input type="text" class="form-control @error('cod_amount') is-invalid @enderror" value="{{$order->cod_amount}}" required name="cod_amount" id="formrow-cod_amount-input" placeholder="Enter Code Amount">
                @error('cod_amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-declared_value-input">Declared Value</label>
                <input type="text" class="form-control @error('declared_value') is-invalid @enderror" value="{{$order->declared_value}}" required name="declared_value" id="formrow-declared_value-input" placeholder="Enter Declared Value">
                @error('declared_value')
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
                <label class="form-label" for="formrow-currency-input">Currency</label>
                <input type="text" class="form-control @error('currency') is-invalid @enderror" value="{{$order->currency}}" required name="currency" id="formrow-currency-input" placeholder="Enter Currency">
                @error('currency')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_name-input">Delivery Name</label>
                <input type="text" class="form-control @error('delivery_name') is-invalid @enderror" value="{{$order->delivery_name}}" required name="delivery_name" id="formrow-delivery_name-input" placeholder="Enter Delivery Name">
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
                <label class="form-label" for="formrow-delivery_email-input">Delivery Email</label>
                <input type="email" class="form-control @error('delivery_email') is-invalid @enderror" value="{{$order->delivery_email}}" required name="delivery_email" id="formrow-delivery_email-input" placeholder="Enter Delivery Email">
                @error('delivery_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_city-input">Delivery City</label>
                <input type="text" class="form-control @error('delivery_city') is-invalid @enderror" value="{{$order->delivery_city}}" required name="delivery_city" id="formrow-delivery_city-input" placeholder="Enter Delivery City">
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
                <label class="form-label" for="formrow-delivery_address-input">Delivery Address</label>
                <input type="text" class="form-control @error('delivery_address') is-invalid @enderror" value="{{$order->delivery_address}}" required name="delivery_address" id="formrow-delivery_address-input" placeholder="Enter Delivery Address">
                @error('delivery_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_neighbourhood-input">Delivery Neighbourhood</label>
                <input type="text" class="form-control @error('delivery_neighbourhood') is-invalid @enderror" value="{{$order->delivery_neighbourhood}}" required name="delivery_neighbourhood" id="formrow-delivery_neighbourhood-input" placeholder="Enter Delivery Neighbourhood">
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
                <label class="form-label" for="formrow-delivery_postcode-input">Delivery Postcode</label>
                <input type="text" class="form-control" name="delivery_postcode" id="formrow-delivery_postcode-input" value="{{$order->delivery_postcode}}" placeholder="Enter Delivery Postcode">
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_country-input">Delivery Country</label>
                <input type="text" class="form-control @error('delivery_country') is-invalid @enderror" value="{{$order->delivery_country}}" required name="delivery_country" id="formrow-delivery_country-input" placeholder="Enter Delivery Country">
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
                <label class="form-label" for="formrow-delivery_phone-input">Delivery Phone</label>
                <input type="text" class="form-control @error('delivery_phone') is-invalid @enderror" value="{{$order->delivery_phone}}" required name="delivery_phone" id="formrow-delivery_phone-input" placeholder="Enter Delivery Phone">
                @error('delivery_phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_description-input">Delivery Description</label>
                <textarea id="formrow-delivery_description-input" placeholder="Enter Delivery Description" class="form-control" name="delivery_description" autocomplete="delivery_description" autofocus>{{$order->delivery_description}}</textarea>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">    
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-collection_name-input">Collection Name</label>
                <input type="text" class="form-control @error('collection_name') is-invalid @enderror" value="{{$order->collection_name}}" required name="collection_name" id="formrow-collection_name-input" placeholder="Enter Collection Name">
                @error('collection_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-collection_email-input">Collection Email</label>
                <input type="email" class="form-control @error('collection_email') is-invalid @enderror" value="{{$order->collection_email}}" required name="collection_email" id="formrow-collection_email-input" placeholder="Enter Collection Email">
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
                <label class="form-label" for="formrow-collection_city-input">Collection City</label>
                <input type="text" class="form-control @error('collection_city') is-invalid @enderror" value="{{$order->collection_city}}" required name="collection_city" id="formrow-collection_city-input" placeholder="Enter Collection City">
                @error('collection_city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-collection_address-input">Collection Address</label>
                <input type="text" class="form-control @error('collection_address') is-invalid @enderror" value="{{$order->collection_address}}" required name="collection_address" id="formrow-collection_address-input" placeholder="Enter Collection Address">
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
                <label class="form-label" for="formrow-collection_postcode-input">Collection Postcode</label>
                <input type="text" class="form-control" name="collection_postcode" id="formrow-collection_postcode-input" value="{{$order->collection_postcode}}" placeholder="Enter Collection Postcode">
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-collection_country-input">Collection Country</label>
                <input type="text" class="form-control @error('collection_country') is-invalid @enderror" value="{{$order->collection_country}}" required name="collection_country" id="formrow-collection_country-input" placeholder="Enter Collection Country">
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
                <label class="form-label" for="formrow-collection_phone-input">Collection Phone</label>
                <input type="text" class="form-control @error('collection_phone') is-invalid @enderror" value="{{$order->collection_phone}}" required name="collection_phone" id="formrow-collection_phone-input" placeholder="Enter Collection Phone">
                @error('collection_phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-collection_description-input">Collection Description</label>
                <textarea id="formrow-collection_description-input" placeholder="Enter Collection Description" class="form-control" name="collection_description" autocomplete="delivery_description" autofocus>{{$order->delivery_description}}</textarea>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-submission_date-input">Submission Date</label>
                <input type="datetime-local" class="form-control @error('submission_date') is-invalid @enderror" value="{{$order->submission_date}}" required name="submission_date" id="formrow-submission_date-input" placeholder="Enter Submission Date">
                @error('submission_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-pickup_date-input">Pickup Date</label>
                @php
                    $pick = str_replace("T"," ",$order->pickup_date);
                    $pickUp = str_replace(".000000Z","",$pick);
                @endphp
                <input type="datetime-local" class="form-control @error('pickup_date') is-invalid @enderror" value="{{$pickUp}}" required name="pickup_date" id="formrow-pickup_date-input" placeholder="Enter Pickup Date">
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
                <label class="form-label" for="formrow-received_at-input">Received At</label>
                <input type="datetime-local" class="form-control @error('received_at') is-invalid @enderror" value="{{$order->received_at}}" required name="received_at" id="formrow-received_at-input" placeholder="Enter Received At">
                @error('received_at')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-delivery_date-input">Delivery Date</label>
                @php
                    $deli = str_replace("T"," ",$order->delivery_date);
                    $delivery = str_replace(".000000Z","",$deli);
                @endphp
                <input type="datetime-local" class="form-control @error('delivery_date') is-invalid @enderror" value="{{$delivery}}" required name="delivery_date" id="formrow-delivery_date-input" placeholder="Enter Delivery Date">
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
                <label class="form-label" for="formrow-weight-input">Weight</label>
                <input type="text" class="form-control @error('weight') is-invalid @enderror" required value="{{$order->weight}}" name="weight" id="formrow-weight-input" placeholder="Enter Weight">
                @error('weight')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-pieces-input">Pieces</label>
                <input type="text" class="form-control @error('pieces') is-invalid @enderror" required value="{{$order->pieces}}" name="pieces" id="formrow-pieces-input" placeholder="Enter Pieces">
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
                <label class="form-label" for="formrow-items_count-input">Items Count</label>
                <input type="text" class="form-control @error('items_count') is-invalid @enderror" value="{{$order->items_count}}" required name="items_count" id="formrow-items_count-input" placeholder="Enter Items Count">
                @error('items_count')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-status-input">Status</label>
                <select id="formrow-status-input" class="form-select @error('status') is-invalid @enderror" required name="status">
                    <option value="" data-key="choose-status">Choose a status</option>
                    <option value="Delivered"@if($order->status == "Delivered") selected @endif>Delivered</option>
                    <option value="Returned"@if($order->status == "Returned") selected @endif>Returned</option>
                    <option value="Pickup Cancelled"@if($order->status == "Pickup Cancelled") selected @endif>Pickup Cancelled</option>
                    <option value="AWB created at origin"@if($order->status == "AWB created at origin") selected @endif>AWB created at origin</option>
                    <option value="RP-Delivered"@if($order->status == "RP-Delivered") selected @endif>RP-Delivered</option>
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
                <label class="form-label" for="formrow-status_label-input">Status Label</label>
                <select id="formrow-status_label-input" class="form-select @error('status_label') is-invalid @enderror" required name="status_label">
                    <option value="" data-key="choose-status_label">Choose a status_label</option>
                    <option value="Delivered"@if($order->status_label == "Delivered") selected @endif>Delivered</option>
                    <option value="Returned"@if($order->status_label == "Returned") selected @endif>Returned</option>
                    <option value="Pickup Cancelled"@if($order->status_label == "Pickup Cancelled") selected @endif>Pickup Cancelled</option>
                    <option value="AWB created at origin"@if($order->status_label == "AWB created at origin") selected @endif>AWB created at origin</option>
                    <option value="RP-Delivered"@if($order->status_label == "RP-Delivered") selected @endif>RP-Delivered</option>
                </select>
                @error('status_label')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-reason_en-input">Reason En</label>
                <input type="text" class="form-control" value="{{$order->reason_en}}" name="reason_en" id="formrow-reason_en-input" placeholder="Enter Reason En">
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">   
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-reason_ar-input">Reason Ar</label>
                <input type="text" class="form-control" value="{{$order->reason_ar}}" name="reason_ar" id="formrow-reason_ar-input" placeholder="Enter Reason Ar">
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-is_reverse_pickup-input">is_reverse_pickup</label>
                <input type="text" class="form-control @error('is_reverse_pickup') is-invalid @enderror" value="{{$order->is_reverse_pickup}}" required name="is_reverse_pickup" id="formrow-is_reverse_pickup-input" placeholder="Enter is_reverse_pickup">
                @error('is_reverse_pickup')
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
                <label class="form-label" for="formrow-is_insured-input">is_insured</label>
                <input type="text" class="form-control @error('is_insured') is-invalid @enderror" value="{{$order->is_insured}}" required name="is_insured" id="formrow-is_insured-input" placeholder="Enter is_insured">
                @error('is_insured')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="formrow-is_prepaid-input">is_prepaid</label>
                <input type="text" class="form-control @error('is_prepaid') is-invalid @enderror" value="{{$order->is_prepaid}}" required name="is_prepaid" id="formrow-is_prepaid-input" placeholder="Enter is_prepaid">
                @error('is_prepaid')
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
                <label class="form-label" for="formrow-payment_method-input">Payment Method</label>
                <input type="text" class="form-control @error('payment_method') is-invalid @enderror" value="{{$order->payment_method}}" required name="payment_method" id="formrow-payment_method-input" placeholder="Enter Payment Method">
                @error('payment_method')
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
