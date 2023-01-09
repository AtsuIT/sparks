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
            'status'=>'required',
            'customer_name'=>'required',	
            'requested_by'=>'required',	
            'cod_amount'=>'required_if:is_cod,==,1|between:0,99.99',
            'declared_value'=>'required|between:0,99.99',	
            'delivery_name'=>'required',	
            'delivery_email'=>'email',	
            'delivery_city'=>'required',	
            'delivery_address'=>'required',	
            'delivery_neighbourhood'=>'required',	
            'delivery_country'=>'required',	
            'delivery_phone'=>'required|digits:10',	
            'collection_name'=>'required',
            'collection_email'=>'email',	
            'collection_city'=>'required',
            'collection_address'=>'required',	
            'collection_country'=>'required',	
            'collection_phone'=>'required|numeric',	
            'submission_date'=>'required',
            'pickup_date'=>'required',
            'received_at'=>'required',
            'delivery_date'=>'required',	
            'pieces'=>'required',	
            'payment_method'=>'required',
            'shipment_company'=>'required',
        ];
    }
}
