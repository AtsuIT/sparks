<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'status'=>'required',
            // 'customer_name'=>'required',	
            // 'requested_by'=>'required',	
            // 'cod_amount'=>'required',
            // 'declared_value'=>'required',	
            // 'currency'=>'required',	
            // 'delivery_name'=>'required',	
            // 'delivery_email'=>'required|email',	
            // 'delivery_city'=>'required',	
            // 'delivery_address'=>'required',	
            // 'delivery_neighbourhood'=>'required',	
            // 'delivery_country'=>'required',	
            // 'delivery_phone'=>'required',	
            // 'collection_name'=>'required',
            // 'collection_email'=>'required|email',	
            // 'collection_city'=>'required',
            // 'collection_address'=>'required',	
            // 'collection_country'=>'required',	
            // 'collection_phone'=>'required',	
            // 'submission_date'=>'required',
            // 'pickup_date'=>'required',
            // 'received_at	'=>'required',
            // 'delivery_date'=>'required',	
            // 'weight'=>'required',	
            // 'pieces'=>'required',	
            // 'items_count'=>'required',	
            // 'status_label'=>'required',	
            // 'is_reverse_pickup'=>'required',	
            // 'is_insured'=>'required',	
            // 'is_prepaid'=>'required',	
            // 'payment_method'=>'required',
        ];
    }
}
