<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:30', 'min:3'],
            'surname' => ['required', 'string', 'max:30','min:3'],
            'address' => ['required', 'string'],
            'email' => ['required', 'email', 'string'],
            'phone' => ['required', 'string', 'max:15'],
            'notes' => ['string', 'max:255', 'nullable'],
            'city' => ['string', 'required'],
            'country' => ['string', 'required'],
        ];
    }
}
