<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["name","status","description","uuid","reference","tracking_number","customer_name","requested_by",
    	"cod_amount","declared_value","currency","delivery_name","delivery_email","delivery_city","delivery_address",
        "delivery_neighbourhood","delivery_postcode","delivery_country","delivery_phone","delivery_description",
        "collection_name","collection_email","collection_city",	"collection_address","collection_postcode","collection_country",
        "collection_phone","collection_description","submission_date","pickup_date","received_at","delivery_date",
        "weight","pieces","items_count","status_label","reason_en","reason_ar",	"is_reverse_pickup","is_insured","is_prepaid",	
        "payment_method"];
}
