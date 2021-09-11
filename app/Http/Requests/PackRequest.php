<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PackRequest extends FormRequest
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
            'shipment_id'=>'required',
            'customer'=>'required',
             'custid'=>'required',
            'phone'=>'required',
            'description'=>'required',
            'recepient'=>'required',
            'recpphone'=>'required',
            'dimentions'=>'required',
            'street'=>'required',
            'city'=>'required',
            'postcode'=>'required',
            'quantity'=>'required|numeric',
            'weight'=>'required|numeric',
        ];
    }

    public function messages(){
      return [
        'shipment_id.required'=>'Shipment destinatoin field is required',
        'customer.required'=>'Full name is requied',
        'custid.required'=>'ID number is required',
        'phone.required'=>'Phone number is requied',
        'description.required'=>'Contents brief description is required',
        'recepient.required'=>'Recepient name is required',
        'recpphone.required'=>'Recepient phone number is required',
        'dimentions.required'=>'Package dimentions are required',
        'street.required'=>'House number and street are required',
        'city.required'=>'City is required',
        'postcode.required'=>'Postal code is required',
        'quantity.required'=>'Number of packages is required',
        'quantity.numeric' => 'Quantity has to be number',
        'weight.numeric' => 'Weight has to be number',
        'weight.required'=>'Package weight is required',
      ];
    }
}
