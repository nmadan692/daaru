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
            'name' => ['required', Rule::unique('categories')->ignore($this->product)],
            'volume' => 'required|integer|between:1,100',
            'alcohol' => 'required|integer|between:1,100',
            'price' => 'required|integer',
            'discount' => 'required',
            'quantity' => 'required|integer',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg'

        ];
    }
}
