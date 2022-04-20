<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMeasurementRequest extends FormRequest
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
            'weight_kg' => 'numeric|required',
            'fat_percentage' => 'numeric',
            'blood_pressure' => 'string|required',
            'client_id' => 'required|exists:clients,id',
         ];
    }
}
