<?php

namespace App\Http\Requests\ProductVariantRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductVariantdestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->hasRole('super_admin')) 
        {
             return true;
        }

        if (Auth::user()->can('product_variant_destroy')) {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'by_id'                 =>   'required_without:by_product_id|exists:product_variants,id',
            'by_product_id'         =>   'required_without:by_id|exists:product_variants,fk_product_id'
        ];
    }
    public function messages()
    {
       return [

        'by_id.required'               => 'product variant id perlu diisi',
        'by_id.exists'                 => 'product variant id tidak tersedia',

       ]; 
    }
}
