<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
//            'volume' => 'required',
            'price' => 'required',
            'quantity' => 'required|integer',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'brand_id' => 'required'
        ];
    }
}
