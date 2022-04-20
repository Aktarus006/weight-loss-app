<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required|before:today',
            'length_cm' => 'required',
            'email' => 'required|email|unique:clients,email',
            'profile_photo' => 'image|mimes:jpeg,jpg,png,gif,svg|dimensions:min_width=200,min_height=200',
        ];
    }
}
