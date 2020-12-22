<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'name' => 'required|min:3',
            'contact' => 'required|int|digits:10',
            'street' => 'required|min:3',
            'province' => 'required|min:3',
            'city' => 'required|min:3',
            'postal_code' => 'required|int|digits:4',
        ];
    }
}
