<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingRequest extends FormRequest
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
            'name' => ['required'],
            'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'address' => 'required',
            'email' => 'required',
            'delivery_start_hour' => 'required',
            'delivery_end_hour' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'viber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'city_id' => ['required', Rule::unique('settings')->ignore($this->setting)]
        ];
    }
}
