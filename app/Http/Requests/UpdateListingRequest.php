<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateListingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'beds' => ['required', 'integer', 'min:0', 'max:20'],
            'baths' => ['required', 'integer', 'min:0', 'max:20'],
            'area' => ['required', 'integer', 'min:1200', 'max:20000'],
            'city' => ['required'],
            'area_code' => ['required'],
            'street' => ['required'],
            'street_nr' => ['required', 'integer','min:1'],
            'price' => ['required', 'integer','min:1']
        ];
    }

    public function attributes()
    {
        return [
            'beds' => 'Beds',
            'baths' => 'Baths',
            'area' => 'Area',
            'city' => 'City',
            'area_code' => 'Area Code',
            'street' => 'Street',
            'street_nr' => 'Street Number',
            'price' => 'Price'
        ];
    }
}
