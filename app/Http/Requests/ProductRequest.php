<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'sku' => 'required',
            'category' => 'required',
            'retail_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'stock' => 'required|int',
            'details' => 'required',
            'status' => 'required|boolean',
            // 'image' => 'required', //temporay fix
            // 'image.*' => 'required|mimes:jpeg,png', //temporay fix
            'image.*' => 'mimes:jpeg,png',
        ];
    }
}
